<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Kreait\Laravel\Firebase\Facades\Firebase;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $charts = User::orderBy('point', 'desc')->limit(5)->get();
        return view('profile', ['user'=> $user, 'charts'=> $charts]);
    }
    public function playerProfile($id)
    {
        $user = Auth::user();
        if($id == $user->id){
            return redirect('profile');
        }
        $player = User::find($id);
        $charts = User::orderBy('point', 'desc')->limit(5)->get();
        return view('player', ['user'=>$user, 'player'=>$player, 'charts'=> $charts]);
    }
    public function updateavatar(Request $request)
    {
        $user = Auth::user();
        $avatar = $request->file('avatar');
        if($avatar->getSize()<20000){
            return redirect('profile');
        }
        $ten = $user->id.".". $avatar->getClientOriginalExtension();
        $avatar->move('img/avatar', $ten);
        $user->avatar = $ten;
        $user->save();
        return redirect('profile');
    }
    public function updatebackground(Request $request)
    {
        $user = Auth::user();
        $img = $request->file('background');
        if($img->getSize()<20000){
            return redirect('profile');
        }
        $ten = $user->id.".". $img->getClientOriginalExtension();
        if (file_exists('img/background/'.$ten))
        {
            unlink('img/background/'.$ten);
        }
        
        $img->move('img/background', $ten);
        $user->background = $ten;
        $user->save();
        return redirect('profile');
    }
    public function updatepassword(Request $request)
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('profile');
    }
    public function ajaxProfile($id)
    {
        # code...
        $player = User::find($id);
        $charts = User::orderBy('point', 'desc')->limit(5)->get();
        return view('ajax.profile', ['player'=>$player, 'charts'=> $charts]);
    }
}
