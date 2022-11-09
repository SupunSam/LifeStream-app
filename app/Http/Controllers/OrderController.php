<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\BloodStock;
use App\Models\BloodType;
use App\Models\OrderItem;
use App\Models\Hospital;
use App\Models\Event;
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

        $srchsptlid = $request->srchsptlid;
        $srcbldstkid = BloodStock::where('blood_type_id', $bldid)->where('hospital_id', $srchsptlid)->get()->first()->id;

        $desthsptlid = (Hospital::where('user_id', $request->userid)->get()->first())->id;
        $destbldstkid = BloodStock::where('blood_type_id', $bldid)->where('hospital_id', $desthsptlid)->get()->first()->id;

        $srchsptlname = Hospital::findOrFail($srchsptlid)->hsptl_name;
        $srchsptlstk = BloodStock::where('blood_type_id', $bldid)->where('hospital_id', $srchsptlid)->get()->first()->count;
        $bldtypename = BloodType::find($bldid)->bloodtype_name;

        $cart = session()->get('cart', []);

        if (isset($cart[$bldid])) {
            $cart[$bldid]['requested_stock']++;
        } else {
            $cart[$bldid] = [
                "src_hsptl_id" => $srchsptlid,
                "src_hsptl_name" => $srchsptlname,
                "src_bldstk_id" => $srcbldstkid,
                "dest_hsptl_id" => $desthsptlid,
                "dest_bldstk_id" => $destbldstkid,
                "bloodtype_id" => $bldid,
                "blood_group" => $bldtypename,
                "src_hsptl_stock" => $srchsptlstk,
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

        $totalAmount = 0;

        foreach ($cart as $item) {
            $totalAmount += $item['src_hsptl_stock'] * $item['requested_stock'];
            $hospital = $item['src_hsptl_id'];
        }

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->hospital_id = $hospital;
        $order->total_count = count($cart);
        $order->status = 5;

        $order->save();

        $data = [];

        foreach ($cart as $item) {
            $data['items'] = [
                [
                    'src_hsptl_id' => $item['src_hsptl_id'],
                    'src_bldstk_id' => $item['src_bldstk_id'],
                    'dest_hsptl_id' => $item['dest_hsptl_id'],
                    'dest_bldstk_id' => $item['dest_bldstk_id'],
                    'bloodtype_id' => $item['bloodtype_id'],
                    'src_hsptl_stock' => $item['src_hsptl_stock'],
                    'requested_stock' => $item['requested_stock'],
                ]
            ];

            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->src_hsptl_id = $item['src_hsptl_id'];
            $orderItem->src_bldstk_id = $item['src_bldstk_id'];
            $orderItem->dest_hsptl_id = $item['dest_hsptl_id'];
            $orderItem->dest_bldstk_id = $item['dest_bldstk_id'];
            $orderItem->blood_type_id = $item['bloodtype_id'];
            $orderItem->requested_stock = $item['requested_stock'];
            $orderItem->status = 2;
            $orderItem->save();
        }

        $hospitals = Hospital::orderBy('created_at', 'desc')->paginate(3);
        $events = Event::get();
        session()->forget('cart');
        return view('index')->with('hospitals', $hospitals)->with('events', $events);
    }

    public function orders()
    {
        $owner = Auth::user()->id;
        $myhospital = (Hospital::where('user_id', $owner)->get()->first())->id;

        $hospitals = Hospital::where('user_id', $owner)->orderBy('created_at', 'desc')->paginate(5);
        $rcvdorders = Order::where('hospital_id', $myhospital)->orderBy('created_at', 'desc')->paginate(5);
        $rqstorders = Order::where('user_id', $owner)->orderBy('created_at', 'desc')->paginate(5);

        return view('hospitals.myhsptl', compact('hospitals', 'rcvdorders', 'rqstorders'));
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
