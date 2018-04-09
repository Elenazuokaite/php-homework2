<?php
use Nfq\Weather\WeatherProviderException;
namespace Nfq\Weather;


class OpenWeatherMapWeatherProvider implements WeatherProviderInterface
{
    private $api_key;
    public function __construct(string $api_key) {
        $this->api_key = $api_key;
    }     

    public function fetch(Location $location): Weather {
        $response = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$location->getCity()."&units=metric&appid=".$this->api_key);
        $deals = json_decode($response, true);
        $temp = $deals["main"]["temp"];
        if(!isset($temp)) {
        throw new WeatherProviderException('Unexpected unserialized result from OpenWeatherMapWeatherProvider');
    }
        return  new Weather($temp);
    }

}
