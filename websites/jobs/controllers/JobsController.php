<?php
namespace controllers;
class JobsController {
    private $jobsTable;
    private $categoryTable;
    private $contents;

    public function __construct(\classes\databaseTable $jobsTable, \classes\databaseTable $categoryTable){
        $this->jobsTable = $jobsTable;
        $this->categoryTable = $categoryTable;
        $this->contents = $this->categoryTable->findAll();
    }

    public function home(){
        $job=$this->jobsTable->showSorted();

        return[
            'template'=>'home.html.php',
            'title'=>"Home",
            'contents'=>$job
        ];
    }

    public function listCat(){
        $categories = $this->categoryTable->findAll();

        return [
            'template'=>'categories.html.php',
            'title'=>"Job categories",
            'contents'=>$categories
        ];
    }

    public function faq() {
        return [
            'template'=>'faq.html.php',
            'title'=>"FAQ",
            'contents'=>$this->contents
        ];
    }

    public function aboutUs(){
        return [
            'template'=>'about.html.php',
            'title'=>"About us",
            'contents'=>$this->contents
        ];
    }

    public function contactUs(){
        return [
            'template'=>'contactus.html.php',
            'title'=>'Contact Us',
            'contents'=>$this->contents
        ];
    }

    public function contactUsSubmit(){
        
    }

    public function apply(){
        return [
            'template'=>'apply.html.php',
            'title'=>'Job apply',
            'contents'=>$this->contents
        ];
    }

    public function categories(){
        return[
            'template'=>'categories.html.php',
            'title'=>'',
            'contents'=>$this->contents
        ];
    }
}