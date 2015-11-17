<?php

/* 
 * Copyright 2014 juniorriau18 <juniorriau18@gmail.com>
 * SIKADA Script.
 * This script under GPL v2 License.
 */

class Autoload
{
    /**
     * Fungsi ini bertujuan mendaftarkan autoloader ke php
     * @param boolean $prepend apakah autoloader di tambahkan dari depan stack
     */
    public static function register($prepend = false)
    {
        set_include_path(get_include_path().PATH_SEPARATOR."cores");
        
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            spl_autoload_register(array(new self, 'load'), true, $prepend);
        } else {
            spl_autoload_register(array(new self, 'load'));
        }
    }    
    /**
     * Fungsi untuk meng-autoload kelas-kelas
     * @param string $class kelas yang hendak dimuat
     */
    public static function load($class)
    {
        require "{$class}.php";
    }
}