<?php
class register extends controller
{
    public $checklogin = "";
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->view("register/index");
    }
    function insert_data(){
        $this->model->insert_data($_POST);
    }
}
