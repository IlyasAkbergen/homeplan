<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class UserLog extends Model
{
    public static function createLog($name, $description='', $data='') {
        $log = new self();
        $log->name = $name;
        $log->description = $description;
        $log->url  = URL::current();
        $log->data = !empty($data)?serialize($data):'';
        $log->save();
    }
}
