<?php

namespace App\Service;

use App\Models\Order;

class OrderService
{

    function update($data, $id)
    {
        $res = (object)[
            'code' => 200,
            'message' => 'Success!'
        ];
        try {
            $order = Order::findOrFail($id);

            $order['status'] = $data['status'];

            $order->save();
        }catch (\Exception $exception){
            $res = (object)[
                'code' => 500,
                'message' => 'Error System!'
            ];
        }
        return $res;
    }

    public function getCountOrder()
    {
        return count(Order::where('status','2')->get());
    }
}
