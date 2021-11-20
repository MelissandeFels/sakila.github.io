<?php

class LightAddress {

    private $_id;
    private $_address;
    private $_city;
    private $_country;

    public function __construct($id, $address, $city, $country) 
    {
        $this->_id = $id;
        $this->_address = $address;
        $this->_city = $city;
        $this->_country = $country;
    }

    // getters
    public function getId(){return $this->_id;}
    public function getAddress(){return $this->_address;}
    public function getCity(){return $this->_city;}
    public function getCountry(){return $this->_country;}

    //setters
    public function setId($id){return $this->_id = $id;}
    public function setAddress($address){return $this->_address = $address;}
    public function setCity($city){return $this->_city = $city;}
    public function setCountry($country){return $this->_country = $country;}
}