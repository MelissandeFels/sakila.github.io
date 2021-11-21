<?php

/**
 * LightInventory class.
 */
class LightInventory {

    /**
     * Identify.
     */
    private $_id;

    /**
     * Constructor.
     */
    public function __construct($id) 
    {
        $this->_id = $id;
    }

    // GETTER

    /**
     * Return identify.
     */
    public function getId(){return $this->_id;}

    //SETTER

    /**
     * Set identify.
     */
    public function setId($inventoryId){return $this->_id = $inventoryId;}

}