<?php

/**
 * Customer class.
 */
class Customer {

    /**
     * Identify.
     */
    private $_id;
    /**
     * First name.
     */
    private $_firstname;
    /**
     * Last name.
     */
    private $_lastname;
    /**
     * Email.
     */
    private $_email;
    /**
     * Address.
     */
    private $_address;
    /**
     * District.
     */
    private $_district;
    /**
     * Postal code.
     */
    private $_postal_code;
    /**
     * Phone.
     */
    private $_phone;

    /**
     * Constructor.
     */
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

    // GETTERS

    /**
     * Return identify.
     */
    public function getId(){return $this->_id;}
    /**
     * Return first name.
     */
    public function getFirstName(){return $this->_firstname;}
    /**
     * Return last name.
     */
    public function getLastName(){return $this->_lastname;}
    /**
     * Return email.
     */
    public function getEmail(){return $this->_email;}
    /**
     * Return address.
     */
    public function getAddress(){return $this->_address;}
    /**
     * Return district.
     */
    public function getDistrict(){return $this->_district;}
    /**
     * Return postal code.
     */
    public function getPostalCode(){return $this->_postal_code;}
    /**
     * Return phone.
     */
    public function getPhone(){return $this->_phone;}

    //SETTERS

    /**
     * Set identify.
     */
    public function setId($customerId){return $this->_id = $customerId;}
    /**
     * Set frist name.
     */
    public function setFirstName($firstName){return $this->_firstname = $firstName;}
    /**
     * Set last name.
     */
    public function setLastName($lastName){return $this->_lastname = $lastName;}
    /**
     * Set email.
     */
    public function setEmail($email){return $this->_email = $email;}
    /**
     * Set address.
     */
    public function setAddress($address){return $this->_address = $address;}
    /**
     * Set district.
     */
    public function setDistrict($district){return $this->_district = $district;}
    /**
     * Set postal code.
     */
    public function setPostalCode($postalCode){return $this->_postal_code = $postalCode;}
    /**
     * Set phone.
     */
    public function setPhone($phone){return $this->_phone = $phone;}

}