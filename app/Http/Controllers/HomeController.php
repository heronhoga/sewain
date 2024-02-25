<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {
        $user = new User();
        $item = new Item();
        $items = Item::orderBy('added', 'desc')->take(8)->get();
        $user = User::where('userid', session('user_data.id'))->first();

        // $username = $user->name;
        
        return view('home')->with('user', $user)->with('items', $items);
    }
}
