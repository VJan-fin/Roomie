<?php

namespace App\Http\Controllers;

use App\ProfileImage;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProfileImageController extends Controller
{
    public function __construct()
    {
        // Apply the jwt.auth middleware to all methods in this controller
        // except for the authenticate method. We don't want to prevent
        // the user from retrieving their token if they don't already have it
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        // Validation //
        $validation = Validator::make($request->all(), [
            'caption'     => 'max:50|regex:/^[A-Za-z ]+$/',
            'description' => 'max:500',
            'photo'     => 'required|image|mimes:jpeg,png|min:1|max:5120'
        ]);

        // Check if it fails //
        if( $validation->fails() ) {
            return Response::json($validation->errors()->getMessages(), 400);
        }

        /**
         * Upload the image
         */
        $image = $user->profileImage;
        if($image == null)
            $image = new ProfileImage();
        else
            File::delete($image->location);

        $file = $request->file('photo');
        $destination_path = 'profileImages/';
        $filename = $user->id . '_' . time() . '_'  . $file->getClientOriginalName();

        /**
         * Check whether the path exists
         */
        if(!File::exists($destination_path)) {
            File::makeDirectory($destination_path);
        }

        /**
         * Save the image to the specified path under the specified name
         */
        $file->move($destination_path, $filename);

        /**
         * Save the image into the database
         */
        $image->location = $destination_path . $filename;
        $image->caption = $request->input('caption');
        $image->description = $request->input('description');
        $image->mime_type = $file->getClientMimeType();
        $user->profileImage()->save($image);

        return Response::json(User::with('ProfileImage')->where('id', $user->id)->first());
//        return Response::json($request->file('photo')->getClientOriginalName());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, ProfileImage $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, ProfileImage $image)
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
    public function update(Request $request, User $user, ProfileImage $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, ProfileImage $image)
    {
        //
    }
}
