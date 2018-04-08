<?php
use Nfq\Weather\WeatherProviderException;
namespace Nfq\Weather;


class OpenWeatherMapWeatherProvider implements WeatherProviderInterface
{
    private $api_key = '8b14eb2c5beed13dd28c80dffdf74d42';

    public function fetch(Location $location): Weather {
        $response = file_get_contents("http://api.openweathermap.org/data/2.5/weather?lat=".$location->lat."&lon=".$location->lon."&units=metric&appid=".$this->api_key);
        $deals = json_decode($response, true);
        $temp = $deals["main"]["temp"];
        $weather = new Weather($temp);
        return $weather;
    }

    public function hello() {
        echo "hello, open weather is loaded".PHP_EOL;
    }
}
