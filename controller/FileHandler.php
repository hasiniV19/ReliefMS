<?php

namespace app\controller;

class FileHandler
{
        private $target_dir ;
        private $target_file ;
        private $uploadOk ;
        private $imageFileType;

    /**
     * @param string $target_dir
     * @param string $target_file
     * @param int $uploadOk
     * @param string $imageFileType
     */
    public function __construct()
    {
        $this->target_dir = "uploads/";
        $this->target_file = $this->target_dir . basename($_FILES["fileToUpload"]["name"]);
        $this->uploadOk = 1 ;
        $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION)) ;
    }


    public function saveFile(){

    }

    public function getFile()
    {
        if($_FILES["fileToUpload"]["size"] == 0){

        }
    }
}