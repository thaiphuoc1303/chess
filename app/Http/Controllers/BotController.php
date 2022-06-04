<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BotController extends Controller
{
    public function easy()
    {   
        return view('bot-easy', ['user'=> Auth::user()]);
    }
    public function medium()
    {
        return view('bot-medium', ['user'=> Auth::user()]);
    }
    public function hard()
    {
        return view('bot-hard', ['user'=> Auth::user()]);
    }
}
