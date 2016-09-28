<?php

/*
 * Файл с конфигом для проекта SmartStore
 * Тут будут описаны такие штуки как разрешения
 * картинок для динамической их ресайза и обрезки.
 * Любые конфигурации которые могут в коде использоваться
 * больше одного раза важно описывать в текущем конфиге
 * Комментирование конфига ОБЯЗАТЕЛЬНО!!!!!
 * Получить параметры конфигурации можно функцией config('custom')
 * Пример: получить путь к фото товаров config('custom')['products_path']
 */


return [

    /*
     * Пути к картинкам
     */

    'brands_path' => 'uploads/images/brands/', //путь к логотипам брендов
    'products_path' => 'uploads/images/products/', //путь к фото товаров

    /*
     * Разрешение картинок для брендов
     */
    'brands_img' => [['width' => 150, 'height' => 85],],


    /*
     * Разрешения для картинок товаров
     */

    'products_img' => [
        ['width' => 210, 'height' => 210], // храним картинки в 2х разрешениях
        ['width' => 325, 'height' => 400]
    ],

];