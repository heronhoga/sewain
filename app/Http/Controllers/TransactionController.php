<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function allTransactions() {
        $transactions = new Transaction();
        $transactionsData = Transaction::where('buyer_id', session('user_data.id'))->get();

    }
}
