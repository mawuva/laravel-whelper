<?php

/**
 * Get data from input data
 */

if ( ! function_exists('makeUsernameFromEmail')) {
    /**
     * Generate username from email for created users
     * 
     * @param string $email required
     * 
     * @return string
     */
    function makeUsernameFromEmail(string $email) {
        if ($email != null) {
            return explode("@", $email)[0];
        }
    }
}

if ( ! function_exists('checkOrMakeUsername')) {
    /**
     * Chef if a key exists in array
     *
     * @param array $input required
     * @param string $key required
     * 
     * @return string
     */
    function checkOrMakeUsername($input = [], $key = '') {
        if (is_array($input) && !empty($key)) {
            if (checkKeyInArray($input, $key) != null) {
                return $input[$key];
            }
    
            else {
                return strtolower(makeUsernameFromEmail($input['email']));
            }
        }
    }
}

if ( ! function_exists('checkOrMakeInvoiceMark')) {
    /**
     * Create brand name from company's name or data
     *
     * @param array $input
     * @param string $key
     * 
     * @return string
     */
    function checkOrMakeInvoiceMark($input = [], $key = '') {
        if (is_array($input) && !empty($key)) {
            if (checkKeyInArray($input, $key) != null) {
                return $input[$key];
            }
    
            else {
                return strtoupper(substr($input['name'], 0, 5));
            }
        }
    }
}