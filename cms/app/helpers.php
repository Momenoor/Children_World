<?php

use App\Services\HtmlService;
use Illuminate\Support\HtmlString;

if (!function_exists('svg')) {

    function svg($svg, $class = '', $svgClass = '', $mainPath = '')
    {
        if (empty($mainPath)) {
            $mainPath = 'media/svg/';
        }
        return new HtmlString(HtmlService::getSvg($svg, $class, $svgClass, $mainPath));
    }
}
if (!function_exists('icon')) {

    function icon($svg, $class = '', $svgClass = '', $mainPath = '')
    {
        if (empty($mainPath)) {
            $mainPath = 'media/icons/duotune';
        }
        return new HtmlString(HtmlService::getSvg($svg, $class, $svgClass, $mainPath));
    }
}

if (!function_exists('isActive')) {

    function isActive($route)
    {
        if (empty($route)) {
            return false;
        }

        return request()->is($route) || request()->is($route . '/*');
    }
}
