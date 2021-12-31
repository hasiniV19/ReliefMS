<?php

namespace app\controller;

use app\handlers\File;
use app\handlers\FileValidateRequest;
use app\handlers\ValidateRequest;

class FileHandler
{
        private $targetDir;
        private $targetFile;
        private $fileName;
        private $fileInputName;
        private $fileType;

    /**
     * @param string $target_dir
     * @param string $target_file
     * @param int $uploadOk
     * @param string $imageFileType
     */
    public function __construct(string $target_dir, $fileInputName)
    {
        $this->targetDir = $target_dir;
        $this->fileInputName = $fileInputName;
    }


    public function saveFile(){
        if (move_uploaded_file($_FILES[$this->fileInputName]["tmp_name"], $this->targetFile)){
            return true;
        }
        return false;
    }

    public function getFile($request_id)
    {
        $fileValidateRequest = new ValidateRequest($this->fileInputName, "");
        if($_FILES[$this->fileInputName]["size"] === 0){
            $fileValidateRequest->setIsValid(false);
            $fileValidateRequest->setValidError("*GS certificate is required");
            return $fileValidateRequest;
        }
        $this->targetFile = $this->targetDir.$request_id.$_FILES[$this->fileInputName]["name"];
        $this->fileName = $_FILES[$this->fileInputName]["name"];
        $this->fileType = strtolower(pathinfo($this->targetFile, PATHINFO_EXTENSION));
        $file = new File($this->targetFile, $this->fileName, $this->fileType, $_FILES[$this->fileInputName]['size']);
        $fileValidateRequest->setValue($file);
        return $fileValidateRequest;
    }
}