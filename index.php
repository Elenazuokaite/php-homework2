<?php
use Nfq\Weather\Location;
use Nfq\Weather\YahooWeatherProvider;
use Nfq\Weather\OpenWeatherMapWeatherProvider;
use Nfq\Weather\Weather;
use Nfq\Weather\WeatherProviderException;
use Nfq\Weather\WeatherProviderInterface;
use Nfq\Weather\DelegatingWeatherProvider;

require_once __DIR__.'/vendor/autoload.php';

$api_key = '8b14eb2c5beed13dd28c80dffdf74d42';
$yahoo = new YahooWeatherProvider();
$openWeather = new OpenWeatherMapWeatherProvider($api_key);

class Provider 
{  
  public static function run(WeatherProviderInterface $provider)
  {
      $location = new Location("Vilnius");
      $weather = $provider->fetch($location);
      echo "Temperature in ".$location->getCity()." ".$weather->getTemp()." °C".PHP_EOL;
      return $weather->getTemp();
  }
}

$delegateProvider = new DelegatingWeatherProvider(array($openWeather, $yahoo));
Provider::run($delegateProvider);
