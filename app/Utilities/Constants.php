<?php

namespace App\Utilities;

use Illuminate\Support\Arr;

/**
 * Class Constants
 * @package Tamkeen\Ajeer\Utilities
 */
final class Constants
{

    /**
     * cons user types
     */
    const USERTYPES = [
        'SuperAdmin' => 1,
        'Admin' => 2,
    ];



    /**
     * list user types
     *
     * @return array
     */
    private static function userTypes()
    {
        return array_flip(self::USERTYPES);
    }



    /**
     * @param $name
     * @param $arguments
     *
     * @return string
     * you get a list of any dropdown translated
     * if you want to get specfic value just pass the key
     *
     * Example:
     * Constants::religions();
     * array:2 [ 0 => "general.non_muslim", 1 => "general.muslim"]
     * Constants::religions(1);
     * array:2 [ 1 => "general.muslim"]
     *
     * You can also pass array for the path of the translation file like
     * Constants::religions(1,['file' => 'banks'])
     *
     * this will override the default file of the translation ( default ) if you want
     */
    public static function __callStatic($name, $arguments)
    {
        $values = static::$name();
        if (!is_array($values)) {
            return;
        }

        list($file, $arguments) = self::checkForFileInputParameter($arguments);
        if (!empty($arguments)) {
            $values = array_only($values, $arguments);

            if (count($values) === 1) {
                $value = Arr::flatten($values);

                return $value[0];
            }
        }

        $translatedValues = array_map(function ($value) use ($file) {
            return $value;
        }, $values);

        return $translatedValues;
    }

    /**
     * @param $arguments
     *
     * @return mixed|string
     *
     * This method check for the passed file parameter to the array like this
     * [ 'file' => 'banks' ]
     */
    private static function checkForFileInputParameter($arguments)
    {
        $file = 'labels';

        foreach ($arguments as $key => $argment) {

            if (is_array($argment)) {
                $exist = array_key_exists('file', $argment);
                if ($exist) {
                    $file = $argment['file'];
                }
                unset($arguments[$key]);
            }
        }

        return [$file, $arguments];
    }
}
