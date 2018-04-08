<?php
namespace Nfq\Weather;

class YahooWeatherProvider implements WeatherProviderInterface
{
    public function fetch(Location $location): Weather {
        $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="vilnius, lt") and u="c"';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    // Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    // Convert JSON to PHP object
     $phpObj =  json_decode($json);
    // var_dump($phpObj);
    $weather = new Weather($phpObj->query->results->channel->item->condition->temp);

        return $weather;
    }
    public function hi() {
        echo 'Hi, yahoo is loaded'.PHP_EOL;
    }
}
