<?php

namespace App\Services;

use App\Model\CourseCurrency;
use App\Model\Currency;
use App\Model\Date;
use Carbon\Carbon;

class GetCourseCurrency
{
    public function start(string $currency, string $date) {
            $currencyId = Currency::where("name", $currency)->first();
            if(!$currencyId) {
                return "Не найдено такой валюты";
            }
            $dateId = Date::where("date", Carbon::createFromFormat("d-m-Y", $date)->format("Y-m-d"))->first();
            if(!$dateId) {
                return "Не найдено такой даты";
            }
            return CourseCurrency::where(["date_id" => $dateId->id, "currency_id" => $currencyId->id])->first()->course;
    }
}
