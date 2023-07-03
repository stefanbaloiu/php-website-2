<?php
namespace entities;
class Job{
    public $id;
    public $title;
    public $description;
    public $salary;
    public $closingDate;
    public $categoryId;
    public $location;
    public $archive;

    public $catTable;

    public function __construct(\classes\databaseTable $catTable){
        $this->catTable = $catTable;
    }

    public function getCategory(){
        return $this->catTable->find('id', $this->categoryId)[0];
    }
    
}