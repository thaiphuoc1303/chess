<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use App\Models\User;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GamingController extends Controller
{
    const emptyBoard = "0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0";
    const startBoard = "2 3 4 5 6 4 3 2*1 1 1 1 1 1 1 1*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*0 0 0 0 0 0 0 0*-1 -1 -1 -1 -1 -1 -1 -1*-2 -3 -4 -5 -6 -4 -3 -2";

    public function index($id)
    {
        $user = Auth::user();

        $data = Firebase::database();
        $ref = $data->getReference('room/'.$id);

        $room = Room::find($id);
        if(($user->id == $room->player1)){
            $player2 = User::find($room->player2);

            return view('Gaming.gaming', ['user'=>$user, 'room'=>$room, 'player1'=>$user, 'player2'=>$player2, 'quan'=>0]);
        }

        if(($user->id == $room->player2)){
            $player1 = User::find($room->player1);

            return view('Gaming.gaming', ['user'=>$user, 'room'=>$room, 'player1'=>$player1, 'player2'=>$user, 'quan'=>1]);
        }

        if($room->player2 == 0 || $room->player2 == '0'){
            
            $room->player2 = $user->id;
            $room->save();
            $data = Firebase::database();
            $ref = $data->getReference('room/'.$id);
            $newdata = [
                'player2' => $user->id
            ];
            $ref->update($newdata);
            
            $data->getReference('chat/'.$id)
            ->push([
            'id' => $user->id,
            'name' => $user->name,
            'message' => "Đã tham gia vào phòng",
            'type' => 1
            ]);

            $player1 = User::find($room->player1);
            $player2 = User::find($room->player2);
            return view('Gaming.gaming', ['user'=>$user, 'room'=>$room, 'player1'=>$player1, 'player2'=>$player2, 'quan'=>1]);
        }
        else{
            $player1 = User::find($room->player1);
            $player2 = User::find($room->player2);

            return view('Gaming.spectator', ['user'=>$user, 'room'=>$room, 'player1'=>$player1, 'player2'=>$player2]);
        }
    }
    public function start($id)
    {
        $user = Auth::user();

        $database = Firebase::database();
        $ref = $database->getReference('room/'.$id);
        $snapshot = $ref->getSnapshot();
        $value = $snapshot->getValue();
        
        $data = json_decode(json_encode($value));
        if($data->player1 == $user->id && $data->player2 != 0){
            $newdata = [
                'board' => GamingController::startBoard,
                'status'=> 1,
                'previous_turn'=> Carbon::now()->toDateTimeString(),
                'turn'=> $data->player1,
                'start_time' =>  Carbon::now()->toDateTimeString(),
                'time_p1' => 1200,
                'time_p2' => 1200
            ];
            $ref->update($newdata);
        }
    }
    public function move(Request $request)
    {
        $user = Auth::user();
        $idroom = $request->idRoom;
        $idcu = $request->idCu;
        $rowcu = (int) substr($idcu, 0, 1) - 1;
        $colcu = (int) substr($idcu, 1, 1) - 1;
        $idmoi = $request->idMoi;
        $rowmoi = (int) substr($idmoi, 0, 1) - 1;
        $colmoi = (int) substr($idmoi, 1, 1) - 1;
        $room = Room::find($idroom);
        
        $database = Firebase::database();
        $ref = $database->getReference('room/'.$idroom);
        $snapshot = $ref->getSnapshot();
        $value = $snapshot->getValue();

        if($user->id != $value["turn"]) {
            return;
        }
        $board = $value['board'];
        $row = explode('*', $board);
        $cell = array();
        for($i = 0; $i< sizeof($row); $i++){
            $cell[$i] =  explode(' ', $row[$i]);
        }
        $status = 1;
        if($cell[$rowmoi][$colmoi] =='-6'){
            $status = 2;

            $player1 = User::find($value['player1']);
            $player2 = User::find($value['player2']);
            $point = 50 + ($player2->point - $player1->point)/20;
            
            $player1->count ++;
            $player1->win++;
            $player1->point += $point;
            $player2->count ++;
            $player2->point -=$point;
            $player1->save();
            $player2->save();
        }
        if($cell[$rowmoi][$colmoi] =='6'){
            $status = 3;

            $player1 = User::find($value['player1']);
            $player2 = User::find($value['player2']);
            $point = 50 + ($player1->point - $player2->point)/20;
            
            $player2->count ++;
            $player2->win++;
            $player2->point += $point;
            $player1->count ++;
            $player1->point -=$point;
            $player1->save();
            $player2->save();
        }
        $cell[$rowmoi][$colmoi] = $cell[$rowcu][$colcu];
        $cell[$rowcu][$colcu] = '0';
        $newBoard = '';
        for($i = 0; $i < 8; $i++){
            for($j = 0; $j < 8; $j++){
                $newBoard .= $cell[$i][$j];
                if($j != 7) $newBoard .=" ";
            }
            if($i < 7) $newBoard .="*";
        }
        $next = 0;
        $t1 = $value["time_p1"];
        $t2 = $value["time_p2"];
        $now = Carbon::now();
        $previous = Carbon::parse($value['previous_turn']);
        $tTime = $now->diffInSeconds($previous);
        if($value["player1"] == $value["turn"]){
            $next = $value["player2"];
            $t1 = $t1 - $tTime;
        }
        else{
            $next = $value["player1"];
            $t2 = $t2 - $tTime;
        }
        if($status !=1) $next =0;
        $newdata = [
            'board' => $newBoard,
            'previous_turn'=> Carbon::now()->toDateTimeString(),
            'turn'=> $next,
            'status'=> $status,
            'time_p1' => $t1,
            'time_p2' => $t2
        ];
        $ref->update($newdata);
    }
    public function choitiep(Request $request)
    {
        $user = Auth::user();
        $id = $request->idRoom;

        $database = Firebase::database();
        $ref = $database->getReference('room/'.$id);
        $snapshot = $ref->getSnapshot();
        $value = $snapshot->getValue();
        if($value['player1'] == $user->id){
            $newdata = [
                
                'status'=> 0,
                'previous_turn'=> Carbon::now()->toDateTimeString(),
                'turn'=> 0,
                'board'=> 0,
                'start_time' =>  Carbon::now()->toDateTimeString(),
                'board'=> HomeController::emptyBoard
            ];
            $ref->update($newdata);
        }
    }
    public function khangia($id)
    {
        $user = Auth::user();
        $database = Firebase::database();
        $ref = $database->getReference('room/'.$id);
        $snapshot = $ref->getSnapshot();
        $value = $snapshot->getValue();
        if($user->id == $value['player1']){
            if($value['spectator'] == 1){
                $newdata = [
                'spectator' => 0
                ];
                $ref->update($newdata);
                $database->getReference('chat/'.$id)
                ->push([
                'id' => $user->id,
                'name' => $user->name,
                'message' => "Đã tắt cho phép khán giả",
                'type' => 3
            ]);
            }
            else{
                $newdata = [
                    'spectator' => 1
                ];
                $ref->update($newdata);
                $database->getReference('chat/'.$id)
                ->push([
                'id' => $user->id,
                'name' => $user->name,
                'message' => "Đã cho phép khán giả",
                'type' => 1
            ]);
            }
            
        }
    }
    public function khangiachat($id)
    {
        $user = Auth::user();
        $database = Firebase::database();
        $ref = $database->getReference('room/'.$id);
        $snapshot = $ref->getSnapshot();
        $value = $snapshot->getValue();
        if($user->id == $value['player1']){
            if($value['spectator-chat'] == 1){
                $newdata = [
                'spectator-chat' => 0
                ];
                $ref->update($newdata);
                $database->getReference('chat/'.$id)
                ->push([
                'id' => $user->id,
                'name' => $user->name,
                'message' => "Đã cấm khán giả trò chuyện trong phòng",
                'type' => 3
                ]);
            }
            else{
                $newdata = [
                    'spectator-chat' => 1
                ];
                $ref->update($newdata);
                $database->getReference('chat/'.$id)
                ->push([
                'id' => $user->id,
                'name' => $user->name,
                'message' => "Đã cho phép khán giả trò chuyện trong phòng",
                'type' => 1
                ]);
            }
            
        }
    }
    public function quit($id)
    {
        $user = Auth::user();
        $room = Room::find($id);

        if($user->id == $room->player2){
            $room->player2 = 0;
            $room->save();
            $database = Firebase::database();
            $ref = $database->getReference('room/'.$id);
            $newdata = [
                'player2' => 0
            ];
            $ref->update($newdata);
            $database->getReference('chat/'.$id)
                ->push([
                'id' => $user->id,
                'name' => $user->name,
                'message' => "Đã rời khỏi phòng",
                'type' => 3
                ]);
        }
        if($user->id == $room->player1){
            $room->delete();
            $database = Firebase::database();
            $ref = $database->getReference('room/'.$id);
            $ref->remove();
        }
        return redirect('home');
    }
    public function surrender($id)
    {
        $user = Auth::user();
        $room = Room::find($id);
        $database = Firebase::database();
        $ref = $database->getReference('room/'.$id);
        $snapshot = $ref->getSnapshot();
        $value = $snapshot->getValue();
        if($value['status'] != 1){
            return;
        }

        if($room->player1 == $user->id){
            
            $newdata =[
                'status' => 3
            ];
            $ref->update($newdata);

            $player1 = User::find($value['player1']);
            $player2 = User::find($value['player2']);
            $point = 50 + ($player1->point - $player2->point)/20;
            
            $player2->count ++;
            $player2->win++;
            $player2->point += $point;
            $player1->count ++;
            $player1->point -=$point;
            $player1->save();
            $player2->save();
        }
        if($room->player2 == $user->id){
            
            $newdata =[
                'status' => 2
            ];
            $ref->update($newdata);

            $player1 = User::find($value['player1']);
            $player2 = User::find($value['player2']);
            $point = 50 + ($player2->point - $player1->point)/20;
            
            $player1->count ++;
            $player1->win++;
            $player1->point += $point;
            $player2->count ++;
            $player2->point -=$point;
            $player1->save();
            $player2->save();
        }
    }
    public function chat(Request $request)
    {
        $user = Auth::user();
        $room = Room::find($request->id);
        if($user->id == $room->player1 && $request->message == '/kick'){
            $database = Firebase::database();
            $ref = $database->getReference('room/'.$room->id);
            $newdata =[
                'player2' => 0
            ];
            $ref->update($newdata);
        }
        $database = Firebase::database();
        if($user->id == $room->player1 || $user->id == $room->player2){
            $database->getReference('chat/'.$request->id)
            ->push([
            'id' => $user->id,
            'name' => $user->name,
            'message' => $request->message,
            'type' => 2
            ]);
        }
        else{
            $ref = $database->getReference('room/'.$room->id);
            $snapshot = $ref->getSnapshot();
            $value = $snapshot->getValue();
            if($value['spectator-chat'] == 0){
                return view('ajax.spectator-chat');
            }
            $database->getReference('chat/'.$request->id)
            ->push([
            'id' => $user->id,
            'name' => $user->name,
            'message' => $request->message,
            'type' => 4
            ]);
        }
    }
}
