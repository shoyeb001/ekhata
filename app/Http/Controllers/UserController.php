<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Svg\Tag\Rect;

class UserController extends Controller
{
    public function Register(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
            "name" => "required",
            "confirm_password" => "required"
        ]);

        $name = $request->input("name");
        $email = $request->input("email");
        $password = $request->input("password");
        $confirm_password = $request->input("confirm_password");

        $data = User::where("email", $email)->get()->count();

        if ($data > 0) {
            $request->session()->flash("msg", "user already exists");
            return redirect()->route("view.login");
        }
         else {
            if ($password != $confirm_password) {
                $request->session()->flash("msg", "Password does not match");
                return redirect()->route("view.signup");
            } 
            else {
                $user = array(
                    "name" => $name,
                    "email" => $email,
                    "password" => $password,
                    'updated_at' => date('y-m-d h:i:s'),
                    'created_at' => date('y-m-d h:i:s')
                );
                User::insert($user);
            }
            /* $data=["name"=>$name,"email"=>$email];
                $user['to']= $email;
                Mail::send("auth/mail",$data,function($messeges) use($user){
                    $messeges->to($user["to"]);
                    $messeges->subject("verify email");
                });
                $request->session()->flash("msg","Account created successfully. Please verify your email."); */
                $request->session()->flash("msg","Successfully Signup complete");
                return redirect()->route("view.login");
        }
    }

    public function Login(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        $email = $request->input("email");
        $password = $request->input("password");

        $data = User::where("email",$email)->where("password",$password)->get();

        if (!isset($data[0])) {
            $request->session()->flash("msg","please enter correct login information");
            return redirect()->route("view.login");
        }else {
            $request->session()->put("USER_ID", $data[0]->id);
            
            if ($request->input("remember")!=NULL) {
                setcookie('user_email',$email,time()+60*60*24*30);
                setcookie('user_password',$password,time()+60*60*24*30);
            }
            return redirect()->route("user.dashboard");
        }
    }

    public function Logout(Request $request){
        $request->session()->forget("USER_ID");
        return redirect(url("/"));
    }

    public function ChangeEmail(){
        $user = User::where("id",session("USER_ID"))->get();
        return view("backend.user.change_email", compact("user"));
    }

    public function UpdateEmail(Request $request){
        $email = $request->email;
        $password = $request->password;

        $user = User::where("id",session("USER_ID"))->get();
        if ($user[0]->password == $password) {
            $data = array(
                "email"=>$email
            );

            User::where("id",session("USER_ID"))->Update($data);

            $notification = array(
                'message' => 'Email updated Successfully',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Enter Password Correctly',
                'alert-type' => 'error'
            );
        }

        return redirect()->route("change.email")->with($notification);
    }

    public function ChangePassword(){
        return view("backend.user.change_password");
    }

    public function UpdatePassword(Request $request){
        $old_pass = $request->old_password;
        $new_pass = $request->new_password;
        $con_pass = $request->con_password;
        $id = session("USER_ID");

        $user = User::where("id",$id)->get();

        if ($old_pass == $user[0]->password) {
            if ($new_pass == $con_pass) {
                $data = array(
                    "password"=>$new_pass,
                );

                User::where("id",$id)->update($data);

                $notification = array(
                    'message' => 'password Updated Successfully',
                    'alert-type' => 'success'
                );
            }else {
                $notification = array(
                    'message' => 'password and confirm password does not match',
                    'alert-type' => 'erroe'
                );
            }
        }else {
            $notification = array(
                'message' => 'Enter password correctly',
                'alert-type' => 'erroe'
            );
        }

        return redirect()->route("change.password")->with($notification);

    }


}
