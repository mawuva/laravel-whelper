<?php


use Illuminate\Support\Facades\Hash;

if (!function_exists('saltPassword')) {
    /**
     * Return salted password
     * 
     * @param string $pwd required
     * 
     * @return string
     */
    function saltPassword($pwd) {
        return $pwd;
    }
}

if (!function_exists('hashStr')) {
    /**
     * Return hashed string
     * 
     * @param string $str required
     * 
     * @return string
     */
    function hashStr($str) {
        return Hash::make($str, [
            'rounds' =>12
        ]);
    }
}

if (!function_exists('checkHashStr')) {
    /**
     * Check hashed string
     * 
     * @param string $str required
     * @param string $hash required
     * 
     * @return boolean
     */
    function checkHashStr($str, $hash) {
        return Hash::check($str, $hash);
    }
}

if (!function_exists('hashPassword')) {
    /**
     * Return hashed password
     * 
     * @param string $pwd required
     * @param boolean $salt
     * 
     * @return string
     */
    function hashPassword($pwd, $salt = false) {
        if ($salt == true) {
            return hashStr(saltPassword($pwd));
        }

        else {
            return hashStr($pwd);   
        }
    }
}

if (!function_exists('checkHashPassword')) {
    /**
     * Check hashed password
     * 
     * @param string $pwd required
     * @param string $hash required
     * @param boolean $salt
     * 
     * @return string
     */
    function checkHashPassword($pwd, $hash, $salt = false) {
        if ($salt == true) {
            return checkHashStr(saltPassword($pwd), $hash);
        }

        else {
            return checkHashStr($pwd, $hash);
        }
    }
}

if (!function_exists('encodeData')) {
    /**
     * Encrypt data
     * 
     * @param $data required
     * 
     * @return string
     */
    function encodeData($data) {
        return base64_encode(serialize($data));
    }
}

if (!function_exists('decodeData')) {
    /**
     * Decrypt data
     * 
     * @param $data required
     * 
     * @return mixed
     */
    function decodeData($data) {
        return unserialize(base64_decode($data));
    }
}

if (!function_exists('generateToken')) {
    /**
     * generate token
     * 
     * @param int $len
     * 
     * @return mixed
     */
    function generateToken($len = 3) {
        return bin2hex(openssl_random_pseudo_bytes($len));
    }
}