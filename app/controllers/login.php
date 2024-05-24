
<?php

class Login extends Controller
{
    public $checkLogin = '';
    public $checkregister ='';
    function __construct()
    {    parent::__construct();
      
        if ($this->checkregister == '') {  
            header("Location: /farawin/register"  );
        } else {
            $this->checkLogin = Model::session_get("username");
            if ($this->checkLogin == FALSE) {
                header("Location:/farawin/login");
            }else{header("Location: ". URL);}
        }
    }

    function index()
    {
        $this->view('login/index');
    }
    function check_data()
    {
        $this->model->check_data($_POST);
    }


}

?>