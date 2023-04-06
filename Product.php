<?php

require(__DIR__ . '/BaseModel.php');
class Product extends BaseModel {

    private $table = 'products';

    private $name;

    private $decription;

    private $price;

    public function __construct() 
    {
       

        parent::__construct($this->table);
    }
    public function setName($name) 
    {
        $this->name = $name;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function setDecription($decription) 
    {
        $this->decription = $decription;
    }

    public function getDecription() 
    {
        return $this->decription;
    }

    public function setPrice($price) 
    {
        $this->price = $price;
    }

    public function getPrice() 
    {
        return $this->price;
    }
    
}