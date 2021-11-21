<?php

/**
 * LightAdress class.
 */
class LightAddress {

    /**
     * Identify.
     */
    private $_id;
    /**
     * Address.
     */
    private $_address;
    /**
     * City.
     */
    private $_city;
    /**
     * Country.
     */
    private $_country;

    /**
     * Constructor.
     */
    public function __construct($id, $address, $city, $country) 
    {
        $this->_id = $id;
        $this->_address = $address;
        $this->_city = $city;
        $this->_country = $country;
    }

    // GETTERS

    /**
     * Return identify.
     */
    public function getId(){return $this->_id;}
    /**
     * Return address.
     */
    public function getAddress(){return $this->_address;}
    /**
     * Return city.
     */
    public function getCity(){return $this->_city;}
    /**
     * Return country.
     */
    public function getCountry(){return $this->_country;}

    //SETTERS

    /**
     * Set identify.
     */
    public function setId($id){return $this->_id = $id;}
    /**
     * Set address.
     */
    public function setAddress($address){return $this->_address = $address;}
    /**
     * Set city.
     */
    public function setCity($city){return $this->_city = $city;}
    /**
     * Set country.
     */
    public function setCountry($country){return $this->_country = $country;}
}