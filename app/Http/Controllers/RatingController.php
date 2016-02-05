<?php

namespace App\Http\Controllers;

use App\Rating;
use App\RentalUnit;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RentalUnit $rental)
    {
        return Response::json($rental->ratings()->avg('rating_points'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RentalUnit $rental, User $user)
    {
        $rating = $rental->ratings()->where('from_user', $user->id)->first();
//        if($rating->isEmpty()) {
//            $rating = new Rating();
//            $rating->on_rental = $rental->id;
//            $rating->from_user = $user->id;
//            $rating->rating_points = 0;
//            $rating->save();
//        }

//        $rating->avgRating = $rental->ratings()->avg('rating_points');
        return Response::json($rating);
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
    public function update(Request $request, RentalUnit $rental, User $user)
    {
        $rating = $rental->ratings()->where('from_user', $user->id)->first();
        if($rating == null)
            $rating = new Rating();
        $rating->fill(Input::all());
        $rating->save();
//        $rating->avgRating = $rental->ratings()->avg('rating_points');
        return Response::json($rating);

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
