<?php

/**
 * LightStaff class.
 */
class LightStaff {

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
     * Constructor.
     */
    public function __construct($id, $firstName, $lastName) 
    {
        $this->_id = $id;
        $this->_firstname = $firstName;
        $this->_lastname = $lastName;
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

    //SETTERS

    /**
     * Set identify.
     */
    public function setId($staffId){return $this->_id = $staffId;}
    /**
     * Set first name.
     */
    public function setFirstName($firstName){return $this->_firstname = $firstName;}
    /**
     * Set last name.
     */
    public function setLastName($lastName){return $this->_lastname = $lastName;}

}