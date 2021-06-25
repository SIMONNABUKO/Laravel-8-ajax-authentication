<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
        if ($request->password !== $request->passconfirm) {
            return response()->json(['error'=>'passwords do not match']);
        }
        if (empty($request->name)||empty($request->email)||empty($request->password)||empty($request->passconfirm)) {
            return response()->json(['error'=>'No field should be empty!']);
        }
        $user = new User;
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= \Hash::make($request->password);
        if ($user->save()) {
            return response()->json(['success'=>'User Registered Successfully!']);
        };
    }
}
