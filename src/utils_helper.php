<?php

/**
 * Utils helper for php projects
 */
 
if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path for lumen
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '') {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}

if ( ! function_exists('checkKeyInArray')) {
    /**
     * Chef if a key exists in array
     *
     * @param array $array
     * @param string $key
     * 
     * @return string
     */
    function checkKeyInArray(array $array = [], string $key = '') {
        if (is_array($array) && !empty($key)) {
            if (key_exists($key, $array)) {
                if ($array[$key] != null) {
                    return $array[$key];
                }
            }
        }
    }
}

if ( ! function_exists('formatDate')) {
    /**
     * Format datetime to explicit dat
     *
     * @param string $datetime
     * 
     * @return array
     */
    function formatDate($datetime) {
        if ($datetime != null) {
            if (app() ->getLocale() == strtolower('fr')) {
                setlocale(LC_TIME, "fr_FR");
                
                $data =  [
                    '2' =>strftime('%d-%m-%Y, %H:%M:%S', strtotime($datetime)),
                    '4' =>ucwords(strftime('%e %b %Y, %H:%M:%S', strtotime($datetime)))
                ];
            }
    
            else {
                $data = [
                    '2' =>date('d-m-Y, H:i:s', strtotime($datetime)),
                    '4' =>date('d M Y, H:i:s', strtotime($datetime)),
                ];
            }
    
            return ['format' =>array_map('utf8_encode', $data)];
        }
    }
}

if ( ! function_exists('getActiveStatusFromDeleted')) {
    /**
     * Get data active status from its deleted status
     *
     * @param boolean $deleted
     * 
     * @return boolean
     */
    function getActiveStatusFromDeleted($deleted) {
        if ($deleted == 0) {
            return 1;
        }

        else {
            return 0;
        }
    }
}

if (!function_exists('groupBy')) {
    /**
     * Group array data by specified key
     * 
     * @param string $key
     * @param array $data
     * 
     * @return array
     */
    function groupBy(string $key, array $data = []) {
        $result = array();

        foreach($data as $val) {
            if(array_key_exists($key, $val)) {
                $result[$val[$key]][] = $val;
            }

            else {
                $result[""][] = $val;
            }
        }

        return $result;
    }
}