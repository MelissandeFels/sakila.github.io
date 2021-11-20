<?php

class LightStaff {

    private $_id;
    private $_firstname;
    private $_lastname;

    public function __construct($id, $firstName, $lastName) 
    {
        $this->_id = $id;
        $this->_firstname = $firstName;
        $this->_lastname = $lastName;
    }

    // getters
    public function getId(){return $this->_id;}
    public function getFirstName(){return $this->_firstname;}
    public function getLastName(){return $this->_lastname;}

    //setters
    public function setId($staffId){return $this->_id = $staffId;}
    public function setFirstName($firstName){return $this->_firstname = $firstName;}
    public function setLastName($lastName){return $this->_lastname = $lastName;}

}