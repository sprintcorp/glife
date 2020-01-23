<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fileUpload($file)
    {
        $profileImage = $file;
        $profileImageSaveAsName = time() . Auth::id() . "file." . $profileImage->getClientOriginalExtension();
        $upload_path = 'photo/';
        $profile_image_url = $upload_path . $profileImageSaveAsName;
        $success = $profileImage->move($upload_path, $profileImageSaveAsName);
        return $profile_image_url;

    }
}
