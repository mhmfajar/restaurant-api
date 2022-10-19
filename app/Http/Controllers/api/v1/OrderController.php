<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::query()
            ->with('table')
            ->withSum('orderDetails', 'total_price')
            ->withSum('orderDetails', 'qty')
            ->orderBy('orders.id')
            ->get()
            ->all();

        return OrderResource::collection($data);
    }

    public function orderTable(Request $request)
    {
        $id = $request->post('id');

        $table = Table::query()->find($id);
        $table->status = 'ordered';
        $table->save();

        $orderCount = Order::query()->where('order_number', 'LIKE', date('Ymd') . '%')->get()->count();
        $orderNumber = date('Ymd') . '-' . str_pad($orderCount + 1, 3, "0", STR_PAD_LEFT);

        Order::query()->create([
            'table_id' => $table->id,
            'order_number' => $orderNumber,
            'status' => 'open',
        ]);

        return response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['orderDetails.food'])->find($id);

        $data['total'] = 0;
        $data['order_number'] = $order->order_number;
        foreach ($order->orderDetails as $index => $value) {
            $data['details'][$index]['menu'] = $value->food->name;
            $data['details'][$index]['jumlah'] = $value->qty;
            $data['details'][$index]['total_price'] = $value->total_price;
            $data['total'] += $value->total_price;
        }

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy()
    {
        # code...
    }

    public function closeOrder(Request $request)
    {
        $orderId = $request->post('order_id');

        $order = Order::query()->find($orderId);
        $order->update([
            'status' => 'closed'
        ]);

        Table::query()->find($order->table_id)->update([
            'status' => 'available'
        ]);

        return response()->noContent();
    }
}
