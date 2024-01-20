<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderCollection;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * @param \App\Models\Order $order
     *
     * @return \App\Http\Resources\OrderCollection
     */
    public function __invoke(Order $order): OrderCollection
    {
        DB::enableQueryLog();
        $orders = $order
            ->limit(50)
            ->get();
        $queries = DB::getQueryLog();
        return new OrderCollection($orders, $queries);
    }
}
