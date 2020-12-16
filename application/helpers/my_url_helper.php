<?php
defined('BASEPATH') or exit('No direct script access allowed');

defined('ADM') or define('ADM', 'admin');
defined('UPLOADS') or define('UPLOADS', 'uploads');

if (!function_exists('assets')) {
    function assets($url = NULL)
    {
        $link = ($url) ? $url . '/' : '';
        return base_url('public/assets') . '/' . $link;
    }
}

if (!function_exists('templates')) {
    function templates($url = NULL)
    {
        $link = ($url) ? $url . '/' : '';
        return base_url('public/templates') . '/' . $link;
    }
}

if (!function_exists('images')) {
    function images($url = NULL)
    {
        $link = ($url) ? $url . '/' : '';
        return base_url('public/images') . '/' . $link;
    }
}

if (!function_exists('admin_assets')) {
    function admin_assets($url = NULL)
    {
        $link = ($url) ? $url . '/' : '';
        return base_url('templates/' . ADM) . '/' . $link;
    }
}

if (!function_exists('admin_url')) {
    function admin_url($url = NULL)
    {
        $link = ($url) ? '/' . $url : '';
        return site_url(ADM) . $link;
    }
}

if (!function_exists('login_url')) {
    function login_url($url = NULL)
    {
        $link = ($url) ? '/' . $url : '';
        return admin_url('login') . $link;
    }
}

if (!function_exists('upload_path')) {
    function upload_path($path = NULL)
    {
        $link = ($path) ? $path . '/' : '';
        return './' . UPLOADS . '/' . $link;
    }
}

if (!function_exists('upload_url')) {
    function upload_url($url = NULL)
    {
        $link = ($url) ? $url . '/' : '';
        return site_url(UPLOADS) . '/' . $link;
    }
}
