<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Kreait\Laravel\Firebase\Facades\Firebase;

class HomeController extends Controller
{
    const emptyBoard = "0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0";
    const startBoard = "2 3 4 5 6 4 3 2*1 1 1 1 1 1 1 1*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*-1 -1 -1 -1 -1 -1 -1 -1*-2 -3 -4 -5 -6 -4 -3 -2";

    public function index(){
        $user = Auth::user();
        $charts = User::orderBy('point', 'desc')->limit(5)->get();
        return view('Gaming.Room', ['user'=>$user, 'charts'=>$charts]);
    }
    public function random()
    {
        // where('player2', 0)->
        $rooms = Room::get();
        $max = rand(0, count($rooms)-1);
        return redirect('gaming/'.$rooms[$max]->id);
    }
    public function choosebot()
    {
        $user = Auth::user();
        $charts = User::orderBy('point', 'desc')->limit(5)->get();
        return view('choose-bot', ['user'=>$user, 'charts'=>$charts]);
    }
    public function create(){
        $user = Auth::user();
        $newroom = Room::create([
            'player1'=>  Auth::user()->id,
            'start_time'=> Carbon::now(),
            'end_time'=> Carbon::now(),
            'previous_turn'=> Carbon::now(),
            'board'=> HomeController::emptyBoard
        ]);
        $room = Room::find($newroom->id);
        $data = Firebase::database();
        $obj = [
            'id'=>$room->id,
            'player1'=>$room->player1,
            'player2'=>$room->player2,
            'turn'=> $room->turn,
            'previous_turn'=> $room->previous_turn,
            'start_time'=>$room->start_time,
            'end_time'=> $room->start_time,
            'status'=>$room->status,
            'before'=>$room->before,
            'board'=> HomeController::emptyBoard,
            'spectator'=> 1,
            'spectator-chat'=>1,
            'action'=> 0
        ];
        $post = $data->getReference('room/'. $room->id)->set($obj);
        $data->getReference('chat/'.$room->id)
            ->push([
            'id' => $user->id,
            'name' => $user->name,
            'message' => 'Đã tạo phòng.',
            'type' => 1
       ]);
        return redirect('gaming/'.$room->id);
    }
    public function player($id)
    {
        $player = User::find($id);
        return view('ajax.player', ['player'=>$player]);
    }
    public function backhome($id)
    {
        $user = Auth::user();
        
        $database = Firebase::database();
        $ref = $database->getReference('room/'.$id);
        $snapshot = $ref->getSnapshot();
        $value = $snapshot->getValue();
        $room = Room::find($id);

        if($value['player2'] == $user->id){
            $room->player2 = 0;
            $room->save();

            $newdata =[
                'player2'=> 0
            ];
            $ref->update($newdata);
            $database->getReference('chat/'.$room->id)
            ->push([
            'id' => $user->id,
            'name' => $user->name,
            'message' => 'Đã rời khỏi phòng.',
            'type' => 3
       ]);
        }
        else{
            if($value['player1'] == $user->id){
                $ref->remove();
                $database->getReference('chat/'.$room->id)->remove();
                $room->delete();
            }
        }
        return redirect('home');
    }
}