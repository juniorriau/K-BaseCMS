<?php

/* 
 * Copyright (C) 2015 Junior Riau <juniorriau18@gmail.com>.
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301  USA
 */

class Autoload{
    /**
     * Fungsi ini bertujuan mendaftarkan autoloader ke php
     * @param boolean $prepend apakah autoloader di tambahkan dari depan stack
     */
    public static function register($prepend = false)
    {
        set_include_path(get_include_path().PATH_SEPARATOR."../cores");
        
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