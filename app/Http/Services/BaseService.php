<?php


namespace App\Http\Services;


class BaseService
{
    function updateLoadFile($request, $key, $nameFolder)
    {
        return $request->file($key)->store($nameFolder, 'public');
    }
}
