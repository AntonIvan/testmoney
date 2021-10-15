<?php

namespace App\Services;

use App\Model\CourseCurrency;
use App\Model\Currency;
use App\Model\Date;
use Carbon\Carbon;

class GetCurrencies
{
    private $currency;

    private $courseCurrency;

    private $date;

    public function __construct()
    {
        $this->currency = new Currency();
        $this->courseCurrency = new CourseCurrency();
        $this->date = new Date();
    }

    public function start() {
        $dateId = $this->setNowDate();
        foreach (resolve(DownloadCurrencies::class)->load() as $currency => $value) {
            $obj = $this->currency::where("name", $currency)->first();
            if(!$obj) {
                $obj = $this->currency->saveModel($currency);
            }
            $this->courseCurrency->saveModel($dateId, $obj->id, $value);
        }
    }

    private function setNowDate(): int {
        $now = Carbon::now();
        $date = $this->date->where("date", $now->format("Y-m-d"))->first();
        if($date) {
            return $date->id;
        }
        return $this->date->saveModel($now)->id;
    }
}
