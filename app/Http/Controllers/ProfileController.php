<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Mail\profileChanged; // add
use App\Jobs\SendUpdatedMail; // add

class ProfileController extends Controller
{
    protected $sessionKey = 'Profiledata';
    // to edit screen
    public function edit(User $user){
        if($data=Session::get($this->sessionKey)){
            $user->fill($data);
        }else{
            $user = auth()->user();
        }
        return view('profile.edit')->with(compact('user'));
    }
    // to validate data and to go update
    public function validation(Request $request){
        $data=$request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'gender' => 'required',
            'nrc' => 'required',
            'password' => ' required|string|min:4|confirmed',
            'phone' => 'required',
            'address' => 'required'
        ]);
        Session::put($this->sessionKey, $data);
        return redirect()->route('profile.update');
    }
    // to confirmation screen
    public function confirm(){
        if (! $data=Session::get($this->sessionKey)){
            return redirect()->route('profile.edit');
        }
        return view('profile.confirm')->with(compact('data'));
    }
    // to update and to return to user top
    public function update(){
        if (! $data=Session::get($this->sessionKey)){
            return redirect()->route('user.top');
        }
        if(Hash::needsRehash($data['password'])){ // if the password need to be rehashed
            $data['password']  =  Hash::make($data['password']);
        }
        $user=auth()->user();
        $user->fill($data)->save();
        // sending email notifying the user of the profile change
        // Mail::to($user->email)->send(new profileChanged($user));	// delete
        // Mail::to($user->email)->queue(new profileChanged($user));	// for reference
        SendUpdatedMail::dispatch($user);		// add
        
        Session::forget($this->sessionKey);
        return redirect(route('user.top'));
    }
}

