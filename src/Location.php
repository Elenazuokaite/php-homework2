<?php
namespace Nfq\Weather;

class Location {
    public $lon;
    public $lat;
    public function __construct(string $lon, $lat) {
        $this->lon = $lon;
        $this->lat = $lat;
    }    
}