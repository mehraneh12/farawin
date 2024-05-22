<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <base href="<?= URL; ?>">

    <link rel="stylesheet" href="public/css/style.css">

</head>

<body>
    <form class="login" onsubmit="return false;">
        <h1>فرم ثبت نام</h1>
        <input type="text" id="username" placeholder="نام کاربری">
        <input type="password" id="password" placeholder="رمز ورود">
        <input type="password" id="rpassword" placeholder="تکرار رمز عبور">
        <span>
            <input type="checkbox"> من را به خاطر بسپار
        </span>
        <span id="showerror"  ></span>
        <button type="submit" id="btn">ثبت نام</button>

    </form>

    <script src="public/js/jquery-3.4.1.min.js"></script>
    <script>
        function CheckPassword(inputtxt)
    {
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        if(inputtxt.match(passw))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
        $("#btn").on('click', function() {
            var username = document.getElementById("username").value;

            var password = document.getElementById("password").value;
            var rpassword = document.getElementById("rpassword").value;

            if (username == "" || password == "" || rpassword == "") {
                

                $("#showerror").text("پر کردن تمام فیلدها الزامی است");
            }else if( password !== rpassword ){ 
             
                $("#showerror").text("فیلد پسورد اشتباه پر شده است");
               
            
            }else if((password.length)<8 ){
                $("#showerror").text("پسورد باید حداقل 8 کاراکتر داشته باشد");
            }else if(CheckPassword(password)==false ){
                $("#showerror").text("پسورد باید شامل حروف و اعداد و * باشد");
            }else alert("شروع ajax ");
        });
    </script>
</body>

</html>