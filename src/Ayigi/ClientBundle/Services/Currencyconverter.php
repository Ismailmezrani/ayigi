<?php


class CurrencyConverter
{
    private $apiUrl = 'http://free.currencyconverterapi.com/api/v3/convert?q=[params]&compact=y';

    /**
     * @param string $from
     * @param string $to
     * @return mixed
     */
    public function convertFromTo(string $from = 'EUR', string $to = 'EUR')
    {
        $queryParameter = $from . '_' . $to ;
        $url = str_replace('[params]', $queryParameter, $this->apiUrl);
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;

    }
}