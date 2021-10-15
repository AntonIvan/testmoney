<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    protected $table = "date";

    public $timestamps = false;

    public function saveModel(Carbon $date): Date {
        $model = new Date();
        $model->date = $date;
        $model->save();
        return $model;
    }
}
