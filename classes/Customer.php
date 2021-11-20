<?php

class Customer {

    private $_id;
    private $_firstname;
    private $_lastname;
    private $_email;
    private $_address;
    private $_district;
    private $_postal_code;
    private $_phone;

    public function __construct($id, $firstName, $lastName, $email, $address, $pc, $phone) 
    {
        $this->_id = $id;
        $this->_firstname = $firstName;
        $this->_lastname = $lastName;
        $this->_email = $email;
        $this->_address = $address;
        $this->_postal_code = $pc;
        $this->_phone = $phone;
    }

    // getters
    public function getId(){return $this->_id;}
    public function getFirstName(){return $this->_firstname;}
    public function getLastName(){return $this->_lastname;}
    public function getEmail(){return $this->_email;}
    public function getAddress(){return $this->_address;}
    public function getDistrict(){return $this->_district;}
    public function getPostalCode(){return $this->_postal_code;}
    public function getPhone(){return $this->_phone;}

    //setters
    public function setId($customerId){return $this->_id = $customerId;}
    public function setFirstName($firstName){return $this->_firstname = $firstName;}
    public function setLastName($lastName){return $this->_lastname = $lastName;}
    public function setEmail($email){return $this->_email = $email;}
    public function setAddress($address){return $this->_address = $address;}
    public function setDistrict($district){return $this->_district = $district;}
    public function setPostalCode($postalCode){return $this->_postal_code = $postalCode;}
    public function setPhone($phone){return $this->_phone = $phone;}

}