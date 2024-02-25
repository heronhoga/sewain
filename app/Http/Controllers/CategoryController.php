<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category) {
        $user = new User();
        $item = new Item();
        $user = User::where('userid', session('user_data.id'))->first();
        $items = Item::where('category', $category)->get();
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
            'itemcategory' => $category
        ];
        return view('categories', compact('data'))->with('items', $items);
    }
}
