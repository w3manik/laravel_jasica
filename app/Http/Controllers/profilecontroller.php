<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;
use Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;


class profilecontroller extends Controller
{
    function profile(){
        return view('admin.profile.index');
    }

    function profiname(Request $request){
        $user_id = Auth::id();
        User::find($user_id)->update([
            'name'=>$request->name,
        ]);
        return back()->with('upnae', 'Name Updated');
    }

    function prfpasschange(Request $request){
        $request->validate([
            'old_password'=>'required',
            'password'=>'confirmed',
            'password'=>'required',
            'password'=>Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols(),
        ]);

        if(Hash::check($request->old_password, Auth::user()->password)) {
            $user_id = Auth::id();
            User::find($user_id)->update([
                'password'=>bcrypt($request->password),
            ]);
            return back()->with('pass_upd', 'Password Updated!');
        }
        else{
            return back()->with('wrong_pas', 'Old Password Not Correct');
        }

    }

    function profilechange(Request $request){
        $request->validate([
           'profile_photo'=>'image',
           'profile_photo'=>'file|max:512',
        ]);

        if(Auth::user()->profile_photo != 'default.jpg'){
            $deleth_path = public_path()."/uplodes/profile/".Auth::user()->profile_photo;
            unlink($deleth_path);
        }

        $new_profile_photo = $request->profile_photo;
        $extention = $new_profile_photo->getClientOriginalExtension();
        $new_profile_name = Auth::id().'.'.$extention;

        Image::make($new_profile_photo)->save(base_path('public/uplodes/profile/'.$new_profile_name));
        User::find(Auth::id())->update([
            'profile_photo'=>$new_profile_name,
        ]);
        return back()->with('proimg', 'Profile Image Update');
    }



}
