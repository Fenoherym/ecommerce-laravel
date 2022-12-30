<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index(){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        $orders = Order::all();

        return view('admin.order.index', [
            'orders' => $orders
        ]);
    }

    public function valid_command($id, Request $request){
        if(!Gate::allows('admin')){
            return redirect()->route('home');
        }

        if($request->isValidate == 1){
            $data = [
                "isValidate" => 0
            ];
            $notifications = [
                "content" => "Votre commande a été annulé, veuillez nous contacter ou réessayez votre commande"
            ];
        }else{
            $data = [
                "isValidate" => 1
            ];
            $notifications = [
                "content" => "Votre commande  a été révalider."
            ];
        }

        $order = Order::findOrFail($id);
        $notifications['user_id'] = $order->user_id;
        $order->update($data);
        $notifcation = new Notification();
        $notifcation->content = $notifications['content'];
        $notifcation->user_id = $notifications['user_id'];
        $notifcation->save();

        return back();
    }
}
