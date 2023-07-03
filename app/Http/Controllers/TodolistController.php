<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodolistController extends Controller
{
    //
    public function save(Request $request){
        $request->validate([
            'title'=>["required","string","max:125"],
            "start"=>["required"],
            "end"=>['required'],
            "num_repet"=>['required']
        ],[
            'title.required'=>'يرجى ادخال العنوان',
            "start.required"=>"تاريخ البداء",
            "end.required"=>"تاريخ الانتهاء",
            "num_repet.required" => "يرجى ادخال عدد مرات التكرار"
        ]);
        $code = random_int(0,100000000);

        if($request->type_repet == "once"){
            TodoList::create([
                "note"=>$request->note,
                "title"=>$request->title,
                "start"=>$request->start,
                "end"=>$request->end,
                "user_id"=>Auth::id(),
                "created_by"=>Auth::user()->name,
                "num_repet"=>$request->num_repet,
                "type_repet"=>$request->type_repet,
                "code"=>$code
            ]);
        }elseif($request->type_repet == "wekly"){
            for($i = 0;$i<$request->num_repet;$i++){
                $start = $request->start;
                $start = strtotime($start);
                $start = strtotime("+$i weeks", $start);
                $end = $request->end;
                $end = strtotime($end);
                $end = strtotime("+$i weeks", $end);
                TodoList::create([
                    "note"=>$request->note,
                    "title"=>$request->title,
                    "start"=>date('Y-m-d h:i:s', $start),
                    "end"=>date('Y-m-d h:i:s', $end),
                    "user_id"=>Auth::id(),
                    "created_by"=>Auth::user()->name,
                    "num_repet"=>$request->num_repet,
                    "type_repet"=>$request->type_repet,
                    "code"=>$code
                ]);
            }
        }
        elseif($request->type_repet == "mounthly"){
            for($i = 0;$i<$request->num_repet;$i++){
                $start = $request->start;
                $start = strtotime($start);
                $start = strtotime("+$i Months", $start);
                $end = $request->end;
                $end = strtotime($end);
                $end = strtotime("+$i Months", $end);
                TodoList::create([
                    "note"=>$request->note,
                    "title"=>$request->title,
                    "start"=>date('Y-m-d h:i:s', $start),
                    "end"=>date('Y-m-d h:i:s', $end),
                    "user_id"=>Auth::id(),
                    "created_by"=>Auth::user()->name,
                    "num_repet"=>$request->num_repet,
                    "type_repet"=>$request->type_repet,
                    "code"=>$code
                ]);
            }
        }
    }

    public function Data($id){
        return response()->json(TodoList::find($id));
    }

    public function getAppointment($id){
        $todo = TodoList::select(DB::raw("min(title) as title"),DB::raw("min(start) as start"),DB::raw("min(end) as end"),DB::raw("min(code) as code"),DB::raw("max(status) as status"),DB::raw("min(note) as note"),DB::raw("min(num_repet) as num_repet"),DB::raw("min(type_repet) as type_repet"))
        ->where("code",$id)->GroupBy("code")->get();

        return response()->json($todo);
    }

    public function edit(Request $request)
    {
        $request->validate([
            'title'=>["required","string","max:125"],
            "start"=>["required"],
            "end"=>['required'],
            "num_repet"=>['required'],
            "code"=>['required']
        ],[
            'title.required'=>'يرجى ادخال العنوان',
            "start.required"=>"تاريخ البداء",
            "end.required"=>"تاريخ الانتهاء",
            "num_repet.required" => "يرجى ادخال عدد مرات التكرار"
        ]);
        $code = $request->code;

        TodoList::where("code",$code)->delete();

        if($request->type_repet == "once"){
            TodoList::create([
                "note"=>$request->note,
                "title"=>$request->title,
                "start"=>$request->start,
                "end"=>$request->end,
                "user_id"=>Auth::id(),
                "created_by"=>Auth::user()->name,
                "num_repet"=>$request->num_repet,
                "type_repet"=>$request->type_repet,
                "code"=>$code
            ]);
        }elseif($request->type_repet == "wekly"){
            for($i = 0;$i<$request->num_repet;$i++){
                $start = $request->start;
                $start = strtotime($start);
                $start = strtotime("+$i weeks", $start);
                $end = $request->end;
                $end = strtotime($end);
                $end = strtotime("+$i weeks", $end);
                TodoList::create([
                    "note"=>$request->note,
                    "title"=>$request->title,
                    "start"=>date('Y-m-d h:i:s', $start),
                    "end"=>date('Y-m-d h:i:s', $end),
                    "user_id"=>Auth::id(),
                    "created_by"=>Auth::user()->name,
                    "num_repet"=>$request->num_repet,
                    "type_repet"=>$request->type_repet,
                    "code"=>$code
                ]);
            }
        }
        elseif($request->type_repet == "mounthly"){
            for($i = 0;$i<$request->num_repet;$i++){
                $start = $request->start;
                $start = strtotime($start);
                $start = strtotime("+$i Months", $start);
                $end = $request->end;
                $end = strtotime($end);
                $end = strtotime("+$i Months", $end);
                TodoList::create([
                    "note"=>$request->note,
                    "title"=>$request->title,
                    "start"=>date('Y-m-d h:i:s', $start),
                    "end"=>date('Y-m-d h:i:s', $end),
                    "user_id"=>Auth::id(),
                    "created_by"=>Auth::user()->name,
                    "num_repet"=>$request->num_repet,
                    "type_repet"=>$request->type_repet,
                    "code"=>$code
                ]);
            }
        }
    }
    public function delete($id){
        TodoList::where("code",$id)->delete();
    }
}
