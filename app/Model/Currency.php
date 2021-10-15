<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = "currency";

    public $timestamps = false;

    public function saveModel(string $name):Currency {
        $model = new Currency();
        $model->name = $name;
        $model->save();
        return $model;
    }
}
