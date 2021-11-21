<?php

/**
 * Rental class.
 */
class Rental {

    /**
     * Identify.
     */
    private $_rental_id;
    /**
     * Rental date.
     */
    private $_rentalDate;
    /**
     * First name.
     */
    private $_firstName;
    /**
     * Last name.
     */
    private $_lastName;
    /**
     * Title.
     */
    private $_title;
    /**
     * Description.
     */
    private $_description;
    /**
     * Rental rate.
     */
    private $_rentalRate;

    /**
     * Constructor.
     */
    public function __construct($rentalId, $rentalDate, $firstName, $lastName, $title, $description, $rentalRate) 
    {
        $this->_rental_id = $rentalId;
        $this->_rentalDate = $rentalDate;
        $this->_firstName = $firstName;
        $this->_lastName = $lastName;
        $this->_title = $title;
        $this->_description = $description;
        $this->_rentalRate = $rentalRate;
    }

    // GETTERS

    /**
     * Return identify.
     */
    public function getRentalId(){return $this->_rental_id;}
    /**
     * Return rental date.
     */
    public function getRentalDate(){return $this->_rentalDate;}
    /**
     * Return first name.
     */
    public function getCustomerFirstName(){return $this->_firstName;}
    /**
     * Return last name.
     */
    public function getCustomerLastName(){return $this->_lastName;}
    /**
     * Return title.
     */
    public function getTitleFilm(){return $this->_title;}
    /**
     * Return description.
     */
    public function getDescriptionFilm(){return $this->_description;}
    /**
     * Return rental rate.
     */
    public function getRentalRateFilm(){return $this->_rentalRate;}

    // SETTERS

    /**
     * Set identify.
     */
    public function setRentalId($rentalId){return $this->_rental_id = $rentalId;}
    /**
     * Set rental date.
     */
    public function setRentalDate($rentalDate){return $this->_rentalDate = $rentalDate;}
    /**
     * Set first name.
     */
    public function setCustomerFirstName($customerFirstName){return $this->_firstName = $customerFirstName;}
    /**
     * Set last name.
     */
    public function setCustomerLastName($customerLastName){return $this->_lastName = $customerLastName;}
    /**
     * Set title.
     */
    public function setTitleFilm($titleFilm){return $this->_title = $titleFilm;}
    /**
     * Set description.
     */
    public function setDescriptionFilm($descriptionFilm){return $this->_description = $descriptionFilm;}
    /**
     * Set rental rate.
     */
    public function setRentalRateFilm($rentalRateFilm){return $this->_rentalRate = $rentalRateFilm;}
 
}