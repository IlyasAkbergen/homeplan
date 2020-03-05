<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function responseSuccess($result, $message='', $code = 200)
    {
        return $this->response('success', $result, $message, $code);
    }

    public function responseFail($result, $message='', $code = 400)
    {
        return $this->response('fail', $result, $message, $code);
    }

    public function responseFailValidation($result)
    {
        return $this->responseFail($result, 'validation', 403);
    }

    protected function response($status, $result, $message, $code) {
        return response()->json( [ 'status' => $status, 'message'=>$message, 'result' => $result ], $code);
    }
}
