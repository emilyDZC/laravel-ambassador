<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Http\Resources\OrderResource;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::with('orderItems')->get());
    }
}
