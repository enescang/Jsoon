<?php

namespace Kodcanlisi\Jsoon;

use Kodcanlisi\Jsoon\JsoonInterface;

class Jsoon implements JsoonInterface
{

    public static $size;
    public $JS;
    public $prop = [];
    public $settings = [
        'minAge' => 3,
        'maxAge' => 5
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
            if ($propName == 'name' || $propName == 'id' || $propName == 'age') {
                self::push($propName);
            }
        }

        return json_encode($this->JS, JSON_UNESCAPED_UNICODE);
    }


    //ADDING ARRAY
    public function push(string $prop)
    {
        for ($t = 0; $t <= self::$size; $t++) {
            switch ($prop) {
                case 'id':
                    $this->JS[$t][$prop] = $t;
                    break;

                case 'name':
                    if (in_array("name", (array) $this->settings['upper'])) {
                        $this->JS[$t][$prop] = strtoupper(self::NAMES[array_rand(self::NAMES)]);
                    } else if (in_array("name", (array) $this->settings['lower'])) {
                        $this->JS[$t][$prop] = strtolower(self::NAMES[array_rand(self::NAMES)]);
                    } else {
                        $this->JS[$t][$prop] = self::NAMES[array_rand(self::NAMES)];
                    }
                    break;

                case 'age':
                    $this->JS[$t][$prop] = rand($this->settings['minAge'], $this->settings['maxAge']);
                    break;

                default:
                    break;
            }
        }
    }
    //ADDING ARRAY
}
