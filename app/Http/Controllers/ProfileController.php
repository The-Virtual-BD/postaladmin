<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles.profile');

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
     * @param  \App\Http\Requests\StoreProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profiles.edit');
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

        $user = User::find($id);
        $profile = Profile::where('user_id',$id)->first();

        if ($request->file('profile_picture')) {
            $image = $request->file('profile_picture');
            $image_full_name = time().'_'.$user->name.$user->id.'.'.$image->extension();
            $upload_path = 'images/pp/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $profile->photo = $image_url;
            $profile->save();
            return redirect()->route('myprofile');
        }


        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed'],
            ]);

            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('myprofile');
        }

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->save();




        $profile->first_name = $request->firstname;
        $profile->last_name = $request->lastname;
        $profile->phone = $request->phone;
        $profile->save();

        return redirect()->route('myprofile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
