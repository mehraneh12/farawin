<!DOCTYPE html>
<html>

<head>
    <base href="<?= URL; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <!-- CSS -->



    <link rel="stylesheet" href="public/css/style3.css">
    <style>
.liclass {
	display: flex;
	justify-content: space-between;
	flex-direction: row;
	width: 40px;
	height: 30px;
	align-items: center;
	color: white !important;
	border-bottom: 1px solid lightgray;
}

.aclass {
	background: unset;
	border: 0;

	font-size: 20px;
	color: white;
	cursor: pointer;

}
.active{
	/* background-color: #696bae; */
	background-color: #2d116e;
color:white;
}
p {
	margin-bottom: 0px;
}
/* .licl{
display:none;
} */

p.id{display:none;}
#plus{
 width: 1.8rem;
 height: 1.8rem;

 border-radius: 50%;
 /* display: flex; justify-content: flex-start; flex-direction: row-reverse; */
}
.color{
	color: white;
	margin: 0 0.3rem;
}
#modal,#modal1{
	display: none;
	background-color: rgba(0,0,0,0.3);
	width: 100%;
	height: 100%;
	position: fixed;
	left: 0;
	top: 0;
	z-index: 1;
	border-radius: 15px; 
}
.content{
	border-radius: 15px;
	background-color:rgba(0,0,0,0.9);   

	margin: 15% auto;
	width: 45%;
	border-radius: 10px;
   padding: 5%;
	text-align: center;
}
.contact{ border-radius: 10px;padding: 8px;width:350px;background-color: black;color:#888;
margin: 3%;  text-align: center;border: 1px solid rgb(8, 223, 126) ;border-radius: 15px;
}
#add{width: 150px;color:#888;
cursor: pointer;border-radius: 15px;outline: none;
}
#add:hover{border: 1px solid rgb(2, 71, 40) ;background-color: rgb(8, 223, 126);color: black;box-shadow:2px 4px  15px    rgb(148, 223, 145);}
.close{
	display: flex;
	justify-content: right;
	text-align: top;
	color: rgb(8, 223, 126);z-index: 2;background-color: #f1f1f1;border-radius: 50%;
}
    </style>

</head>

