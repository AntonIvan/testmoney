<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CourseCurrency extends Model
{
    protected $table = "course_currency";

    public $timestamps = false;

    public function saveModel(int $date, int $currency, float $course): void {
        $model = new CourseCurrency();
        $model->currency_id = $currency;
        $model->date_id = $date;
        $model->course = $course;
        $model->save();
    }
}
