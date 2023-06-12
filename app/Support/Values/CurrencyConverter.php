<?php
namespace App\Support\Values;

use GuzzleHttp\Client;

class CurrencyConverter
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = config('services.openexchangerates.api_key');
    }

    public function getExchangeRate($baseCurrency, $targetCurrency)
    {
        $endpoint = "https://openexchangerates.org/api/latest.json?app_id={$this->apiKey}&base={$baseCurrency}";

        try {
            $response = $this->client->get($endpoint);
            $data = json_decode($response->getBody(), true);

            // Получение курса обмена валюты
            if (isset($data['rates'][$targetCurrency])) {
                return $data['rates'][$targetCurrency];
            }

            // Обработка ошибки или отсутствия данных
            return null;
        } catch (\Exception $e) {
            // Обработка ошибки запроса
            return null;
        }
    }
}
