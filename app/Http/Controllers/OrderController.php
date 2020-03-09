<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\UserLog;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->only(['selectedComplexId', 'selectedLayoutId', 'selectedRooms']);

        $order = Order::create([
            'apartment_complex_id' => $input['selectedComplexId'],
            'layout_id' => $input['selectedLayoutId'],
            'client_name' => 'temp',
            'email' => 'temp',
            'phone' => '',
        ]);

        $order->rooms()->attach(
            collect($input['selectedRooms'])->values()
        );

        UserLog::createLog('Создание заявки', 'Была создана заявка', $request->all());

        $order->load(['apartmentComplex', 'rooms', 'rooms.images', 'rooms.type']);

        return $this->responseSuccess(
            new OrderResource($order)
        );
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $input = $request->only(['clientName', 'clientPhone']);

        $order->update([
            'client_name' => $input['clientName'],
            'phone' => $input['clientPhone'],
        ]);

        return $this->responseSuccess(new OrderResource($order));
    }

    public function destroy($id)
    {
        //
    }
}
