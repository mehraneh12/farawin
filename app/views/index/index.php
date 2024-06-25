
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= URL; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
   
    <!-- <link rel="stylesheet" href="public/css/style3.css">  -->
    <link rel="stylesheet" href="public/css/style4.css">
</head>

<body>
    <div class="container">
        <div class="col-md-4 side">
            <div class="header" >
                <span >فراوین</span>
                <a id="plus" ><i class="fa fa-plus" ></i></a>
                <a id="refresh"><i class="fa fa-refresh" ></i></a>
            </div>
            <ul id="contact">
                
             </ul>
        </div>
        <div class="col-md-8 chat">
            <div class="header">
                <span id="changeNam1"></span>
               
            </div>
            <div class="body" id="msg-card_body">
               
            </div>
            <div class="footer">
                
                <textarea name="" class="form-control type_msg  text" placeholder="... Type your message" id="message"></textarea>
            <a id="sendMessage"><i class="fa fa-send" ></i></a> 
        </div>
        </div>
    </div>
 <!-- modalAdd add ********************************************************************-->
    <div id="modalAdd">
        <div class="content">
            <form onsubmit="return false">
                <i id="close" class="close fas fa-times " style=""></i><br>
                <input type="text" placeholder="name" id="name2" class="contact"><br>
                <input type="text" placeholder=".......0915" id="phone2" class="contact" maxlength="11"><br>
                <button type="submit" id="add" class="contact">add contact</button><br>
                <span id="warning1" style="color: white;display:none;">bbbbbbbbbbb</span>
                <input type="hidden" id="hiddenInput">
            </form>
        </div>
    </div>
