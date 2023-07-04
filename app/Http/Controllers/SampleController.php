<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function fetch_data(Request $req)
    {

        return $req->input();
    }

    public function register_fetch_data(Request $req)
    {
        $req->validate([
            'fn' => 'required|min:3|max:20',
            'em' => 'required|email',
            'pwd' => 'required|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'pwd_confirmation' => 'required',
            'age' => 'required',
            'mobile' => 'required|numeric|digits:10',
            'gender' => 'required',
            'hobby' => 'required',
            'qualification' => 'required',
            'address' => 'required',
            'pic' => 'required|max:100|mimes:jpg,png,gif,bmp'

        ], [
            'fn.required' => 'Full name cannot be empty',
            'fn.min' => 'Full name must contain minimum 3 characters',
            'fn.max' => 'Full name must contain maximum of 30 characters',
            'fn.regex' => 'Full name must contain only letters and spaces',
            'em.required' => 'Email address canniot be empty',
            'em.email' => 'invalid email address',
            'pwd.required' => 'Password field cannot be empty',
            'pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'pwd.confirmed' => 'Password and Confirm Password must match',
            'pwd_confirmation.required' => 'Confirm Password must not be empty',
            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must conatin only 10 digits',
            'mobile.numeric' => 'Mobile number must contain digits only',
            'pic.required' => 'Please select a file to uplaod',
            'pic.max' => 'Select a file of max 25 KB',
            'pic.mimes' => 'Select jpg or png or bmp file to uplaod',
            'hobby.required' => 'Please select a hobby',
            'qualification.required' => 'Please select a qualification',
            'address.required' => 'Address field cannot be empty',
            'gender.required' => 'Please select your Gender',
            'age.required' => 'Please enter your age'
        ]);
        $original_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('images/profile_pictures', $original_name);
        $hobbies = $req->input('hobby');
        return view('display_register', compact('req', 'hobbies'));
    }
    public function fetch_random_data()
    {
        // $a1=20;
        // $a2=30;
        // $a3=40;

        $a = array('a1' => '20', 'a2' => '30', 'a3' => '40');
        return view('display_random_data', compact('a'));
    }
}
