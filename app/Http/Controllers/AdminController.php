<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $user = new User();
        $users = User::all(); // Retrieve all records from the User model
        $userCount = $users->count(); // Count the number of retrieved records

        $transaction = new Transaction();
        $transactions = Transaction::all();

        $store = new User();
        $openstore = User::where('is_store_open', 'true');
        $storecount = $openstore->count();

        $requestMoney = Transaction::where('sellerpayout', 'request');
        $requestcount = $requestMoney->count();

        //CATEGORY ITEM
        $alat = Item::where('category', 'alat')->count();
        $praktikum = Item::where('category', 'praktikum')->count();
        $kostum = Item::where('category', 'kostum')->count();
        $elektronik = Item::where('category', 'elektronik')->count();
        $olahraga = Item::where('category', 'olahraga')->count();
        $outdoor = Item::where('category', 'outdoor')->count();

        //BULAN TRANSAKSI
        $year = date("Y");

        $januari = Transaction::whereYear('added', $year)
        ->whereMonth('added', '01')
        ->get();

        $totalJanuari = 0;
        foreach ($januari as $transaction) {
        $totalJanuari += $transaction->totalprice;
        }

        $februari = Transaction::whereYear('added', $year)
        ->whereMonth('added', '02')
        ->get();

        $totalFebruari = 0;
        foreach ($februari as $transaction) {
        $totalFebruari += $transaction->totalprice;
        }

        $maret = Transaction::whereYear('added', $year)
        ->whereMonth('added', '03')
        ->get();

        $totalMaret = 0;
        foreach ($maret as $transaction) {
        $totalMaret += $transaction->totalprice;
        }

        $april = Transaction::whereYear('added', $year)
        ->whereMonth('added', '04')
        ->get();

        $totalApril = 0;
        foreach ($april as $transaction) {
        $totalApril += $transaction->totalprice;
        }

        $mei = Transaction::whereYear('added', $year)
        ->whereMonth('added', '05')
        ->get();

        $totalMei = 0;
        foreach ($mei as $transaction) {
        $totalMei += $transaction->totalprice;
        }

        $juni = Transaction::whereYear('added', $year)
        ->whereMonth('added', '06')
        ->get();

        $totalJuni = 0;
        foreach ($juni as $transaction) {
        $totalJuni += $transaction->totalprice;
        }

        $juli = Transaction::whereYear('added', $year)
        ->whereMonth('added', '07')
        ->get();

        $totalJuli = 0;
        foreach ($juli as $transaction) {
        $totalJuli += $transaction->totalprice;
        }

        $agustus = Transaction::whereYear('added', $year)
        ->whereMonth('added', '08')
        ->get();

        $totalAgustus = 0;
        foreach ($agustus as $transaction) {
        $totalAgustus += $transaction->totalprice;
        }

        $september = Transaction::whereYear('added', $year)
        ->whereMonth('added', '09')
        ->get();

        $totalSeptember = 0;
        foreach ($september as $transaction) {
        $totalSeptember += $transaction->totalprice;
        }

        $oktober = Transaction::whereYear('added', $year)
        ->whereMonth('added', '10')
        ->get();

        $totalOktober = 0;
        foreach ($oktober as $transaction) {
        $totalOktober += $transaction->totalprice;
        }

        $november = Transaction::whereYear('added', $year)
        ->whereMonth('added', '11')
        ->get();

        $totalNovember = 0;
        foreach ($november as $transaction) {
        $totalNovember += $transaction->totalprice;
        }

        $desember = Transaction::whereYear('added', $year)
        ->whereMonth('added', '12')
        ->get();

        $totalDesember = 0;
        foreach ($desember as $transaction) {
        $totalDesember += $transaction->totalprice;
        }

        return view('admin')->with('userCount', $userCount)
        ->with('transactions', $transactions)
        ->with('storecount', $storecount)
        ->with('requestcount', $requestcount)
        //BARANG
        ->with('alat', $alat)
        ->with('praktikum', $praktikum)
        ->with('kostum', $kostum)
        ->with('elektronik', $elektronik)
        ->with('olahraga', $olahraga)
        ->with('outdoor', $outdoor)
        //TRANSAKSI
        ->with('januari', $totalJanuari)
        ->with('februari', $totalFebruari)
        ->with('maret', $totalMaret)
        ->with('april', $totalApril)
        ->with('mei', $totalMei)
        ->with('juni', $totalJuni)
        ->with('juli', $totalJuli)
        ->with('agustus', $totalAgustus)
        ->with('september', $totalSeptember)
        ->with('oktober', $totalOktober)
        ->with('november', $totalNovember)
        ->with('desember', $totalDesember);
    }

    //USERS
    public function users() {
        $user = new User();
        $users = User::all();
        return view('admin-users')->with('users', $users);
    }

    public function user_delete($id) {
        $user = new User();
        $userDelete = User::where('userid', $id);
        $userDelete->delete();
        return redirect()->back();
    }

    public function user_edit($id) {
        $user = new User();
        $users = User::where('userid', $id)->first();
        return view ('admin-user-edit')->with('users', $users);
    }

    public function user_update(Request $request, $id) {
        // dd($request->all());
        $user = new User();
        $users = User::where('userid', $id)->first();
        $users->update([
            'name' => $request->name,
            'email' => $request->email,
            'address1' => $request->address1,
            'address2' => $request->address2,
            'province' => $request->province,
            'city' => $request->city,
            'postalcode' => $request->postalcode,
            'country' => $request->country,
            'mobile' => $request->mobile,
        ]);

        return redirect()->route('adminusers');
    }

    //STORES
    public function indexstore() {
        $user = new User();
        $store = User::where('is_store_open', 'true')->get();

        return view('admin-stores')->with('store', $store);
    }

    public function store_delete($id) {
        $store = new User();
        $storeDelete = User::where('userid', $id)->first();
        $storeDelete->update([
            'is_store_open' => 'false',
            'storename' => null,
            'storecategory' => null,
            'is_store_selling' => null,
        ]);

        return redirect()->back();
    }

    public function store_edit($id) {
        $store = new User();
        $storeEdit = User::where('userid', $id)->first();
        return view('admin-store-edit')->with('storeEdit', $storeEdit);
    }

    public function store_update(Request $request, $id) {
        $store = new User();
        $storeUpdate = User::where('userid', $id)->first();

        $storeUpdate->update([
            'storename' => $request->storename,
            'storecategory' => $request->category,
            'is_store_selling' => $request->is_store_open
        ]);
        
        return redirect()->route('adminstores');
    }

    public function indexpayout() {
        $transaction = new Transaction();
        $payout_pending = Transaction::where('sellerpayout', 'request')
        ->where('paymentstatus', 'paid')->get();

        return view('admin-payout-requests')->with('payout_pending', $payout_pending);
    }

    public function payout_update($id) {
        $transaction = new Transaction();
        $payout_pending = Transaction::where('sellerpayout', 'request')
        ->where('transactionid', $id)
        ->where('paymentstatus', 'paid')->first();

        $payout_pending->update([
           'sellerpayout' => 'received' 
        ]);

        return redirect()->route('payoutrequests');
    }

}
