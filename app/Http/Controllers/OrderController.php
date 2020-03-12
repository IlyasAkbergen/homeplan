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
        $input = $request->only([
            'selectedComplexId',
            'selectedLayoutId',
            'selectedRooms',
            'customAddress',
            'customSpace'
        ]);

        $order = Order::create([
            'apartment_complex_id' => $input['selectedComplexId'] !== 'none'
                ? $input['selectedComplexId'] : 0,
            'layout_id' => isset($input['selectedLayoutId'])
                ? $input['selectedLayoutId'] : 0,
            'client_name' => 'temp',
            'email' => 'temp',
            'phone' => '',
            'custom_address' => isset($input['customAddress']) ? $input['customAddress'] : null,
            'custom_space' => isset($input['customSpace']) ? $input['customSpace'] : null,
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

//        event(new OrderCreated()); // todo

        $token = env("TELEGRAM_BOT_TOKEN");
        $chat_id = env("TELEGRAM_CHAT_ID");

        if(isset($order->apartmentComplex)){
            $complex = $order->apartmentComplex->name." | ".$order->apartmentComplex->address;
            $layout = $order->layout->space."м2 комнаты: ".$order->layout->rooms_count;
        }else{
            $complex = $order->custom_address . ', ' . $order->custom_space . 'м2, комнаты: ' . $order->rooms->count();
            $layout = "НЕТ ДАННЫХ";
        }

        $rooms = "\n";

        foreach ($order->rooms as $room){
            $rooms.="Тип: ".$room->type->name." | Стиль: ".$room->style->name."\n";
        }

        $arr = array(
            'Имя: '=>$input['clientName'],
            'Телефон: '=>$input['clientPhone'],
            "Жилой комплекс: "=>$complex,
            "Планировка: "=>$layout,
            "Команты: "=>$rooms,
            "Цена: "=>$order->getPrice()

        );

        $txt = "";
        $txt .=urlencode("<b>--------------------------------</b>\n");
        $txt .=urlencode("<b>НОВАЯ ЗАЯВКА!!!</b>\n");
        foreach($arr as $key => $value) {
            $txt .= urlencode("<b>".$key."</b> ".$value."\n");
        };
        $txt .=urlencode("<b>--------------------------------</b>\n");
        $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
        return $this->responseSuccess(new OrderResource($order));
    }

    public function destroy($id)
    {
        //
    }
}
