<?php

namespace App\Http\Controllers;

use App\PropertyPicture;
use App\RentalUnit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class PropertyPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, RentalUnit $property)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption'     => 'max:50|regex:/^[A-Za-z ]+$/',
            'photo'     => 'required|image|mimes:jpeg,png|min:1|max:2048'
        ]);

        // Check if it fails //
        if( $validation->fails() ) {
            return Response::json($validation->errors()->getMessages(), 400);
        }

        /**
         * Upload the image
         */
        $image = new PropertyPicture();

        $file = $request->file('photo');
        $destination_path = 'propertyImages/' . $property->id . '/';
        $filename = time() . '_'  . $file->getClientOriginalName();
        $filename_thumb = time() . '_thumb_'  . $file->getClientOriginalName();

        /**
         * Check whether the path exists
         */
        if(!File::exists($destination_path)) {
            File::makeDirectory($destination_path);
        }

        /**
         * Save the image to the specified path under the specified name
         */
        Image::make($file->getRealPath())->resize(null, 300, function($constraint) {
            $constraint->aspectRatio();
        })->save($destination_path . $filename_thumb);
        $file->move($destination_path, $filename);

        /**
         * Save the image into the database
         */
        $image->location = $destination_path . $filename;
        $image->thumb_location = $destination_path . $filename_thumb;
        $image->caption = $request->input('caption');
        $image->mime_type = $file->getClientMimeType();
        $property->propertyPicture()->save($image);

        return Response::json(RentalUnit::with('User')->with('PropertyPicture')->where('id', $property->id)->first());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
