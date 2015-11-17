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
class Uploader{
    private $imageType;
    private $image;
    public $message=FALSE;
    
    private function getInfo($file){
        $temp=getimagesize($file);
        $this->imageType=$temp[2];
        if( $this->imageType == IMAGETYPE_JPEG ){
            $this->image = imagecreatefromjpeg($file);
        }
        elseif( $this->imageType == IMAGETYPE_GIF ){
            $this->image = imagecreatefromgif($file);
        }
        elseif( $this->imageType == IMAGETYPE_PNG ){
            $this->image = imagecreatefrompng($file);
        }
    }
    private function checkExt($file){
        $this->getInfo($file);
        $stat=FALSE;
        if( $this->imageType == IMAGETYPE_JPEG ){
            $stat=TRUE;
        }
        elseif( $this->imageType == IMAGETYPE_GIF ){
            $stat=TRUE;
        }
        elseif( $this->imageType == IMAGETYPE_PNG ){
            $stat=TRUE;
        }
        return $stat;
    }
    private function save($file,$path){
        $this->getInfo($file);
        if( $this->imageType == IMAGETYPE_JPEG ){
            if(imagejpeg($this->image,$path)){
                $this->message=TRUE;
            }
            else{
                $this->message=FALSE;
            }
        }
        elseif( $this->imageType == IMAGETYPE_GIF ){
            if(imagegif($this->image,$path)){
                $this->message=TRUE;
            }
            else{
                $this->message=FALSE;
            }
        }
        elseif( $this->imageType == IMAGETYPE_PNG ){
            if(imagepng($this->image,$path)){
                $this->message=TRUE;
            }
            else{
                $this->message=FALSE;
            }
        }
        return $this->message;
    }
    public function saveImage($file,$path){
        $up=$this->checkExt($file['tmp_name']);
        if($up===FALSE){
            return "Not allowed file!";
        }
        else{
            $up=$this->save($file['tmp_name'],$path.$file['name']);
            return $up;
        }
    }
}