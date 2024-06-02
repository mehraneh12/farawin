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
      $sql = "SELECT * FROM users WHERE username=?";
      $values = array($post['contactPhone']);
      $result = $this->doSelect($sql, $values);
      if (sizeof($result) != 0) {
         if ($_SESSION['id'] == $result[0]['id']) {
            echo json_encode(
               array(
                  "msg" => "اطلاعات خودتان نمیتواند به جدول مخاطبان اضافه شود",
                  "status_code" =>  "101"
               )
            );
         } else {


            $stmt = "SELECT * FROM contact WHERE contactid=?";
            $params = array($result[0]['id']);
            $res = $this->doSelect($stmt, $params);

            if (sizeof($res) == 0) {
               $sql = "INSERT INTO contact(userid,contactid,name) VALUES(?,?,?) ";
               $values = array($_SESSION['id'], $result[0]['id'], $post['contactName']);
               $this->doQuery($sql, $values);

               echo json_encode(
                  array(
                     "msg" => "ok",
                     "status_code" =>  "200"
                  )
               );
            } else if($res[0]['name'] == $post['contactName']) {
               echo json_encode(
                  array(
                     "msg" => "no",
                     "status_code" =>  "303"
                  )
               );
            } else {
               echo json_encode(
                  array(
                     "msg" => "no",
                     "status_code" => "606"
                  )
               );
            } 
            }
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
