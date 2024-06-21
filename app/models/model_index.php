<?php

class model_index extends Model
{
   // $this->$checkid = Model::session_get("id");
   function __construct()
   {
      parent::__construct();
   }
   function add_contact_data($post)

   {
      $sql = "SELECT * FROM users WHERE username=?";
      $values = array($post['contactPhone']);
      $result = $this->doSelect($sql, $values);
      // file_put_contents("meh.json",print_r( $result,true));
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
               // ---------------------------------------------------------------
               // file_put_contents("meh.json",print_r( $values,true));

               //
               // $stmt = "SELECT * FROM contact WHERE userid=?";
               // $params = array($_SESSION['id']);
               // $res = $this->doSelect($stmt, $params);

               echo json_encode(
                  array(
                     "msg" => "ok",
                     "status_code" =>  "200",
                     "contactName" =>  $post['contactName'],
                     // "changeid"=>base64_encode($values[1]) 
                     // مقدار مورد نظر را رمزنگاری میکند

                     "contactid"=> $values[1]
                  )
               );
            } else
               echo json_encode(
                  array(
                     "msg" => "no",
                     "status_code" =>  "303",
                     "arrayres" => "",
                     "changeid"=> ""
                  )
               );
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

   function update_contact_data()

   {
      $stmt = "SELECT * FROM contact WHERE userid=?";
      $params = array($_SESSION['id']);
      $res = $this->doSelect($stmt, $params);
      if (sizeof($res) != 0) {
         // file_put_contents("meh.json",print_r( $res,true));
         echo json_encode(
            array(
               "msg" => "ok",
               "status_code" =>  "200",
               "res" => $res

            )
         );
      } else {
         echo json_encode(
            array(
               "msg" => "no",
               "status_code" =>  "303",
               "res" => ""
            )
         );
      }
   }

   function change_contact_data($post)

   {
   //   $id=base64_decode($post['changenametable']) ; //مقدار رمز نگاری شده را رمز گشایی میکند
     $id= $post['changenametable'];
   $sql = "UPDATE contact SET name=? where contactid=$id";
      $values = array($post['changename']);
      $this->doQuery($sql, $values); 
       echo json_encode(
         array(
            "msg" => "ok"
            
         )
      );
      
   }


//   function saveChat($post){
//    $message=$post['message'];
//   }


   function chat($post)
   {

$message = $post['message'];
$contactid = $post['contactid'];
    $sql = "INSERT INTO message (sendId, getId, text,date) VALUES (?, ?, ?,?)";
   //  $values = array($_SESSION['id'], $contactid, $message,self::jalali_date("Y/m/d  H:i:s")); 
    $values = array($_SESSION['id'], $contactid, $message,self::jalali_date("  H:i")); 
    $this->doQuery($sql, $values);
    echo json_encode(array("msg" => "ok")); 
 
// }
}


function viewchat($post){
   $contactid = $post['contactid'];
   $userid=$_SESSION['id'];

   $sql = "SELECT * FROM message WHERE (sendId=? AND getId=?) OR ( sendId=? AND getId=? )";
$params = array($userid, $contactid,$contactid,$userid);
$arrayMessages = $this->doSelect($sql, $params);
file_put_contents("meh.json",print_r( $arrayMessages,true));

if (sizeof($arrayMessages) > 0) {
   echo json_encode(
      array(
      "arrayMessages" => $arrayMessages, 
       "userid"=>$userid,
      "contactid"=> $contactid
     
));
}
     
   
}
}