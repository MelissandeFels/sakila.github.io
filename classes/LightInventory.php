<?php

class LightInventory {

    private $_id;

    public function __construct($id) 
    {
        $this->_id = $id;
    }

    // getters
    public function getId(){return $this->_id;}

    //setters
    public function setId($inventoryId){return $this->_id = $inventoryId;}

}