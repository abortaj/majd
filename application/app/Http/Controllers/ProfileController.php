<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Interfaces\UserInterface;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    protected $userInterface;

    public function __construct(UserInterface $userInterface){
        $this->userInterface = $userInterface;

    }

    public function edit($id){
        initSEO(auth()->user()->first_name);
        $user = User::where('id', $id)->with('skills')->first();

        return view('user.profile.single-profile', compact('user'));
    }

    public function updateInfo(ProfileRequest $request)
    {
        $id = auth()->user()->id;
        $data = $request->only(['first_name','last_name', 'bio']);
        $this->userInterface->update($id, $data);
        return response()->json([
            'message'=>trans('response.success'),
        ]);
    }
}
