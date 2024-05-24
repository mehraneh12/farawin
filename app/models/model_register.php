<?php
class model_register extends model
{ public $checkregister ;
   function __construct()
   {
      parent::__construct();
   }
   function insert_data($post)
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

         if (isset($post['username']) and isset($post['password']) and isset($post['rpassword'])) {
            if (!empty($post['username']) and !empty($post['password']) and !empty($post['rpassword'])) {
               if ($post['password'] == $post['rpassword']) {
                  if (strlen($post['password']) >= 2) {
                     $sql = "SELECT * FROM farawin WHERE username=? ";
                     $values = array($post['username']);
                     $result = $this->doSelect($sql, $values);

                     if (sizeof($result) == 0) {
                        $sql = "INSERT INTO farawin (username,password,rpassword) VALUES(?,?,?) ";
                        $values = array($post['username'], md5($post['password']), md5($post['rpassword']));
                        $this->doQuery($sql, $values);
                        // $this->checkregister = "true";
                        //  echo($this->checkregister) ;exit;
                        echo json_encode(
                           array(
                              "msg" => "ok",
                              "status_code" =>  "200"
                           )
                        );
                     } else {

                        echo json_encode(
                           array(
                              "msg" => "not found",
                              "status_code" =>  "404"
                           )
                        );
                     }
                  } else {
                     echo "رمز عبور نباید کمتر از 8 حرف باشد";
                  }
               } else {
                  echo "تکرار رمز عبور اشتباه است";
               }
            } else {
               echo "پر کردن تمامی فیلدها الزامی است";
            }
         } else {
            echo "error";
         }
      } else echo "error";
   }
}
?>