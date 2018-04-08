<?php
namespace Nfq\Weather;

class WeatherProviderException extends Exception {
    public function errorMessage() {
        $errorMsg = "Weather provider stoped working";
        return $errorMsg;
    }
}