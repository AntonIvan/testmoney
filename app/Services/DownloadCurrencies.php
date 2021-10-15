<?php

namespace App\Services;

class DownloadCurrencies
{
    public function load()
    {
        $xml = new \DOMDocument();
        $url = 'http://www.cbr.ru/scripts/XML_daily.asp';

        if (@$xml->load($url)) {
            $list = [];

            $root = $xml->documentElement;
            $items = $root->getElementsByTagName('Valute');

            foreach ($items as $item) {
                $code = $item->getElementsByTagName('CharCode')->item(0)->nodeValue;
                $curs = $item->getElementsByTagName('Value')->item(0)->nodeValue;
                $list[$code] = floatval(str_replace(',', '.', $curs));
            }
        }
        foreach ($list as $key => $item) {
            yield $key => $item;
        }
    }
}

