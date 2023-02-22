<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileuploadContoller extends Controller
{
    function onfileupload(Request $request){

        // $request->file(key:'FileKey')->store(path:'image');

       $result= $request->FileKey->store(path:'image');

       return $result;

    }
}
