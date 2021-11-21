<?php

/**
 * Film class.
 */
class Film {

    /**
     * Identify.
     */
    private $_filmId;
    /**
     * Title.
     */
    private $_title;
    /**
     * Release year.
     */
    private $_releaseYear;
    /**
     * Rental rate.
     */
    private $_rentalRate;
    /**
     * Category name.
     */
    private $_categoryName;
    /**
     * Store identify.
     */
    private $_store_id;

    /**
     * Constructor.
     */
    public function __construct($id, $title, $year, $rental, $category, $storeId)
    {
        $this->_filmId = $id;
        $this->_title = $title;
        $this->_releaseYear = $year;
        $this->_rentalRate = $rental;
        $this->_categoryName = $category;
        $this->_store_id = $storeId;
    }

    //GETTERS

    /**
     * Return identify.
     */
    public function getFilmId(){return $this->_filmId;}
    /**
     * Return title.
     */
    public function getTitle(){return $this->_title;}
    /**
     * Return release year.
     */
    public function getReleaseYear(){return $this->_releaseYear;}
    /**
     * Return rental rate.
     */
    public function getRentalRate(){return $this->_rentalRate;}
    /**
     * Return category name.
     */
    public function getCategoryName(){return $this->_categoryName;}
    /**
     * Return store id.
     */
    public function getStoreId(){return $this->_store_id;}

    //SETTERS

    /**
     * Set identify.
     */
    public function setFilmId($id){return $this->_filmId = $id;}
    /**
     * Set title.
     */
    public function setTitle($title){return $this->_title = $title;}
    /**
     * Set release year.
     */
    public function setReleaseYear($year){return $this->_releaseYear = $year;}
    /**
     * Set rental rate.
     */
    public function setRentalRate($rental){return $this->_rentalRate = $rental;}
    /**
     * Set category name.
     */
    public function setCategoryName($name){return $this->_categoryName = $name;}
    /**
     * Set store id.
     */
    public function setStoreId($store_id){return $this->_store_id = $store_id;}
}