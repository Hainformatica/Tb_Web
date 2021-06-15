<?php

namespace app\Controller;

use Exception;
use app\Util\Util;
class Controller {

    /**
     * @return mixed
     * 
     */
   
    public function view($view, $data = []) {
        $file = "../src/views/{$view}.php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            throw new Exception("Error Processing Request", 1);
        }
    }
    /**
     * @return  mixed
     * 
     */
    public function model($model) {
        $model = "app\\Model\\".$model;
        if (class_exists($model)) {
            return new $model;
        } else {
            Util::dd($model . " model  not found!");
        }
    }

    /**
     * @return  mixed
     * 
     */
    public function getRepository($repository) {
        $model = "app\\Repository\\" . $repository;
        if (class_exists($model)) {
            return new $model;
        } else {
            Util::dd($repository ." not found!");
        }
    }
    
    /** @return  mixed
     * 
     */
    public function getController($controller) {
        $controller = "app\\Controller\\" . $controller;
        if (class_exists($controller)) {
            return new $controller;
        } else {
            Util::dd($controller . " not found!");
        }
    }
    

    public function rowCount() {
        
    }
    
    /**
     * @param $view
     * @param array $data
     * @param bool $layout
    
     */
    
    protected function render($view, $data =[], $layout = true) {
        //$data['title'] = $title;
  
        if ($layout) {
            $this->view("templates/header", $data);
        }
        
        $this->view($view,$data);
        if ($layout) {
            $this->view("templates/footer");
        }
    }

}
