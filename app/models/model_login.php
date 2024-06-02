<?php

class model_login extends Model
{
    public $checkLogin = '';
    public $checkid='';

    function __construct()
    {
        parent::__construct();
        
    }

    function check_data($post)
    {
        $sql = "SELECT * FROM users WHERE username=? and password=?";
        $params = array($post['username'], md5($post['password']));
        $result = $this->doSelect($sql, $params);

        if (sizeof($result) == 0) {
           
                 echo json_encode(array(
                    "msg" => "not found",
                    "status_code"=>  "404"
                )
            );
            
           
        } else {
            $this->session_set("username", $result[0]['username']);
            $this->session_set("id", $result[0]['id']);
            $this->checkLogin = $result[0]['username'];
            $this->checkid=$result[0]['id'];
            echo json_encode(array(
                    "msg" => "ok",
                    "status_code"=>  "200"
                )
            );
        }
    }
}
?>