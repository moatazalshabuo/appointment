<?php

namespace App\Console\Commands;

use App\Mail\NotyMail;
use App\Models\TodoList;
use App\Models\User;
use App\Notifications\AppointmentNoty;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class notifyAppointment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:appointment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $todo = TodoList::select("users.email","todo_list.*")
        ->join("users","users.id","=","todo_list.user_id")->
        where("todo_list.status",1)->get();

        foreach($todo as $item){
            $time1 = new DateTime($item->start);
            $time2 = new DateTime(date('Y-m-d G:i:s'));
            $diff = ($time2->diff($time1)->format("%a") * 24) + $time2->diff($time1)->format("%h");
            if($diff == 24){
                Mail::to($item->email)->send(new NotyMail(['title'=>$item->title,'note'=>$item->note,"date"=>$item->start]));
                User::find($item->user_id)->notify(new AppointmentNoty(['title'=>$item->title,"start"=>$item->start,"status"=>0,"name"=>$item->created_by]));
            }elseif($diff == 1 || $diff == 0){
                TodoList::find($item->id)->update([
                    'status'=>0
                ]);
                Mail::to($item->email)->send(new NotyMail(['title'=>$item->title,'note'=>$item->note,"date"=>$item->start]));
                User::find($item->user_id)->notify(new AppointmentNoty(['title'=>$item->title,"start"=>$item->start,"status"=>1,"name"=>$item->created_by]));
            }elseif($diff < 0){
                TodoList::find($item->id)->update([
                    'status'=>0
                ]);
            }
        }
    }
}
