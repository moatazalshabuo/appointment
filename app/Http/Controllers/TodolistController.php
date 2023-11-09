<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodolistController extends Controller
{
    //
    public function save(Request $request)
    {
        if ($request->type == 'lutcer') {
            $request->validate([
                'title' => ["required", "string", "max:125"],
                "start" => ["required"],
                "end" => ['required'],
                "num_repet" => ['required'],
                'start_study' => ['required'],
                'days' => ['required']
            ], [
                'title.required' => 'يرجى ادخال العنوان',
                "start.required" => "تاريخ البداء",
                "end.required" => "تاريخ الانتهاء",
                "num_repet.required" => "يرجى ادخال عدد مرات التكرار",
                'start_study' => 'يرجى تحديد موعد بداية الدراسة',
                'days[]' => 'يرجى تحديد ايام الدراسة',
            ]);
            $code = random_int(0, 100000000);
            $date = $request->start_study;
            $time = $request->start;
            $em = '';
            foreach ($request->days as $val) {
                for ($i = 0; $i < 8; $i++) {
                    if ($val == strval(date('l', strtotime("+$i day", strtotime("$date"))))) {
                        // print(date('l',strtotime("+$i day",strtotime($date))));
                        $em = $i;
                    }
                }

                $start_date = date(strtotime("+$em day", strtotime("$date $time")));
                $end_date = date(strtotime("+$em day", strtotime("$date $request->end")));

                for ($i = 0; $i < $request->num_repet; $i++) {
                    $start = strtotime("+$i weeks", $start_date);
                    $end = strtotime("+$i weeks", $end_date);
                    TodoList::create([
                        "note" => $request->note,
                        "title" => $request->title,
                        "start" => date('Y-m-d h:i:s', $start),
                        "end" => date('Y-m-d h:i:s', $end),
                        "user_id" => Auth::id(),
                        "created_by" => Auth::user()->name,
                        "num_repet" => $request->num_repet,
                        "type_repet" => $request->type,
                        "code" => $code
                    ]);
                }
            }

           
        } else{
            $request->validate([
                'title' => ["required", "string", "max:125"],
                "start" => ["required",'date','after:'.date('Y-m-d H:i')],
                "end" => 'required|date|after:start',

            ], [
                'title.required' => 'يرجى ادخال العنوان',
                "start.required" => "تاريخ البداء",
                "end.required" => "تاريخ الانتهاء",
                'end.after'=>' نهاية موعد  لايمكن ان يكون قبل موعد البداية',
                'start.after'=>'بداية موعد لا يمكن ان يكون قبل الوقت الحالي'
            ]);
            $code = random_int(0, 100000000);
            TodoList::create([
                "note" => $request->note,
                "title" => $request->title,
                "start" => $request->start,
                "end" => $request->end,
                "user_id" => Auth::id(),
                "created_by" => Auth::user()->name,
                "num_repet" => 1,
                "type_repet" => $request->type,
                "code" => $code
            ]);
        }
    }

    public function Data($id)
    {
        return response()->json(TodoList::find($id));
    }

    public function getAppointment($id)
    {
        $todo = TodoList::select(DB::raw("min(title) as title"), DB::raw("min(start) as start"), DB::raw("min(end) as end"), DB::raw("min(code) as code"), DB::raw("max(status) as status"), DB::raw("min(note) as note"), DB::raw("min(num_repet) as num_repet"), DB::raw("min(type_repet) as type_repet"))
            ->where("code", $id)->GroupBy("code")->get()[0];

        return response()->json([
            'code' => $todo->code,
            'title' => $todo->title,
            'note' => $todo->note,
            'start_study' => date('Y-m-d', strtotime($todo->start)),
            'start' => date('H:i', strtotime($todo->start)),
            'end' => date('H:i', strtotime($todo->end)),
            'days' => date('l', strtotime($todo->start)),
            'num_repet' => $todo->num_repet
        ]);
    }

    public function getAppointment1($id)
    {
        $todo = TodoList::where('code',$id)->get()->first();
        return response()->json(['data'=>$todo]);
    }

    public function edit(Request $request)
    {
       

        if ($request->type == 'lutcer') {
            
            $request->validate([
                'title' => ["required", "string", "max:125"],
                "start" => ["required"],
                "end" => ['required'],
                "num_repet" => ['required'],
                'start_study' => ['required'],
                'days' => ['required']
            ], [
                'title.required' => 'يرجى ادخال العنوان',
                "start.required" => "تاريخ البداء",
                "end.required" => "تاريخ الانتهاء",
                "num_repet.required" => "يرجى ادخال عدد مرات التكرار",
                'start_study' => 'يرجى تحديد موعد بداية الدراسة',
                'days[]' => 'يرجى تحديد ايام الدراسة',
            ]);
            $code = $request->code;

            TodoList::where("code", $code)->delete();

            $date = $request->start_study;
            $time = $request->start;
            $em = '';
            foreach ($request->days as $val) {
                for ($i = 0; $i < 8; $i++) {
                    if ($val == strval(date('l', strtotime("+$i day", strtotime("$date"))))) {
                        // print(date('l',strtotime("+$i day",strtotime($date))));
                        $em = $i;
                    }
                }

                $start_date = date(strtotime("+$em day", strtotime("$date $time")));
                $end_date = date(strtotime("+$em day", strtotime("$date $request->end")));

                for ($i = 0; $i < $request->num_repet; $i++) {
                    $start = strtotime("+$i weeks", $start_date);
                    $end = strtotime("+$i weeks", $end_date);
                    TodoList::create([
                        "note" => $request->note,
                        "title" => $request->title,
                        "start" => date('Y-m-d h:i:s', $start),
                        "end" => date('Y-m-d h:i:s', $end),
                        "user_id" => Auth::id(),
                        "created_by" => Auth::user()->name,
                        "num_repet" => $request->num_repet,
                        "type_repet" => $request->type,
                        "code" => $code
                    ]);
                }
            }

            
        }else{
            
            $request->validate([
                'title' => ["required", "string", "max:125"],
                "start" => ["required",'date','after:'.date('Y-m-d H:i')],
                "end" => 'required|date|after:start',
            ], [
                'title.required' => 'يرجى ادخال العنوان',
                "start.required" => "تاريخ البداء",
                "end.required" => "تاريخ الانتهاء",
                'end.after'=>' نهاية موعد  لايمكن ان يكون قبل موعد البداية',
                'start.after'=>'بداية موعد لا يمكن ان يكون قبل الوقت الحالي'
            ]);

            $code = $request->code;

            $todo = TodoList::where("code", $code)->get();
            $type = $todo[0]->type_repet;
            TodoList::where("code", $code)->delete();
            
            TodoList::create([
                "note" => $request->note,
                "title" => $request->title,
                "start" => $request->start,
                "end" => $request->end,
                "user_id" => Auth::id(),
                "created_by" => Auth::user()->name,
                "num_repet" => 1,
                "type_repet" => $type,
                "code" => $code
            ]);
        }
        
    }
    public function delete($id)
    {
        TodoList::where("code", $id)->delete();
    }

    public function checkDate(Request $request){
        $request->validate([
            'title' => ["required", "string", "max:125"],
            "start" => ["required",'date','after:'.date('Y-m-d H:i')],
            "end" => 'required|date|after:start',

        ], [
            'title.required' => 'يرجى ادخال العنوان',
            "start.required" => "تاريخ البداء",
            "end.required" => "تاريخ الانتهاء",
            'end.after'=>' نهاية موعد  لايمكن ان يكون قبل موعد البداية',
            'start.after'=>'بداية موعد لا يمكن ان يكون قبل الوقت الحالي'
        ]);
        $start = $request->start;
        $todo = TodoList::where('start','<',$start)->where('end','>',$start)->get();
        return response()->json($todo);
    }
}
