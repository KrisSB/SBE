<?php

class Bootstrap {

    function __construct() {

        $url = explode("/", rtrim(filter_input(INPUT_GET, 'url'), "/"));    //Gets the url information

        $link = strtolower($url[0]);    //This is first part of the URL, which directs the page towards the correct controller
        //If nothing specified
        if (empty($link)) {
            require_once 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            exit;
        }
        $file = 'controllers/' . $link . '.php';    //The file directory of the controller

        if (file_exists($file)) {
            require_once $file;     //calls the page of the controller
        } else {
            Error::page_not_exist();
        }

        if (class_exists($link)) {
            $controller = new $link();      //Creates the class within the controller
        } else {
            Error::page_not_exist();
        }
        if(isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->$url[1]($url[2]);      //Calls the methods specified within the controller
            } else {
                Error::page_not_exist();
            }
        } elseif(isset($url[1])) {
            if (method_exists($controller, $url[1])) {
                $controller->$url[1]();      //Calls the methods specified within the controller
            } else {
                Error::page_not_exist();
            }
        } else {
            $controller->index();
        }
    }

}
