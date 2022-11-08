<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\OrderItem;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function cart()
    {
        return view('checkout');
    }

    public function addToCart(Request $request)
    {
        $bldid = $request->bldid;
        $hsptlid = $request->hsptlid;
        $hsptlname = Hospital::findOrFail($hsptlid)->hsptl_name;
        $bloodstock = BloodStock::where('blood_type_id', $bldid)->where('hospital_id', $hsptlid)->get()->first();

        $bldtypename = BloodType::find($bldid)->bloodtype_name;

        $cart = session()->get('cart', []);

        if (isset($cart[$bldid])) {
            $cart[$bldid]['requested_stock']++;
        } else {
            $cart[$bldid] = [
                "hospital_id" => $hsptlid,
                "bloodstock_id" => $bldid,
                "hospital_name" => $hsptlname,
                "blood_group" => $bldtypename,
                "hospital_stock" => $bloodstock->count,
                "requested_stock" => 100,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'BloodStock added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->requested_stock) {
            $cart = session()->get('cart');
            $cart[$request->id]["requested_stock"] = $request->requested_stock;
            session()->put('cart', $cart);
            session()->flash('success', 'Request updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Request removed successfully');
        }
    }

    public function newOrder()
    {
        $cart = session()->get('cart');

        dd($cart);

        $totalAmount = 0;

        foreach ($cart as $item) {
            $totalAmount += $item['bloodstock_count'] * $item['requested_stock'];
            $hospital = $item['hospital_id'];
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->hospital_id = $hospital;
        $order->total_count = $totalAmount;
        $order->status = "Placed";

        $order->save();

        $data = [];

        foreach ($cart as $item) {
            $data['items'] = [
                [
                    'bloodstock_name' => $item['bloodstock_name'],
                    'bloodstock_count' => $item['bloodstock_count'],
                    'bloodstock_qty' => $item['requested_stock'],
                ]
            ];

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->blood_item_id = $item['bloodstock_id'];
            $orderItem->blood_name = $item['bloodstock_name'];
            $orderItem->blood_qty = $item['requested_stock'];
            $orderItem->amount = $item['bloodstock_count'] * $item['requested_stock'];
            $orderItem->save();
        }

        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(3);
        return view('index')->with('hospitals', $hospitals);
    }

    public function orders()
    {
        $owner = Auth::user()->id;
        $data = Order::where('user_id', $owner)->first();

        $orders = Order::where('user_id', $owner)->orderBy('created_at', 'desc')->paginate(5);
        // dd($data);
        // $hospital = Hospital::where('id', $data->hospital_id)->first();
        $hospital = 1;

        return view('users.myorders', compact('orders', 'hospital'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $orderitems = OrderItem::where('order_id', $id)->orderBy('created_at', 'desc')->paginate(5);

        return view('orders.show', compact('order', 'orderitems'));
    }

    public function destroy($id)
    {
        Order::find($id)->delete();

        return view('users.myorders', compact('order', 'hospital'));
    }
}
