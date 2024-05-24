<?php
class register extends controller
{ 
    public $checkregister ='';

    function __construct()
    {
        parent::__construct();
        // $this->checkregister  = model::session_get("username");
        if ($this->checkregister  != '') {
            header("Location:/farawin/login");
        }
    }
    function index()
    {
        $this->view("register/index");
    }
    function insert_data(){
     
        $this->model->insert_data($_POST);
    }
}
