<?php


namespace App\Trait;

Trait UploadFile {
    public function upload_file($request,$name,$folder)
    {
        $name_of_file = $request->file($name)->hashName();
        $request->file($name)->move($folder,$name_of_file);

        return $name_of_file;
    }
}