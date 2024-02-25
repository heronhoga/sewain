<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id) {
        $users = new User();
        $user = User::where('userid', session('user_data.id'))->first();

        $items = new Item();
        $items = Item::where('itemid', $id)->first();

        $seller = User::where('userid', $items->seller_id)->first();
        
        return view('product-details')->with('items', $items)->with('users', $user)->with('seller', $seller);
    }



    public function checkout(Request $request, $id) {
        $items = new Item();
        $items = Item::where('itemid', $id)->first();

        $users = new User();
        $transaction = new Transaction();

        //BUYERID - SELLERID - ITEMID
        $buyer_id = session('user_data.id');
        $seller_id = $items->seller_id;
        $item_id = $id;

        $seller = User::where('userid', $seller_id)->first();
        $buyer = User::where('userid', session('user_data.id'))->first();

        //ADDRESS
        $selleraddress = $seller->address1;
        $buyeraddress = $buyer->address1;

        //MOBILE PHONE
        $sellerphone = $seller->mobile;
        $buyerphone = $buyer->mobile;

        //DAYRENT
        $dayrent = $request->dayrent;

        //PRICE
        $price = $items->price;
        $totalprice =  $price * $dayrent;

        //STATUS PEMBAYARAN
        $paymentstatus = 'pending';

        //STATUS ITEM
        $itemstatus = 'pendingitem';
        
        $request->request->add([
            'buyer_id' => $buyer_id,
            'seller_id' => $seller_id,
            'item_id' => $item_id,
            'selleraddress' => $selleraddress,
            'buyeraddress' => $buyeraddress,
            'sellerphone' => $sellerphone,
            'buyerphone' => $buyerphone,
            'totalprice' => $totalprice,
            'paymentstatus' => $paymentstatus,
            'itemstatus' => $itemstatus
        ]);

        $order = Transaction::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
        'transaction_details' => array(
        'order_id' => $order->transactionid,
        'gross_amount' => $order->totalprice,
            ),
        'customer_details' => array(
        'name' => session('user_data.name'),
        'email' => session('user_data.email'),
            ),
        );

        $user = User::where('userid', session('user_data.id'))->first();
        $itemBuy = Item::where('itemid', $order->item_id)->first();

        // dd($order->transactionid);
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'))->with('users', $user)->with('itemBuy', $itemBuy);
    }

    public function callback(Request $request) {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status === 'capture' || $request->transaction_status === 'settlement') {
                $order = Transaction::where('transactionid', $request->order_id)->first();
                $order->update(['paymentstatus' => 'paid']);

                $itemIdOrder = $order->item_id;
                $item = Item::where('itemid', $itemIdOrder)->first();
                $itemStock = (int)$item->stock-1;
                $item->update(['stock' => $itemStock,]);

            }
        }
    }
}
