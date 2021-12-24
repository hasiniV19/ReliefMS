<?php

namespace app\handlers;

class FileValidateRequest extends ValidateRequest
{
    private $targetFile;
    private $fileType;

    public function __construct(string $key, $value, $targetFile, $fileType)
    {
        parent::__construct($key, $value);
        $this->targetFile = $targetFile;
        $this->fileType = $fileType;
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