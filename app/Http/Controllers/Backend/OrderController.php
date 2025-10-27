<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function showAllOrders()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $allOrders = Order::with('orderDetails')->get();
                // dd($allOrders);
                return view('backend.admin.orders.allorders', compact('allOrders'));
            }
        }
    }

    // show Today Orders

    public function showTodayOrders()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $todayDate = Carbon::today();
                $todayOrders = Order::with('orderDetails')->whereDate('created_at', $todayDate)->get();
                // dd($allOrders);
                return view('backend.admin.orders.todayorders', compact('todayOrders'));
            }
        }
    }

    // showPendingOrders

    public function showPendingOrders()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $pendingOrders = Order::with('orderDetails')->where('status', 'pending')->get();
                // dd($allOrders);
                return view('backend.admin.orders.pendingorders', compact('pendingOrders'));
            }
        }
    }

    public function showConfirmedOrders()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $confirmedOrders = Order::with('orderDetails')->where('status', 'confirmed')->get();
                // dd($allOrders);
                return view('backend.admin.orders.confirmedorders', compact('confirmedOrders'));
            }
        }
    }

    public function showDeliversOrders()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $deliveredOrders = Order::with('orderDetails')->where('status', 'delivered')->get();
                // dd($allOrders);
                return view('backend.admin.orders.deliveredorders', compact('deliveredOrders'));
            }
        }
    }


    public function showCancelledOrders()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $cancelledOrders = Order::with('orderDetails')->where('status', 'cancelled')->get();
                // dd($allOrders);
                return view('backend.admin.orders.cancelledorders', compact('cancelledOrders'));
            }
        }
    }




    public function statusCancelled($id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $order = Order::find($id);
                $order->status = 'cancelled';
                $order->save();
                return redirect()->back()->with('success', 'Order has been cancelled');
            }
        }
    }


    public function statusConfirmed($id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $order = Order::find($id);
                $order->status = 'confirmed';
                $order->save();
                return redirect()->back()->with('success', 'Order Confirmed');
            }
        }
    }

    // statusPending

    public function statusPending($id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $order = Order::find($id);
                $order->status = 'pending';
                $order->save();
                return redirect()->back()->with('success', 'Order Pending');
            }
        }
    }

    // statusdelivered

    public function statusdelivered($id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $order = Order::find($id);
                // dd($order);
                if ($order->courier_name != null) {
                    $order->status = 'delivered';

                    // send email
                    if ($order->courier_name == "steadfast") {
                    }

                    if ($order->email != null) {
                        Mail::to($order->email)->send(new OrderConfirmationMail($order));
                    }
                    // send email


                    $order->save();
                    return redirect()->back()->with('success', 'Order has been confirmed!');
                } else {
                    toastr()->error('Please add courier name first!');
                    return redirect()->back();
                }
            }
        }
    }

    // orderDetails

    public function orderDetails($id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $order = Order::where('id', $id)->with('orderDetails')->first();
                // dd($order);
                return view('backend.admin.orders.details', compact('order'));
            }
        }
    }

    public function orderUpdate(Request $request, $id)
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1  || Auth::user()->role == 2) {
                $order = Order::find($id);

                $order->c_name = $request->c_name;
                $order->c_phone = $request->c_phone;
                $order->email = $request->email;
                $order->address = $request->address;
                $order->price = $request->price;

                if (isset($request->courier_name)) {
                    if ($request->courier_name == 'steadfast') {
                        $order->courier_name = 'steadfast';
                    }
                    if ($request->courier_name == 'others') {
                        $order->courier_name = $request->others_courier;
                    }
                }

                // send email to customer if email id is available


                $order->save();
                return redirect()->back()->with('success', 'Order has been updated!');
            }
        }
    }
}
