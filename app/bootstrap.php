<?php
    require_once 'libraries/core.php';
    require_once 'libraries/controller.php';
    require_once 'libraries/database.php';
     
    require_once 'helpers/session_helper.php';
    
    require_once 'config/config.php';
    
    spl_autoload_register(function($className){
        require_once 'libraries/'.$className.'.php';
    });