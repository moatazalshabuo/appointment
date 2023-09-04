<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id','desc')->get();
        return view('public/users-status',compact('users'));
    }

    public function active($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->update();
        return redirect()->back()->with('success',"تم التقعيل بنجاح");
    }

    public function unactive($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->update();
        return redirect()->back()->with('success',"تم التقعيل بنجاح");
    }
}
