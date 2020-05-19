# Jsoon 

## About Jsoon
Jsoon is a PHP API for creating Json objects easily. Just set what you want in your json object. **id**, **name**, **age**, **description** or etc?. 

## Main Goal
When developing mobile or web apps you need some data to testing your code. Jsoon creates random data as you specify.

## Usage
**Get Jsoon from composer**
Just run this command line 
```
$ composer require kodcanlisi/jsoon
```
There are 3 types of usage for now. 
 ### 1: Set configuration array like this
 
```php
 $conf = [
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
```