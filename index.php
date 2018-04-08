<?php
use Nfq\Weather\Location;
use Nfq\Weather\YahooWeatherProvider;
use Nfq\Weather\OpenWeatherMapWeatherProvider;
use Nfq\Weather\Weather;
use Nfq\Weather\WeatherProviderException;
use Nfq\Weather\WeatherProviderInterface;
require_once __DIR__.'/vendor/autoload.php';

$yahoo = new YahooWeatherProvider();
$openWeather = new OpenWeatherMapWeatherProvider();


function run(WeatherProviderInterface $provider)
{
    $location = new Location(25, 54);
    $weather = $provider->fetch($location);
    echo "Temperature: ".$weather->getTemp()." °C".PHP_EOL;

    return $weather->getTemp();
}

try {
  if(run($openWeather) === FALSE || run($yahoo) === FALSE) {

    throw new WeatherProviderException();
    }
  }

catch (WeatherProviderException $e) {
  echo $e->errorMessage();
}
