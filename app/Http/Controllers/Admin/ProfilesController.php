<?php

namespace App\Http\Controllers\Admin;

use \App\Http\Requests\ProfilesPostRequest;
use \App\Models\Profiles;
use \App\Http\Controllers\Controller;

class ProfilesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $profiles = Profiles::select('id', 'name', 'email', 'admin', 'created_at')
        ->orderBy('id', 'DESC')
        ->paginate(5);

        return view('admin.profiles.index',
            [
                'profiles' => $profiles
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profiles  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profiles $profile)
    {
        return view('admin.profiles.edit', 
            ['profile' => Profiles::find($profile->id)]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Resources  $resources
     * @param  \App\Http\Requests\ProfilesPostRequest  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Profiles $profile, ProfilesPostRequest $request)
    {
        $result = Profiles::find($profile->id)->update($request->validated());

        // dd($result->toSql());
        if($result)
            return redirect()->route('admin.profiles.index')
                ->with('success', 'Профиль изменен');
        else
            return back()->with('error', 'Ошибка изменения профиля');
    }
}
