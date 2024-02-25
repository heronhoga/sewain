<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('register'); 
    }

    public function registerPost(Request $request) {
    //    return dd($request->all());
       $user = new User();
       $emailInput = $request->email;
       $existingUser = User::where('email', $emailInput)->first();
       if ($existingUser) {
        return redirect()->route('register')->with('error',"Email anda sudah terdaftar!");
       }

       if ($request->is_store_open == "false") {

        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postalcode' => 'required|numeric',
            'country' => 'required',
            'mobile' => 'required|numeric',
            'is_store_open' => 'required',
        ]);

        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->postalcode = $request->postalcode;
        $user->country = $request->country;
        $user->mobile = $request->mobile;
        $user->is_store_open = $request->is_store_open;
        $user->save();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $emailInput)->first();
            $name = $user->name;
            $id = $user->userid;
            $email = $user->email;
            $isStoreAvailable = $user->is_store_open;
            $data = [
                'name' => $name,
                'email' => $email,
                'is_store_open' => $isStoreAvailable,
                'id' => $id,
            ];
            $request->session()->put('user_data', $data);

            return redirect()->route('success');
        }
       } else if ($request->is_store_open == "true") {

        $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address1' => 'required',
            'address2' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postalcode' => 'required|numeric',
            'country' => 'required',
            'mobile' => 'required|numeric',
            'is_store_open' => 'required',
            'namatoko' => 'required',
            'category' => 'required',
        ]);

        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->postalcode = $request->postalcode;
        $user->country = $request->country;
        $user->mobile = $request->mobile;
        $user->is_store_open = $request->is_store_open;
        $user->storename = $request->namatoko;
        $user->storecategory = $request->category;
        $user->is_store_selling = true;
    
        $user->save();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $emailInput)->first();
            $name = $user->name;
            $id = $user->userid;
            $email = $user->email;
            $isStoreAvailable = $user->is_store_open;
            $data = [
                'name' => $name,
                'email' => $email,
                'is_store_open' => $isStoreAvailable,
                'id' => $id,
            ];
            $request->session()->put('user_data', $data);

            return redirect()->route('success')->with('user', $user);
        }
       }

    }

    public function login() {
        return view('login');
    }

    public function loginPost(Request $request) {
        $emailInput = $request->email;
        $passwordInput = Hash::make($request->password);

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $User = User::where('email', $emailInput)->first();
            $isStoreAvailable = $User->is_store_open;
    
            $user = User::where('email', $emailInput)->first();
            $name = $user->name;
            $id = $user->userid;
            $email = $user->email;
            if ($isStoreAvailable == 'false') {
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'is_store_open' => $isStoreAvailable,
                    'id' => $id,
                    'admin' => $user->isadmin,
                ];
                $request->session()->put('user_data', $data);
            } else {
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'is_store_open' => $isStoreAvailable,
                    'id' => $id,
                    'admin' => $user->isadmin,
                ];
                $request->session()->put('user_data', $data);
            }
            
            return redirect()->route('success')->with('user', $user);
        } else {
            return redirect()->route('login')->with('error',"Periksa email dan/atau password anda!");
        }
    }

    public function index() {
        $item = new Item();
        $items = Item::orderBy('added', 'desc')->take(8)->get();
        return view('index')->with('items', $items);
    }

    public function success() {
        return view('success');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
