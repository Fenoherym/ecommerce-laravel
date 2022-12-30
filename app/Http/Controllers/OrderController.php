<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $commandes = Order::where('user_id', Auth::user()->id)->get();

        return view('order.index', compact('commandes'));
    }

    public function view_notifications(){
        $notifications = Notification::where('user_id', Auth::user()->id)->get();

        foreach($notifications as $notification){
            $notification->update([
                'isView' => 1
            ]);
        }


        return redirect()->route('order.index');
    }
}

