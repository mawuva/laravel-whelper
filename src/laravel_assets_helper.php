<?php

if (!function_exists('asset')) {
    /**
     * Show the link for asset
     * 
     * @param string $path
     * 
     * @return void
     */
    function asset($path) {
        if (app() ->environment('production')) {
            echo url($path);
        } else {
            echo url("public/".$path);
        }
    }
}