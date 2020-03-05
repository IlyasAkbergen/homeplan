<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * @return string
     */
    public function getPath() {
        return 'storage/'.$this->path;
    }

    public function model()
    {
        return $this->morphTo();
    }
}
