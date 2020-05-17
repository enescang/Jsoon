<?php

namespace Kodcanlisi\Jsoon;

interface JsoonInterface
{
    /**
     * Set the size of json objects.
     * Size must greater than 0(zero).
     * 
     * @param int $size
     * @return static
     */
    public static function size(int $size);

    /**
     * Set the configuration of json objects.
     * Example: add "id" properties to json
     * add "name" properties to json
     * 
     * Check the example:
     * $conf = [
            'prop' => [
                'id',
                'name',
                'age',
            ],
            'settings' => [
                'minAge' => 1,
                'maxAge' => 10,
                'upper' => ['name'],
                'lower' => ['name']
            ]
        ];


      @param array $arr  
     */
    public function config(array $arr);

    /**
     * This function accepts infinite parameters.
     * Instead of config() addProp() can be used
     * 
     * @param $arr
     */
    public function addProp(...$arr);    

    /**
     * Get the json object
     * 
     */
    public function json();

}
