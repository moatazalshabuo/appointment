<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todo = TodoList::select("id", "start", "end", "note as description",'type_repet')->where('user_id', Auth::id())->get();

        return view('public/home', compact("todo"));
    }

    public function appointment()
    {
        $todo = TodoList::select(DB::raw("min(title) as title"), DB::raw("min(start) as start"), DB::raw("min(end) as end"), DB::raw("min(code) as code"), DB::raw("max(status) as status"), DB::raw("min(note) as note"), DB::raw("min(num_repet) as num_repet"), DB::raw("min(type_repet) as type_repet"))
            ->where("user_id", Auth::id())->GroupBy("code")->get();
        return view("public/appointment", compact('todo'));
    }

    public function appointment_type($type)
    {
        $todo = TodoList::where(["user_id"=> Auth::id(),'type_repet'=>$type])->get();

        return view('public/appointment2',compact('todo','type'));
    }

    public function profile()
    {
        return view('public/profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$request->id],
            "phone"=>['required',"string"]
        ]);

        User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            "phone"=>$request->phone
        ]);
    }
}
