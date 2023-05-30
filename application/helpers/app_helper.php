<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('uri_is')) {
    function uri_is(...$patterns)
    {
        foreach ($patterns as $pattern) {
            if (fnmatch($pattern, uri_string())) {
                return true;
            }
        }

        return false;
    }
}