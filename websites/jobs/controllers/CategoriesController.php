<?php
namespace controllers;
class CategoriesController{
    private $categoriesTable;

    public function __construct(\classes\databaseTable $categoriesTable){
        $this->categoriesTable = $categoriesTable;
    }

    public function list(){
        $categories = $this->categoriesTable->findAll();

        return [
            'template'=>'categories.html.php',
            'title'=>"Jo's jobs - categories",
            'variables'=>[
                'categories'=>$categories
            ],
            'categories'=>$categories
        ];
    }
}