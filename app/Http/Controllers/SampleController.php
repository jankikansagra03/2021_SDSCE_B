<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Support\Facades\File;

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
            'pic' => 'required|max:300|mimes:jpg,png,gif,bmp'

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
        $h = "";
        foreach ($req->hobby as $h1) {
            $h = $h . $h1 . ",";
        }
        // $h=implode(',',$req->hobby);
        $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
        $req->pic->move('Images/profile_pictures/', $pic_name);
        $reg = new Registration();
        $reg->fullname = $req->fn;
        $reg->email = $req->em;
        $reg->password = $req->pwd;
        $reg->mobile = $req->mobile;
        $reg->gender = $req->gender;
        $reg->qualification = $req->qualification;
        $reg->age = $req->age;
        $reg->hobbies = $h;
        $reg->address = $req->address;
        $reg->pic = $pic_name;
        if ($reg->save()) {
            session()->flash('success', 'Registration Success');
        } else {
            session()->flash('error', 'Registration Failed');
        }
        return view('register_form');
    }
    public function fetch_random_data()
    {
        // $a1=20;
        // $a2=30;
        // $a3=40;

        $a = array('a1' => '20', 'a2' => '30', 'a3' => '40');
        return view('display_random_data', compact('a'));
    }

    public function fetch_data_registration()
    {
        $r = Registration::select()->get();
        return view('display_registration_data', compact('r'));
    }
    public function fetch_data_for_edit($email)
    {
        $reg_data = Registration::where('email', $email)->get();
        return view('edit_registration_form', compact('reg_data'));
    }
    public function delete_user_registration($email)
    {
        return $email;
    }
    public function deactivate_user_registration($email)
    {
        return $email;
    }
    public function activate_user_registration($email)
    {
        return $email;
    }
    public function update_data_registration(Request $req)
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
            'pic' => 'max:300|mimes:jpg,png,gif,bmp'

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
            'pic.max' => 'Select a file of max 25 KB',
            'pic.mimes' => 'Select jpg or png or bmp file to uplaod',
            'hobby.required' => 'Please select a hobby',
            'qualification.required' => 'Please select a qualification',
            'address.required' => 'Address field cannot be empty',
            'gender.required' => 'Please select your Gender',
            'age.required' => 'Please enter your age'
        ]);
        $h = implode(",", $req->hobby);
        $data = Registration::where('email', $req->em)->first();
        if ($req->hasFile('pic')) {
            $file_path = "images/profile_pictures/" . $data['pic'];
            if (File::exists($file_path)) {
                File::delete($file_path);
            }
            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('images/profile_pictures/', $pic_name);
            $data->where('email', $req->em)->update(array('fullname' => $req->fn, 'password' => $req->pwd, 'mobile' => $req->mobile, 'age' => $req->age, 'gender' => $req->gender, 'hobbies' => $h, 'qualification' => $req->qualification, 'address' => $req->address, 'pic' => $pic_name));
        } else {
            $data->where('email', $req->em)->update(array('fullname' => $req->fn, 'password' => $req->pwd, 'mobile' => $req->mobile, 'age' => $req->age, 'gender' => $req->gender, 'hobbies' => $h, 'qualification' => $req->qualification, 'address' => $req->address));
        }
        return redirect('display_data');
    }
}
