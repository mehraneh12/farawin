<?php
class model_register extends model
{ 
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
                  if (strlen($post['password']) >= 6 && strlen($post['password']) <20) {
                     $sql = "SELECT * FROM users WHERE username=? ";
                     $values = array($post['username']);
                     $result = $this->doSelect($sql, $values);

                     if (sizeof($result) == 0) {
                        $sql = "INSERT INTO users (username,password,register_date) VALUES(?,?,?) ";
                        $values = array($post['username'], md5($post['password']), self::jalali_date("Y/m/d"));
                        $this->doQuery($sql, $values);
                       
                        echo json_encode(
                           array(
                              // "msg" => "ok",
                              "status_code" =>  "200"
                           )
                        );
                     } else {

                        echo json_encode(
                           array(
                              // "msg" => "not found",
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
            echo "error  fild model-register.php";
         }
      } else echo "error request model-register.php";
   }
}
?>