<!-- modal change *************************************************************************** -->
    <div id="modalChange">
        <div class="content">
            <form onsubmit="return false">
            <i id="close1" class="close fas fa-times " style=""></i><br>
                <input type="text" placeholder="new name" id="newName" class="contact"><br>

                <button type="submit" id="changeName" class="contact">change name</button><br>
                <span id="warning2" style="display:none;color:white;"></span>
            </form>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/demo.js"></script>
    <script type="text/javascript" src="public/js/helper.js"></script>
    <script type="text/javascript" src="public/js/bootstrap.min.js"></script>
    <script>
      //update_contact_data // به روزرسانی مخاطبین با اماده شدن سند برنامه
      jQuery(document).ready(function() {
       
    $.ajax({
    url: "<?= URL; ?>index/update_contact_data",
    type: "POST",
    data: {},
    success: function(response) {
        response = JSON.parse(response);

        addContact(response.res);
    },
    error: function(response) {
        alert("خطای 500");
    }
});



// جلوگیری از تداخل جی کویری با کتابخانه های دیگری که از علامت مشابه $ استفاده میکنند با دو خط پایین
    // $.noConflict();
    // jQuery(document).ready(function($){
        var modalAdd = document.getElementById('modalAdd');
        var plus = document.getElementById('plus');
        var add = document.getElementById('add');
        var close = document.getElementById('close');
        var refresh = document.getElementById('refresh');
// اعتبار سنجی شماره تلفن
        function Checkphone(phone) {
            var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
            var result = regex.test(phone);
            return result;
        }

          //وقتی مودال باز یا بسته میشود کل فیلدهای ان پاکسازی میشود
          plus.onclick = function() {
            document.getElementById("name2").value = "";
            document.getElementById("phone2").value = "";
            document.getElementById("warning1").style.display = "none";
            modalAdd.style.display = 'block';
        };
//خالی کردن اینپوت ها در هنگام فوکوس
        document.getElementById("name2").onfocus = function() {
            document.getElementById("name2").value = "";
            $("#warning1").text("");
        };
        // خالی کردن اینپوت ها در هنگام فوکوس
        document.getElementById("phone2").onfocus = function() {
            document.getElementById("phone2").value = "";
            $("#warning1").text("");
        };
       

        //add_contact_data// مخاطبین را از مودال میگیرد و توسط تابع اد اچ تی ام ال به ساید بار اضافه میکند 
        add.onclick = function() {
            var contactName = document.getElementById("name2").value;
            var contactPhone = document.getElementById("phone2").value;
            var warning1 = document.getElementById("warning1");

            if (contactName == "" || contactPhone == "") {
                warning1.style.display = "block";
                $("#warning1").text("پر کردن تمامی فیلدها الزامیست");
            } else if (Checkphone(contactPhone) == false) {
                warning1.style.display = "block";
                $("#warning1").text(" فرمت موبایل رعایت نشده است");

            } else {

                $.ajax({
                    url: "<?= URL; ?>index/add_contact_data",
                    type: "POST",
                    data: {
                        "contactName": contactName,
                        "contactPhone": contactPhone

                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        if (response.status_code == "606") {
                            warning1.style.display = "block";
                            $("#warning1").text("این مخاطب قبلا با نام دیگری به جدول مخاطبان اضافه شده");
                        } else if (response.status_code == "101") {
                            warning1.style.display = "block";
                            $("#warning1").text("اطلاعات خودتان نمیتواند به جدول مخاطبان اضافه شود");
                        } else if (response.status_code == "404") {

                            warning1.style.display = "block";
                            $("#warning1").text("مخاطب را به فراوین دعوت کنید");

                        } else if (response.status_code == "303") {

                            warning1.style.display = "block";
                            $("#warning1").text("این مخاطب قبلا در جدول مخاطبین اضافه شده");

                        } else {

                            warning1.style.display = "block";
                            
                            addHtmlElement(response.contactName ,response.contactid);
                        }
                    },
                    error: function(response) {
                        alert("خطای 500");
                    }
                });
            }
        };


       

        //addHtmlElement------------------------------------------------------------------------------
        // مخاطبین را تک به تک به تابع اد اچ تی ام ال میفرستد تا در نوار ساید بار به نمایش در بیایند
        function addContact(res) {
            $("#contact").empty();
            for (let i = 0; i < res.length; i++) {
                    addHtmlElement(res[i]['name'],res[i]['contactid']);
              }
        }


 var isHiddenInputCreated = false;
function addHtmlElement($name, $contactid) {
    //یک اینپوت از نوی مخفی میسازد و کانتکت ایدی مخاطب کلیک شده را در ان نگهداری میکند
    // اینپوت فقط یکبار ساخته میشود ولی مقدار موجود در ان با کلیک مخاطبین تغییر میکند  
    if (!isHiddenInputCreated) {
          $("<input>").attr("type", "hidden").attr("id", "hiddeninput").appendTo("body");
          $("<input>").attr("type", "hidden").attr("id", "hiddeninput2").appendTo("body");
          isHiddenInputCreated = true;
        }
// در ساید بار یک ال ای میسازد و اطلاعات مخاطب را در ان قرار میدهد 
    var li = $("<li>").attr("data-id", $contactid).attr("class", "liclass");
    var buttonHTML = '<p>' + $name + '</p><div class="aclass"><i class="fa fa-edit " id="edit" onclick="edit()"></i><i class="fa fa-trash " id="delet" onclick="delet()"></i></div>';
    li.html(buttonHTML);
    $("#contact").append(li);
    $("#modalAdd").css("display", "none");
}

     
// با کلیک بر روی هر مخاطب در ساید بار رنگ ان و نام هدر کانتینر تغییر میکند
// مقدار موجود در اینپوت مخفی هم تغییر میکند
// و تمام پیامهای موجود در کانتینر پاک شده و پیامهای این مخاطب با کمک تابع ویو چت  نمایش داده میشود
$("#contact").on("click", "li", function() {
    $(this).addClass("active").siblings().removeClass("active");
    var Nam = $(".active").children("p").text();
    $("#changeNam1").text(Nam);
    var contactid = $(this).attr("data-id");
    $("#hiddeninput").val(contactid);
    $("#msg-card_body").empty();
      $.ajax({
        url:"<?=URL;?>index/viewchat",
        type:"POST",
        data:{
                "contactid":contactid
            },
            success: function(response) {
                                     response = JSON.parse(response);
                                     
                                     viewChatfunc(  response.arrayMessages,response.userid,response.contactid);
                                                 
                                       },
                      error: function(response) {
                                     alert("خطای 500");
                                     }
    });
    
});





$("#message").click(function () {
$(this).text("");
});

$("#refresh").click(function(){ 

    $.ajax({
    url: "<?= URL; ?>index/update_contact_data",
    type: "POST",
    data: {},
    success: function(response) {
        response = JSON.parse(response);

        addContact(response.res);
    },
    error: function(response) {
        alert("خطای 500");
    }
});
});


        //change_contact_data-----------------------------------------------------------------------------------------------------------------
// نام جدید مخاطب را گرفته و در لیست مخاطبین و هدر کانتینر و در جدول کانتکت انرا تغییر می دهد
$("#changeName").click(function() {
            if ($("#newName").val() == "") {
                warning2.style.display = "block";
                $("#warning2").text("پر کردن تمامی فیلدها الزامیست");
            } else {
                var changename=$("#newName").val();

                $("li.active").children("p").text(changename);
                $("#changeNam1").text(changename);
                // شروع : تغییر دادن در جدول مخاطبین 
                // console.log($("li.active").children("p.id").text());
                var changenametable=$("#hiddeninput").val();
            //    var changenametable= $("li.active").attr("data-id");
          
                $.ajax({
                url: "<?= URL; ?>index/change_contact_data",
                type: "POST",
                data: {
                    "changename":changename,
                    "changenametable":changenametable
                },
                success: function(response) {
                                     
                },
                error: function(response) {
                    alert("خطای 500");
                }
            });
                document.getElementById("modalChange").style.display = 'none';
            }
        });
       




// با کلیک بر روی یک مخاطب پیامهای بین مخاطب و فرد لاگین کننده را در کانتینر به نمایش میگذارد

function viewChatfunc(arrayMessages, userid, contactid) {

try{  
    $.each(arrayMessages, function(index, message) {
        var id=message.id;
        var sendId = message.sendId;
        var text = message.text;
        var date = message.date;
       
        var div = $("<div>").attr("id", id);  
     var item = '<span >' +' <pre>'+text+'</pre>' + '</span><span class="time">' + date + '</span>';
     $(div).html(item); 
    $("#msg-card_body").append($(div));
  
    if (sendId == userid) { console.log(id+"  "+sendId + "  " + text+"  "+"userid :  "+userid);
        $(div).addClass("left");
    } else if (sendId == contactid) {
        console.log(id+"  "+sendId + "  " + text+"  "+"contactid :  "+contactid);
        $(div).addClass("right");
    } 


// ------------------------------------------------------------------

    // ("#msg-card_body").on("click", "div.boxchat", function() {
    // // $(this).addClass("active").siblings().removeClass("active");
    // // var Nam = $(".active").children("p").text();
    // // $("#changeNam1").text(Nam);
    // var contactid = $(this).attr("id");
    // var editemessage = $("#" + contactid).find(".message").text();
    // $("#message").val(editemessage);
    // $("#hiddeninput2").val(contactid);
    // // $("#msg-card_body").empty();


    // });
// --------------------------------------------------------------------------^
});
} catch (exception) {
      console.error("606");
}   
}                          
               

 //     فرستادن اطلاعات کانتکت و متن پیام ارسالی برای ثبت در جدول مسیج
 $("#sendMessage").click( function() {
                    
         var message = $("#message").val();
         var contactid=   $("#hiddeninput").val();
      
         $.ajax({
                      url: "<?=URL;?>index/chat",
                      type: "POST",
                      data: {
                              "contactid":contactid,
                               "message":message
                            },
                       success: function(response) {
                                                        response = JSON.parse(response);
                                                       
                                                        viewChatfunc( response.Message,response.userid,response.contactid);
                                                          $("#message").val("");

                                                   },
                      error: function(response) {
                                                        alert("خطای 500");
                                                 }
                     });
                    });
           


 

// با کلیک بر روی ضربدر مودال اضافه کردن مخاطب را میبندد
        close.onclick = function closeModal() {
            modalAdd.style.display = 'none';
        };

// با کلیک بر روی ضربدر مودال تغییر نام مخاطب را میبندد
        document.getElementById('close1').onclick = function closemodalChange() {
            document.getElementById('modalChange').style.display = 'none';
        };


        $("#delet").click=function delet(){
          // پیدا کردن المان input مخفی و گرفتن مقدار آن
var contactid = $("input[type='hidden']").val();

// پیدا کردن المان li با شناسه f و حذف آن
$("#" + contactid).remove();
        }

// ------------------------------------------------------------{
//         $(document).ready(function() {
//     $("#msg-card_body").on("contextmenu","div" ,function(event) {
//         event.preventDefault();
        
//         // ایجاد منو context
//         var contextMenu = $("<ul>").attr("class", "context-menu");
        
//         // اضافه کردن گزینه حذف به منو
//         var deleteOption = $("<li>").text("حذف");
//         deleteOption.on("click", function() {
//             // عملیات حذف
//         });
        
//         // اضافه کردن گزینه ویرایش به منو
//         var editOption = $("<li>").text("ویرایش");
//         editOption.on("click", function() {
//             // عملیات ویرایش
//         });
        
//         // اضافه کردن گزینه‌ها به منو
//         contextMenu.append(deleteOption, editOption);
        
//         // نمایش منو context در مکان کلیک شده
//         contextMenu.css({
//             top: event.pageY + "px",
//             left: event.pageX + "px"
//         });
//         $("body").append(contextMenu);
        
//         // بستن منو context با کلیک خارج از آن
//         $(document).on("click", function() {
//             contextMenu.remove();
//         });
        
//         return false;
//     });
// });
// -------------------------------------------------------------------------}




// به این دست نزن
    });  
    // با کلیک بر روی دکمه ادیت مخاطب مودال مربوط به تغیر نام را نمایش میدهد
    function edit() {
    document.getElementById("newName").value = "";
            document.getElementById("warning2").style.display = "block";
            document.getElementById("modalChange").style.display = 'block'; 
        
       }    
  </script>
</body>

</html>
