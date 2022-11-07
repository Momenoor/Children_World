<?php

namespace App\Services;

use DOMDocument;
use DOMXPath;
use Illuminate\Support\Arr;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class HtmlService
{
    private $path;
    public static function returnPath($string)
    {
        if (self::hasDot($string)) {

            return self::returnPathFromDotString($string);
        }

        return self::returnPathFromString($string);
    }

    private static function returnPathFromDotString($string)
    {
        $arr = Str::of($string)->explode('.');
        $arr = $arr->join('\\');

        return $arr;
    }

    private static function returnPathFromString($string)
    {

        return $string;
    }

    private static function hasDot($string)
    {
        if (Str::contains($string, '.')) {
            return true;
        }
        return false;
    }

    public static function getSvg($path, $class = null, $svgClass = null, $mainPath = null)
    {
        if (!empty($mainPath)) {

            $mainPath = rtrim(trim($mainPath), '/') . '/';
        }
        $path =  $mainPath . self::returnPath($path) . '.svg';

        $file_path = public_path($path);

        if (!file_exists($file_path)) {

            return '';
        }

        $svg_content = file_get_contents($file_path);

        if (empty($svg_content)) {
            return '';
        }

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if (!empty($svgClass)) {
            foreach ($dom->getElementsByTagName('svg') as $element) {
                $element->setAttribute('class', $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $xpath = $dom->getElementsByTagName('path');
        foreach ($xpath as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = [
            'svg-icon',
            'flex-shrink-0',
            'w-6',
            'h-6',
            'text-gray-500',
            'transition duration-75',
            'group-hover:text-gray-900',
            'dark:text-gray-400',
            'dark:group-hover:text-white'
        ];

        if (!empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        $output = "<!--begin::Svg Icon | path: $path-->\n";
        $output .= '<span class="' . implode(' ', $cls) . '">' . $string . '</span>';
        $output .= "\n<!--end::Svg Icon-->";

        return $output;
    }
}
