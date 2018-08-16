<?php

class Users extends Controller{
    public function __construct() {
        $this->userModel = $this->model('User');  
    }
    
    public function register(){
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];
            
            if (empty($data['email'])){
                $data['email_err'] = "Please enter email";
                echo $data['email_err'];
            }else{
                if( $this->userModel->findUserByEmail($data['email']) ){
                    $data['email_err'] = 'Email is already taken';
                    echo $data['email_err'];
                }
            }
            
            if (empty($data['name'])){
                $data['name_err'] = "Please enter name";
                echo $data['name_err'];
            }
            
            if (empty($data['password'])){
                $data['password_err'] ="Please enter password";
                echo $data['password_err'];
            }elseif (strlen($data['password'])<6) {
                $data['password_err'] = "Password must be at least 6 characters";
                echo $data['password_err'];
            }
            
            if (empty($data['confirm_password'])){
                $data['confirm_password_err'] = "Please confirm password";
                echo $data['confirm_password_err'];
            }else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "Please do not match";
                    echo $data['confirm_password_err'];
                }
            }
            
            if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) &&empty($data['confirm_password_err'])){
                
                if($this->userModel->register($data)){
                   
                    header('Location:'. URLROOT . '/users/login');
                }else{
                    die('Something went wrong');
                }
                
            } else {
                $this->view('users/register', $data);
            }
            
            
            
        }else{
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
            ];
            
            $this->view('users/register', $data);
        }
    }
    
    public function login(){
        
        
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];
            
            if (empty($data['email'])){
                $data['email_err'] = "Please enter email";
                echo $data['email_err'];
            }
            
            if (empty($data['password'])){
                $data['password_err'] ="Please enter password";
                echo $data['password_err'];
            }
            
            if($this->userModel->findUserByEmail($data['email'])){
                
            }else{
                $data['email_err'] = 'No user found';
                echo $data['email_err'];
            }
            
            if(empty($data['email_err']) && empty($data['password_err'])){
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                if($loggedInUser){
                    $this->createUserSession($loggedInUser);
                    
                }else{
                    $data['password_err'] = 'Password incorect';
                    echo $data['password_err'];
                    $this->view('users/login', $data);
                }
                
                
            } else {
                $this->view('users/login', $data);
            }
           
        }else{
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            
            $this->view('users/login', $data);
        }
    }
    
    public function createUserSession($user){
        
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        header('location:'. URLROOT . '/pages/index');
    }
    
    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        header('location: ' . URLROOT . '/users/login');
    }
    
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
}
