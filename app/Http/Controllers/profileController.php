<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class profileController extends Controller
{
    // COBA
                public function ajaxImage(Request $request)
                {
                    if ($request->isMethod('get'))
                        return view('ajax_image_upload');
                    else {
                        $validator = Validator::make($request->all(),
                            [
                                'file' => 'image',
                            ],
                            [
                                'file.image' => 'Format tidak diperbolehkan (jpeg, png, bmp, gif, or svg)'
                            ]);
                        if ($validator->fails())
                            return array(
                                'fail' => true,
                                'errors' => $validator->errors()
                            );
                        $extension = $request->file('file')->getClientOriginalExtension();
                        $dir = 'uploads/';
                        $filename = uniqid() . '_' . time() . '.' . $extension;
                        $request->file('file')->move($dir, $filename);
                        return $filename;
                    }
                }

                public function deleteImage($filename)
                {
                    File::delete('uploads/' . $filename);
                }
            
    // COBA
}
