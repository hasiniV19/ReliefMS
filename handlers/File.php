<?php

namespace app\handlers;

class File
{
    private $targetFile;
    private $fileName;
    private $fileType;
    private $fileSize;

    public function __construct($targetFile, $fileName, $fileType, $fileSize)
    {
        $this->targetFile = $targetFile;
        $this->fileName = $fileName;
        $this->fileType = $fileType;
        $this->fileSize = $fileSize;
    }

    /**
     * @return mixed
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @return mixed
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }


    public function getTargetFile()
    {
        return $this->targetFile;
    }

    public function getFileType()
    {
        return $this->fileType;
    }


}