<?php

class Film {

    private $_filmId;
    private $_title;
    private $_releaseYear;
    private $_rentalRate;
    private $_categoryName;
    private $_store_id;

    //constructor
    public function __construct($id, $title, $year, $rental, $category, $storeId)
    {
        $this->_filmId = $id;
        $this->_title = $title;
        $this->_releaseYear = $year;
        $this->_rentalRate = $rental;
        $this->_categoryName = $category;
        $this->_store_id = $storeId;
    }

    //getters
    public function getFilmId(){return $this->_filmId;}
    public function getTitle(){return $this->_title;}
    public function getReleaseYear(){return $this->_releaseYear;}
    public function getRentalRate(){return $this->_rentalRate;}
    public function getCategoryName(){return $this->_categoryName;}
    public function getStoreId(){return $this->_store_id;}

    //setters
    public function setFilmId($id){return $this->_filmId = $id;}
    public function setTitle($title){return $this->_title = $title;}
    public function setReleaseYear($year){return $this->_releaseYear = $year;}
    public function setRentalRate($rental){return $this->_rentalRate = $rental;}
    public function setCategoryName($name){return $this->_categoryName = $name;}
    public function setStoreId($store_id){return $this->_store_id = $store_id;}
}