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

class DBDriver{
    private static $conn;
    
    private function __construct()
    {
    
    }
    
    private static function connect()
    {
        if(!isset(self::$conn)){
            $conf = Configuration::get('db');
            $dsn = "mysql:host=".$conf['host'].";port=".$conf['port'].";dbname=".$conf['dbname'];
            try{
                self::$conn = new PDO($dsn, $conf['username'], $conf['password']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
            }catch(PDOException $e){
                self::disconnect();
                echo $e->getMessage();
            }
        }
        return self::$conn;
    }
    
    public static function disconnect(){
        self::$conn = null;
    }
    
    public static function execute($sql, $params = null)
    {
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
    }
    
    public static function all($sql, $params = null, $fetch_style = PDO::FETCH_OBJ)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetchAll($fetch_style);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
    
    public static function row($sql, $params = null, $fetch_style = PDO::FETCH_OBJ)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch($fetch_style);
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
    
    public static function one($sql, $params = null)
    {
        $result = null;
        try{
            $conn = self::connect();
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $result = $stmt->fetch(PDO::FETCH_NUM);
            $result = $result[0];
        }catch(PDOException $e){
            self::disconnect();
            echo $e->getMessage();
        }
        return $result;
    }
}

