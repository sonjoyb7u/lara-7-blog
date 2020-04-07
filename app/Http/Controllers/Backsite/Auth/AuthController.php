<?php

namespace App\Http\Controllers\Backsite\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;

class AuthController extends Controller
{
    //
    public function showRegisterForm() {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('frontsite.register', 'categories');
    }

    public function processRegister(RegisterRequest $request) {
//        return $request->all();

//        return $request->input();
//        return $request->input('email');
//        return $request->input('f_name');

//        return $request->only(['f_name', 'email', 'password']);

//        return $request->except('_token');

//        echo $request->f_name;
//        echo $request->email;
//        echo $request->password;

//        echo request()->email;

//        return $request->method();
//        dd($request->all());

//        $this->validate($request, [
//            'f_name' => 'required|max:25',
//            'email' => 'required|email',
//            'password' => 'required|min:6|confirmed',
//            'password_confirmation' => 'required|min:6',
//
//        ], [
//            'f_name.required' => 'Full Name field must be filled out!',
//            'f_name.max:25' => 'Full Name must be less than 25 Character\'s!',
//            'email.required' => 'Email field must be filled out!',
//            'email.email' => 'Enter valid email address!',
//            'password.required' => 'Password field must be filled out!',
//            'password.min:6' => 'Password must be minimum 6 digits!',
//            'password_confirmation.required' => 'Confirm password field must be filled out!',
//            'password_confirmation.min:6' => 'Confirm Password must be minimum 6 digits!',
//
//        ]);

//        $request->validate([
//            'f_name' => 'required|max:25',
//            'email' => 'required|email',
//            'password' => 'required|min:6|confirmed',
//            'password_confirmation' => 'required|min:6',
//
//        ], [
//            'f_name.required' => 'Full Name field must be filled out!',
//            'f_name.max:25' => 'Full Name must be less than 25 Character\'s!',
//            'email.required' => 'Email field must be filled out!',
//            'email.email' => 'Enter valid email address!',
//            'password.required' => 'Password field must be filled out!',
//            'password.min:6' => 'Password must be minimum 6 digits!',
//            'password_confirmation.required' => 'Confirm password field must be filled out!',
//            'password_confirmation.min:6' => 'Confirm Password must be minimum 6 digits!',
//        ]);

        $image_file = $request->file('image');
        $image_file_ext = $image_file->getClientOriginalExtension();

        $new_image_file  = rand(9999, 99999)."_".date("Ymdhis")."_".rand(9999, 99999).".".$image_file_ext;
//        echo $new_file_name;

//        return $image_file->getMimeType();

        try {
            $user_data = [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'user_name' => $request->user_name,
                'image' => $new_image_file,
                'password' => bcrypt($request->password),
            ];

//        dd($user_data);

            if($image_file->isValid()) {

                if($image_file->getMimeType() == "image/jpeg" || $image_file->getMimeType() == "image/png") {

                    User::create($user_data);

                    $image_file->storeAs('images/users', $new_image_file);
//                $image_file->move('uploads/images/users/', $new_file_name);

                    $this->showMessage('success','Success, Registration Completed Please Login!');
                    return redirect('blog/login');

                } else {
//                Session::flash('ErrorMsg', 'Invalid Image file!');
                    $this->showMessage('danger','Error, Invalid Image file!');
                    return redirect()->back();
                }
            }

        } catch (\Exception $e) {
//            Session::flash('ErrorMsg', 'Invalid Image file!');
            $this->showMessage('danger','Error, Something went wrong!');
            return redirect()->back();

        }



    }


    public function showLoginForm() {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('frontsite.login', compact('categories'));

    }

    public function processLogin(LoginRequest $request) {
//        dd($request->all());

//        $this->validate($request, [
//            'email' => 'required',
//            'password' => 'required',
//
//        ], [
//            'email.required' => 'Email field must be filled out!',
//            'password.required' => 'Password field must be filled out!',
//
//        ]);

//        $request->validate([
//            'email' => 'required',
//            'password' => 'required',
//
//        ], [
//            'email.required' => 'Email field must be filled out!',
//            'password.required' => 'Password field must be filled out!',
//
//        ]);

        $user_login = $request->except('_token');

        $login = auth()->attempt($user_login);

        if($login) {
            $this->showMessage('success','Success, You are Logged In!');
            return redirect()->route('dashboard');

        }
//            Session::flash('ErrorMsg', 'Invalid Image file!');
            $this->showMessage('danger','Error, Invalid Credential please try again!');
            return redirect()->route('login');


    }

    public function logout() {
        auth()->logout();
        $this->showMessage('success','Success, You are Log out!');
        return redirect()->route('login');
    }



}
