<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $primaryKey = 'transactionid';

    // protected $fillable = [
    //     'buyer_id',
    //     'seller_id',
    //     'item_id',
    //     'selleraddress',
    //     'buyeraddress',
    //     'sellerphone',
    //     'buyerphone',
    //     'dayrent',
    //     'totalprice',
    //     'paymentstatus',
    //     'itemstatus',
    //     'added',
    // ];

    protected $guarded = [];
    public $timestamps = false;
}
