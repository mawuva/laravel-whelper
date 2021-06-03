<?php

if ( ! function_exists('getMetasFrom')) {
    /**
     * Generate meta data from ...
     * 
     * @param string $resource
     * @param string $data
     * @param int $len
     * 
     * @return string
     */
    function getMetasFrom($resource, $data, $len) {
        $meta = $data . "|" . time() . '!'. generateToken($len);
        $meta_app = strtolower(env('APP_ABR')."-".$resource."/".$meta);

        return [
            'meta' =>$meta,
            'meta_data' =>$resource."/".$meta,
            'meta_app' =>$meta_app,
            'meta_id' =>md5(bin2hex($meta_app))
        ];
    }
}

if ( ! function_exists('getMetaFrom')) {
    /**
     * get meta data from ...
     * 
     * @param string $data
     * @param int $len
     * 
     * @return string
     */
    function getMetaFrom($data, $len) {
        return $data . "|" . time() . '!'. generateToken($len);
    }
}

if ( ! function_exists('getMetaDataFrom')) {
    /**
     * get meta data from ...
     * 
     * @param string $resource
     * @param string $meta
     * 
     * @return string
     */
    function getMetaDataFrom($resource, $meta) {
        return $resource."/".$meta;
    }
}

if ( ! function_exists('getMetaAppFrom')) {
    /**
     * get meta data from ...
     * 
     * @param string $resource
     * @param string $meta
     * 
     * @return string
     */
    function getMetaAppFrom($resource, $meta) {
        return strtolower(env('APP_ABR')."-".$resource."/".$meta);
    }
}

if ( ! function_exists('getMetaIDFrom')) {
    /**
     * get meta data from ...
     * 
     * @param string $meta_app
     * 
     * @return string
     */
    function getMetaIDFrom($meta_app) {
        return md5(bin2hex($meta_app));
    }
}

if ( ! function_exists('checkMeta')) {
    /**
     * get meta data from ...
     * 
     * @param string $meta_app
     * 
     * @return string
     */
    function checkMeta($meta_app, $meta_id) {
        if (getMetaIDFrom($meta_app) === $meta_id) {
            return true;
        }

        return false;
    }
}