<?php

namespace Kodcanlisi\Jsoon;

use Kodcanlisi\Jsoon\JsoonInterface;

class Jsoon implements JsoonInterface
{

    public static $size;
    public $JSON;
    public $prop = [];
    public $settings = [
        'minAge' => 3,
        'maxAge' => 5,
        'upper'=>[],
        'lower'=>[]
    ];
    const NAMES = ['jhon', 'jack', 'can'];


    public static function size(int $size)
    {
        if ($size < 1) {
            throw new Exception("Size must at least 1.");
        }
        self::$size = $size;
        return new self;
    }


    public function config(array $arr)
    {
        $this->prop = $arr['prop'];
        $this->settings = $arr['settings'];
        return $this;
    }

    public function addProp(...$arr)
    {
        foreach ((array) $arr as $key => $value) {
            array_push($this->prop, $value);
        }
        return $this;
    }


    public function json()
    {
        $arr = $this->prop;
        for ($i = 0; $i < count($arr); $i++) {
            $propName = $arr[$i];
            self::push($propName);
        }

        return $this->JSON;
    }


    //ADDING ARRAY
    public function push(string $prop)
    {
        for ($t = 0; $t <= self::$size; $t++) {
            switch ($prop) {
                case 'id':
                    $this->JSON[$t][$prop] = $t;
                    break;

                case 'name':
                    $randomName =self::NAMES[array_rand(self::NAMES)];
                    $settings = (array)$this->settings;
                    if (in_array("name", $settings['upper'])) {
                        $this->JSON[$t][$prop] = strtoupper($randomName);
                    } else if (in_array("name", $settings['lower'])) {
                        $this->JSON[$t][$prop] = strtolower($randomName);
                    } else {
                        $this->JSON[$t][$prop] = $randomName;
                    }
                    break;

                case 'age':
                    $this->JSON[$t][$prop] = rand($this->settings['minAge'], $this->settings['maxAge']);
                    break;

                default:
                    break;
            }
        }
    }
    //ADDING ARRAY
}
