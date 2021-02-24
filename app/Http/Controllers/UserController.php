<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email' => 'required|email',
            'user_name' => 'required',
            'user_mobile' => 'required|unique:users,user_mobile',
            'user_password' => 'required',
            'user_type' => 'required',
            'lat' => 'required',
            'long' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            $erro_msg = [];
            foreach ($messages->all() as $message) {
                array_push($erro_msg,$message);
            }
            return response(['status' => 201, 'msg' => $erro_msg]);
        }else{
            $user = User::create($request->all());
            return response(['status' => 200, 'msg' => 'Register SuccessFully', 'data' => $user], 200);
        }
    }

    public function update(Request $request){

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            $erro_msg = [];
            foreach ($messages->all() as $message) {
                array_push($erro_msg, $message);
            }
            return response(['status' => 201, 'msg' => $erro_msg]);
        }else{
            $author = User::findOrFail($request->all()['user_id']);
            $author->update($request->all());
            return response()->json($author, 200);
        }

    }


    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'user_mobile' => 'required',
            'user_password' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->errors();
            $erro_msg = [];
            foreach ($messages->all() as $message) {
                array_push($erro_msg,$message);
            }
            return response(['status' => 201, 'msg' => $erro_msg]);
        }else{
           $mobile = $request->all()['user_mobile'];
           $user_password = $request->all()['user_password'];
           $users = User::where('user_mobile', '=', $mobile)->where('user_password', '=', $user_password)->first();
            if(empty(!$users)){
                return response(['status' => 200, 'msg' => 'Login Successfully', 'data' => $users], 200);
            }else{
                return response(['status' => 201, 'msg' => 'Incrorrect login details'], 201);
            }
        }
    }

}
