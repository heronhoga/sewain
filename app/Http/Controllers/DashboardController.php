<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
    
{
    //GENERAL
    public function dashboard_account() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,
            'is_store_open' => $user->is_store_open,

        ];
        return view('dashboard-account', compact('data'));

    }

    public function dashboard_account_update(Request $request, $id) {
        $user = new User();
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'address1' => ['required'],
            'address2' => ['required'],
            'city' => ['required'],
            'province' => ['required'],
            'postalcode' => ['required'],
            'country' => ['required'],
            'mobile' => ['required'],
        ]);
        // dd($request->all());
        $conf = true;
        User::where('userid', $id)->update($data);
        $user = Auth::user();
        return redirect()->route('indexhome')->with('user', $user);
    }

    //END GENERAL

    //BUYER - GENERAL
    public function dashboard() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,
            'is_store_open' => $user->is_store_open

        ];
        $transaction = new Transaction();
        $transactionsData = Transaction::select('transaction.*', 'items.productname', 'users.name', 'items.image')
        ->join('items', 'transaction.item_id', '=', 'items.itemid')
        ->join('users', 'items.seller_id', '=', 'users.userid')
        ->where('transaction.buyer_id', session('user_data.id'))
        ->orderBy('transaction.added', 'desc')
        ->take(4)
        ->get();
        
        return view('dashboard', compact('data'))->with('transactionsData', $transactionsData);
    }
    //BUYER - GENERAL

    //--BUYER-TRANSACTIONS
    public function dashboard_transactions() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,
            'is_store_open' => $user->is_store_open

        ];
        
        $transaction = new Transaction();

        $transactionsData = Transaction::select('transaction.*', 'items.productname', 'users.name', 'items.image')
        ->join('items', 'transaction.item_id', '=', 'items.itemid')
        ->join('users', 'items.seller_id', '=', 'users.userid')
        ->where('transaction.buyer_id', session('user_data.id'))
        ->get();


        return view('dashboard-transactions', compact('data'))->with('transactionsData', $transactionsData);
    }
    //--BUYER-TRANSACTIONS

    //--BUYER-TRANSACTION DETAILS
    public function buyer_transactions_detail($id) {

        $transaction = new Transaction();

        $transactionsData = Transaction::select('transaction.*', 'items.productname', 'users.*', 'items.image')
        ->join('items', 'transaction.item_id', '=', 'items.itemid')
        ->join('users', 'items.seller_id', '=', 'users.userid')
        ->where('transaction.buyer_id', session('user_data.id'))
        ->where('transaction.transactionid', $id)
        ->first();

        return view ('buyer-transaction-details')->with('transactionsData', $transactionsData);
    }

    public function buyer_update_condition(Request $request, $id) {
        $transaction = new Transaction();
        $transaction = Transaction::where('transactionid', $id)->first();
        $update1 = 'Sedang disewa';
        $update2 = 'Selesai disewa';

        if ($transaction->itemstatus == 'pendingitem') {
            $transaction->update([
                'itemstatus' => $update1,
            ]);
            return redirect()->route('buyer-transaction-details', ['id' => $id]);
        } else if ($transaction->itemstatus == 'Sedang disewa') {
            $transaction->update([
                'itemstatus' => $update2,
            ]);

            $item = Item::where('itemid', $transaction->item_id)->first();
            $itemUpdated = ((int)$item->stock)+1;
            $item->update([
                'stock' => $itemUpdated,
            ]);
            return redirect()->route('buyer-transaction-details', ['id' => $id]);
        }
    }
    //--BUYER-TRANSACTION DETAILS

    //SELLER - GENERAL
    public function dashboard_seller() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,
            'storename' => $user->storename,
        ];

        $transactionsData = Transaction::select('transaction.*', 'items.productname', 'users.name', 'items.image')
    ->join('items', 'transaction.item_id', '=', 'items.itemid')
    ->join('users', 'transaction.buyer_id', '=', 'users.userid')
    ->whereNotNull('transaction.buyer_id')
    ->where('transaction.seller_id', session('user_data.id'))
    ->orderBy('transaction.added', 'desc') // Order by 'added' column in descending order
    ->take(4) // Limit to 8 results
    ->get();

    // $totalCustomers = Transaction::select('transaction.*', 'items.productname', 'users.name', 'items.image')
    // ->join('items', 'transaction.item_id', '=', 'items.itemid')
    // ->join('users', 'transaction.buyer_id', '=', 'users.userid')
    // ->whereNotNull('transaction.buyer_id')
    // ->where('transaction.seller_id', session('user_data.id'))
    // ->orderBy('transaction.added', 'desc')
    // ->distinct('transaction.buyer_id') // Select only unique rows based on 'buyer_id'
    // ->get();

    $totalCustomers = Transaction::select('transaction.buyer_id')
    ->whereNotNull('transaction.buyer_id')
    ->where('transaction.seller_id', session('user_data.id'))
    ->distinct('transaction.buyer_id')
    ->get();

    $totalEarnings = Transaction::select('transaction.totalprice')
    ->whereNotNull('transaction.buyer_id')
    ->where('transaction.seller_id', session('user_data.id'))
    ->get();

        return view('dashboard-seller', compact('data'))
        ->with('transactionsData', $transactionsData)
        ->with('totalCustomers', $totalCustomers)
        ->with('totalEarnings', $totalEarnings);
    }
    //SELLER - GENERAL

    //--PRODUCT
    public function dashboard_seller_product() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $items = new Item();
        $items = Item::where('seller_id', session('user_data.id'))->get();
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,

        ];
        return view('dashboard-seller-product', compact('data'))->with('items', $items);
    }
    
    public function dashboard_seller_product_create() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,
        ];
        return view('dashboard-seller-product-create', compact('data'));
    }

    public function dashboard_seller_product_createPost(Request $request) {
    // dd($request->all());
    $user = new User();
    $user = User::where('userid', session('user_data.id'))->first();
    $item = new Item();
    $data = $request->validate([
            'productname' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:20480',
            'category' => 'required',
            'stock' => 'required|numeric',
    ]);
    
    $image = $data['image'];
    $imageName = 'images/items/'.time().'_'.$image->getClientOriginalName();
    $image->move(public_path('images/items'),$imageName);

    $item->seller_id = $user->userid;
    $item->productname = $data['productname'];
    $item->price = $data['price'];
    $item->category = $data['category'];
    $item->description = $data['description'];
    $item->image = $imageName;
    $item->stock = $data['stock'];
    $item->save();
    return redirect()->route('dashboard-seller-product');
    }

    public function dashboard_seller_product_edit($id) {
        $user = new User();
        $item = new Item();
        $item = Item::where('itemid', $id)->first();
        $user = User::where('userid', session('user_data.id'))->first();

        $data = [
            'sellername' => $user->name,
            'id' => $item->itemid,
            'sellerid' => $item->seller_id,
            'name' => $item->productname,
            'price' => $item->price,
            'category' => $item->category,
            'description' => $item->description,
            'image' => $item->image,
            'stock' => $item->stock,
        ];
        return view('dashboard-seller-product-edit', compact('data'));
    }

    public function dashboard_seller_product_update(Request $request, $id) {
        //BELOM JADI
        // dd($request->all());
        if (!$request->image) {
            return redirect()->back()->with('error', 'Anda belum menambahkan gambar!');
        }
        
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $item = new Item();
        $data = $request->validate([
            'productname' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:20480',
            'category' => 'required',
            'stock' => 'required|numeric',
        ]);

        //CHANGE IMAGE
        $idDelete = Item::where('itemid', $id)->first();

        if ($idDelete) {
            $imagePath = public_path($idDelete->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image = $data['image'];
            $imageName = 'images/items/'.time().'_'.$image->getClientOriginalName();
            $image->move(public_path('images/items'),$imageName);

            //UPDATE ITEM DATA
            Item::where('itemid', $id)->update([
                'productname' => $data['productname'],
                'price' => $data['price'],
                'description' => $data['description'],
                'image' => $imageName,
                'category' => $data['category'],
                'stock' => $data['stock'],
            ]);
            return redirect()->route('dashboard-seller-product')->with('update', 'Data berhasil diperbarui');

        }
    }
    public function dashboard_seller_product_delete($id) {
        $item = new Item();
        $idDelete = Item::where('itemid', $id)->first();
        $imagePath = public_path($idDelete->image);

        if ($idDelete) {
            $imagePath = public_path($idDelete->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $idDelete->delete();
        }
        return redirect()->back();
    }
    //--PRODUCT

    //--TRANSACTIONS
    public function dashboard_seller_transactions() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,

        ];

        $transactionsData = Transaction::select('transaction.*', 'items.productname', 'users.name', 'items.image')
        ->join('items', 'transaction.item_id', '=', 'items.itemid')
        ->join('users', 'transaction.buyer_id', '=', 'users.userid')
        ->whereNotNull('transaction.buyer_id')
        ->where('transaction.seller_id', session('user_data.id'))
        ->get();
        return view('dashboard-seller-transactions', compact('data'))->with('transactionsData', $transactionsData);
    }

    public function seller_transactions_detail($id) {

        $transaction = new Transaction();

        $transactionsData = Transaction::select('transaction.*', 'items.productname', 'users.*', 'items.image')
        ->join('users', 'transaction.buyer_id', '=', 'users.userid')
        ->join('items', 'transaction.item_id', '=', 'items.itemid')
        // ->where('transaction.buyer_id', session('user_data.id'))
        ->where('transaction.transactionid', $id)
        ->first();

        return view ('seller-transaction-details')->with('transactionsData', $transactionsData);
    }

    public function seller_update_condition(Request $request, $id) {
        $transaction = new Transaction();
        $transaction = Transaction::where('transactionid', $id)->first();
        $update = 'received';
        
        $transaction->update([
            'sellerpayout' => $update,
        ]);
        return redirect()->route('seller-transactions-detail', ['id' => $id]);

    }
    //--TRANSACTIONS

    //--STORE SETTINGS
    public function dashboard_seller_store() {
        $user = new User();
        $user = User::where('userid', session('user_data.id'))->first();
        $data = [
            'id' => $user->userid,
            'name' => $user->name,
            'email' => $user->email,
            'address1' => $user->address1,
            'address2' => $user->address2,
            'province' => $user->province,
            'city' => $user->city,
            'postalcode' => $user->postalcode,
            'country' => $user->country,
            'mobile' => $user->mobile,
            'storename' => $user->storename,
            'storecategory' => $user->storecategory,
            'is_store_selling' => $user->is_store_selling,
        ];
        return view('dashboard-seller-store', compact('data'));
    }

    public function dashboard_seller_store_update(Request $request, $id) {
        // dd($request->all());
        $user = new User();
        $data = $request->validate([
            'storename' => ['required'],
            'category' => ['required'],
            'is_store_open' => ['required'],
        ]);
        // dd($request->all());
        $conf = true;
        User::where('userid', $id)->update([
            'storename' => $data['storename'],
            'storecategory' => $data['category'],
            'is_store_selling' => $data['is_store_open']
        ]);
        $user = Auth::user();
        return redirect()->route('dashboard-seller-store');
    }
    //--STORE SETTINGS
 }