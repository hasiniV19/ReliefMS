<?php

namespace app\handlers;

class FileValidator
{
    public function validateRequest(ValidateRequest $fileValidateRequest)
    {
        $file = $fileValidateRequest->getValue();
//        if (get_class($file) === "File"){
            $fileType = $file->getFileType();
            if ($file->getFileSize() > 15000000){
                $fileValidateRequest->setValidError($file->getFileName()." is too large");
                $fileValidateRequest->setIsValid(false);
            }
            elseif ($fileType !== "pdf" && $fileType !== "docx" && $fileType !== "jpeg" && $fileType !== "png" && $fileType !== "jpg"){
                $fileValidateRequest->setValidError($file->getFileName()." is not JPG, JPEG, PNG, PDF, DOCX type");
                $fileValidateRequest->setIsValid(false);
            }
        }
//    }
}