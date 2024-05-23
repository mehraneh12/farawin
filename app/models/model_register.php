<?php
class model_register extends model
{
   function __construct()
   {
      parent::__construct();
   }
   function insert_data($post)
   {
      // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $sql = "SELECT * FROM farawin WHERE username=? ";
      $values = array($post['username']);
      $result = $this->doSelect($sql, $values);

      if (sizeof($result) == 0) {
         $sql = "INSERT INTO farawin (username,password,rpassword) VALUES(?,?,?) ";
         $values = array($post['username'], md5($post['password']), md5($post['rpassword']));
         $this->doQuery($sql, $values);
         echo json_encode( array(
               "msg" => "ok",
               "status_code" =>  "200"
            )
         );
      } else {

         echo json_encode( array(
               "msg" => "not found",
               "status_code" =>  "404"
            )
         );
      }

      // } else echo "error";
   }
}
