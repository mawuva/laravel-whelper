<?php

if (!function_exists('collectionLinks')) {
    /**
     * Return resource's collection links
     * @return string
     */
    function collectionLinks($resource) {
        return [
            'collection' =>[
                'method' =>'get',
                'action' =>url($resource)
            ],
            'create' =>[
                'method' =>'post',
                'action' =>url($resource)
            ]
        ];
    }
}

if (!function_exists('resourceLinks')) {
    /**
     * Return resource's links
     * @return string
     */
    function resourceLinks($resource, $resource_id) {
        return [
            'self' =>[
                'method' =>'get',
                'action' =>url($resource.'/'.$resource_id)
            ],
            'modify' =>[
                'method' =>'put',
                'action' =>url($resource.'/'.$resource_id)
            ],
            'delete' =>[
                'method' =>'delete',
                'action' =>url($resource.'/'.$resource_id)
            ]
        ];
    }
}

if (!function_exists('selfResource')) {
    /**
     * Return resource's links
     * @return string
     */
    function selfResource($resource, $resource_id) {
        return [
            'self' =>[
                'method' =>'get',
                'action' =>url($resource.'/'.$resource_id)
            ]
        ];
    }
}

if (!function_exists('selfResourceUrl')) {
    /**
     * Return resource's url
     * @return string
     */
    function selfResourceUrl($url) {
        return [
            'self' =>[
                'method' =>'get',
                'action' =>url($url)
            ]
        ];
    }
}