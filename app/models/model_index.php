<?php

class model_index extends Model
{
   // $this->$checkid = Model::session_get("id");
   function __construct()
   {
      parent::__construct();
   }
   function contact_data($post)
   {

      // $checkid= Model::session_get("id");

      $sql = "SELECT * FROM farawin WHERE username=?";
      $values = array($post['contactPhone']);
      $result = $this->doSelect($sql, $values);



      if (sizeof($result) != 0) {
         $sql = "INSERT INTO contact(userid,contactid,name) VALUES(?,?,?) ";
         $values = array($_SESSION['id'], $result[0]['id'], $post['contactName']);
         $this->doQuery($sql, $values);

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
   }
}