<body id="body">
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">

            <div class="col-md-4 col-xl-3 chat">
                <div class="card mb-sm-3 mb-md-0 contacts_card">
                    <div class="card-header">
                        <div class="input-group">
                            <div class="input-group-prepend" style="display: flex;align-items:center;justify-content:space-between;">
                                <span class="color ">فراوین</span>

                                <a href="#" id="plus"><i class="fas fa-plus color" onclick="plus()"></i></a>
                                <a href="#"><i class="fas fa-refresh color" id="refresh"></i></a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body contacts_body" id="bodyside">
                        <ul class="contacts" id="contact">

                        </ul>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-md-8 col-xl-6 chat">
                <div class="card">
                    <div class="card-header msg_head">
                        <div class="d-flex bd-highlight">
                            <!-- <div class="img_cont">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">
                                <span class="online_icon"></span>
                            </div> -->
                            <div class="user_info">
                                <span id="changeNam1"></span>
                                <!-- <p></p> -->
                            </div>
                            <!-- <div class="video_cam">
                                <span><i class="fas fa-video"></i></span>
                                <span><i class="fas fa-phone"></i></span>
                            </div> -->
                        </div>
                        <!-- <span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span> -->
                        <div class="action_menu">
                            <ul>
                                <li><i class="fas fa-user-circle"></i> View profile</li>
                                <li><i class="fas fa-users"></i> Add to add friends</li>
                                <li><i class="fas fa-plus"></i> Add to group</li>
                                <li><i class="fas fa-ban"></i> Block</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body msg_card_body">
                        <div class="d-flex justify-content-start mb-4">
                            <!-- <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                Hi, how are you samim?
                                <span class="msg_time">8:40 AM, Today</span>
                            </div> -->
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <!-- <div class="msg_cotainer_send">
                                Hi Khalid i am good tnx how about you?
                                <span class="msg_time_send">8:55 AM, Today</span>
                            </div>
                            <div class="img_cont_msg">
                                <img src="https://avatars.hsoubcdn.com/ed57f9e6329993084a436b89498b6088?s=256" class="rounded-circle user_img_msg"> 
                            </div> -->
                        </div>
                        <div class="d-flex justify-content-start mb-4">
                            <!-- <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                I am good too, thank you for your chat template
                                <span class="msg_time">9:00 AM, Today</span>
                            </div> -->
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <!-- <div class="msg_cotainer_send">
                                You are welcome
                                <span class="msg_time_send">9:05 AM, Today</span>
                            </div>
                            <div class="img_cont_msg"> -->
                                <!-- <img src="https://avatars.hsoubcdn.com/ed57f9e6329993084a436b89498b6088?s=256" class="rounded-circle user_img_msg"> -->
                            <!-- </div> -->
                        </div>
                        <div class="d-flex justify-content-start mb-4">
                            <!-- <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                I am looking for your next templates
                                <span class="msg_time">9:07 AM, Today</span>
                            </div> -->
                        </div>
                        <div class="d-flex justify-content-end mb-4">
                            <!-- <div class="msg_cotainer_send">
                                Ok, thank you have a good day
                                <span class="msg_time_send">9:10 AM, Today</span>
                            </div>
                            <div class="img_cont_msg">
                                <img src="https://avatars.hsoubcdn.com/ed57f9e6329993084a436b89498b6088?s=256" class="rounded-circle user_img_msg">
                            </div> -->
                        </div>
                        <div class="d-flex justify-content-start mb-4">
                            <!-- <div class="img_cont_msg">
                                <img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg">
                            </div>
                            <div class="msg_cotainer">
                                Bye, see you
                                <span class="msg_time">9:12 AM, Today</span>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span>
                            </div>

                            <textarea name="" class="form-control type_msg" placeholder="Type your message..."></textarea>
                            <div class="input-group-append">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div id="modal">
        <div class="content">
            <form onsubmit="return false">

                <button type="button" id="close" class="close fas fa-times " style="color:white;outline:none;"></button><br>
                <input type="text" placeholder="name" id="name2" class="contact"><br>
                <input type="text" placeholder=".......0915" id="phone2" class="contact" maxlength="11"><br>
                <button type="submit" id="add" class="contact">add contact</button><br>
                <span id="warning1" style="color: white;display:none;">bbbbbbbbbbb</span>
            </form>
        </div>
    </div>
    <div id="modal1">
        <div class="content">
            <form onsubmit="return false">
                <button type="button" id="close1" class="close fas fa-times " style="color:white;outline:none;" onclick="closeModal() "></button><br>
                <input type="text" placeholder="new name" id="newName" class="contact"><br>

                <button type="submit" id="changeName" class="contact">change name</button><br>
                <span id="warning2" style="display:none;color:white;"></span>
            </form>
        </div>
    </div>
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/demo.js"></script>
    <script>
        var modal = document.getElementById('modal');
        var plus = document.getElementById('plus');
        var add = document.getElementById('add');
        var close = document.getElementById('close');
        var refresh = document.getElementById('refresh');

        function Checkphone(phone) {
            var regex = new RegExp("^(\\+98|0)?9\\d{9}$");
            var result = regex.test(phone);
            return result;
        }
        jQuery(document).ready(function() {

            $.ajax({
                url: "<?= URL; ?>index/contact_data2",
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

        // add contact------------------------------------------------------------------------------
        function addContact(res) {
            $("#bodyside ").children().empty();
            for (let i = 0; i < res.length; i++) {

                addHtmlElement(res[i]['name'],res[i]['contactid']);

            }
        };
        //change name -----------------------------------------------------------------------------------------------------------------

        $("#changeName").click(function() {
            if ($("#newName").val() == "") {
                warning2.style.display = "block";
                $("#warning2").text("پر کردن تمامی فیلدها الزامیست");
            } else {
                var changename=$("#newName").val()

                $("li.active").children("p.name").text(changename);
                $("#changeNam1").text(changename);
               var changenametable= $("li.active").children("p.id").text();
          
                $.ajax({
                url: "<?= URL; ?>index/contact_data3",
                type: "POST",
                data: {
                    "changename":changename,
                    "changenametable":changenametable
                },
                success: function(response) {
                    if (response.msg == "ok") {
                           alert("change name in table was succesfully");
                }
                    
                },
                error: function(response) {
                    alert("خطای 500");
                }
            });

                document.getElementById("modal1").style.display = 'none';

            }
        });





       

        function addHtmlElement($name ,$changeid) {
            var item = '<p class="id">' + $changeid + '</p><p class="name">' + $name + '</p><button class="aclass" ><i class="fa fa-edit aclass" id="edit"  onclick=edit()></i> </button>';
            var li = $("<li ></li>").html(item);
            $("#bodyside ").children().append(li);
            $("li").addClass("liclass");

            $("li").children("p.id").addClass("licl");
            $("#contact li").click(function() {
                $(this).addClass("active").css({
                    opacity: 0.7
                }).siblings().removeClass("active");
                var Nam = $(this).children("p.name").text();
                $("#changeNam1").text(Nam );
            });
            document.getElementById('modal').style.display = 'none';
        };


        close.onclick = function closeModal() {
            modal.style.display = 'none';
        };


        document.getElementById('close1').onclick = function closeModal1() {


            document.getElementById('modal1').style.display = 'none';
        };










        function edit() {
            // $("#contact i").click(function(){
            //     $(this).addClass("active").css({opacity:0.7}).siblings().removeClass("active");});
            document.getElementById("newName").value = "";

            document.getElementById("warning2").style.display = "block";

            document.getElementById("modal1").style.display = 'block';

        };

        refresh.onclick = function() {

            $.ajax({
                url: "<?= URL; ?>index/contact_data2",
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
        };

        //وقتی مودال باز یا بسته میشود کل فیلدهای ان پاکسازی میشود
        plus.onclick = function() {
            document.getElementById("name2").value = "";
            document.getElementById("phone2").value = "";
            document.getElementById("warning1").style.display = "none";
            modal.style.display = 'block';
        };
        // با زدن دکمه ضربدر داخل مودال -مودال حذف میشود


        document.getElementById("name2").onfocus = function() {
            document.getElementById("name2").value = "";
            $("#warning1").text("");
        };
        document.getElementById("phone2").onfocus = function() {
            document.getElementById("phone2").value = "";
            $("#warning1").text("");
        };
        //برای نمایش فیزیکی نام و عکس مخاطبین به لیست مخاطبین ساید بار


        // به روز رسانی مخاطبین بصورت کلی(همگام سازی مخاطبین)

        // خواندن اطلاعات مودال
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
                    url: "<?= URL; ?>index/contact_data",
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
                            // $("#warning1").text("مشخصات مخاطب در جدول کانتکت اضافه شد");
                            // alert(response.arrayres);
                            alert(response.changeid);
                            addHtmlElement(response.arrayres ,response.changeid);
                            // addContact(response.resname);


                        }
                    },
                    error: function(response) {
                        alert("خطای 500");
                    }
                });
            }
        };
    </script>
</body>

</html>