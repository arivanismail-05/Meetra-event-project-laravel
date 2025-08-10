<?php

namespace App\Trait;


trait DeleteFile
{
    public function delete_file($file_path)
    {
        if(file_exists($file_path)){
            unlink($file_path);
        }
    }
}
