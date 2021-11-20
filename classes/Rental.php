<?php

class Rental {

    private $_rental_id;
    private $_rentalDate;
    private $_firstName;
    private $_lastName;
    private $_title;
    private $_description;
    private $_rentalRate;

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

    // getters
    public function getRentalId(){return $this->_rental_id;}
    public function getRentalDate(){return $this->_rentalDate;}
    public function getCustomerFirstName(){return $this->_firstName;}
    public function getCustomerLastName(){return $this->_lastName;}
    public function getTitleFilm(){return $this->_title;}
    public function getDescriptionFilm(){return $this->_description;}
    public function getRentalRateFilm(){return $this->_rentalRate;}

    // setters
    public function setRentalId($rentalId){return $this->_rental_id = $rentalId;}
    public function setRentalDate($rentalDate){return $this->_rentalDate = $rentalDate;}
    public function setCustomerFirstName($customerFirstName){return $this->_firstName = $customerFirstName;}
    public function setCustomerLastName($customerLastName){return $this->_lastName = $customerLastName;}
    public function setTitleFilm($titleFilm){return $this->_title = $titleFilm;}
    public function setDescriptionFilm($descriptionFilm){return $this->_description = $descriptionFilm;}
    public function setRentalRateFilm($rentalRateFilm){return $this->_rentalRate = $rentalRateFilm;}
 
}