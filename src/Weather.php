<?php
namespace Nfq\Weather;

class Weather {
    private $temp;
    public function __construct($temp) {
        $this->temp = $temp;
    }
    public function getTemp() {
        return $this->temp;
    }
}