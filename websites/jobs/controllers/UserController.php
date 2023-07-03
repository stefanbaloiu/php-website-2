<?php
namespace controllers;
class UserController {
    private $userTable;
    private $contents;
    private $categoryTable;
    private $jobTable;

    public function __construct(\classes\databaseTable $userTable, \classes\databaseTable $categoryTable, \classes\databaseTable $jobTable){
        $this->userTable = $userTable;
        $this->contents = $this->userTable->findAll();
        $this->categoryTable = $categoryTable;
        $this->jobTable = $jobTable;
    }

    public function login(){
        return [
            'template'=>'login.html.php',
            'title'=>'Admin login',
            'contents'=>$this->contents
        ];
    }

    public function loginSubmit(){
        if(isset($_POST['submit'])){
            if($_POST['username'] === $this->userTable->find('username', $_POST['username']) && $_POST['password'] === $this->userTable->find('password', $_POST['password']))
            {
                $_SESSION['loggedin']=true;
                $_SESSION['user']='admin';
                echo '<h2>You are now logged in</h2> 
                <p><a href="/user/admin">Go to the admin portal</a></p>';
            }
            else{
                echo '<p>Failed to log in</p>';
            }
        }
    }

    public function logOut(){
    }

    public function logOutSubmit(){
    }
    
    public function categoryList(){
        if(isset($_SESSION['loggedin'])){
            return [
                'template'=>'adminCategories.html.php',
                'title'=>'Admin - Category list',
                'contents'=>$this->contents
            ];
        }
    }

    public function categoryAdd(){
        if(isset($_SESSION['loggedin'])){
            return [
                'template'=>'addCategory.html.php',
                'title'=>'Admin - Add category',
                'contents'=>$this->contents
            ];
        }
    }

    public function categoryDelete(){
        if(isset($_SESSION['loggedin'])){
            return [
                'template'=>'deleteCategory.html.php',
                'title'=>'Admin - Delete category',
                'contents'=>$this->contents
            ];
        }
    }

    public function categoryDeleteSubmit(){
        if (isset($_POST['submit'])) {
            $id = [
                'id'=>$_POST['id']
            ];
            $values = [
                'value'=>$_POST['name']
            ];
            $this->categoryTable->delete($id, $values);
            echo "<h2>Category ". $_POST['name'] ." was deleted.</h2>";
        }
    }

    public function categoryEdit(){
        if(isset($_SESSION['loggedin'])){
                return [
                    'template'=>'editCategory.html.php',
                    'title'=>'Admin - Edit category',
                    'contents'=>$this->contents
                ];
        }
    }

    public function categoryEditSubmit(){
        if (isset($_POST['submit'])) {
            $values = [
                'id'=>$_POST['id'],
                'name'=>$_POST['name']
            ];
            $this->categoryTable->update($values);
            echo "<h2>Category ". $_POST['name'] ." was edited.<h2>";
        }
    }

    public function jobList(){
    }

    public function jobEdit(){
    }

    public function jobArchiveList(){
    }

    public function jobAdd(){
    }

    public function jobDelete(){
    }

    public function applicantList(){
    }
    
    public function contactFormsList(){
    }
}