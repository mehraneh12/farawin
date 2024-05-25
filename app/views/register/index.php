hello register
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <base href="<?= URL; ?>">

    <link rel="stylesheet" href="public/css/style2.css">

</head>

<body>
    <form class="login" onsubmit="return false;">
        <h1>register</h1>
        <label for="username">phone</label>
        <input type="text" id="username" placeholder="+98..........." maxlength="13"   required>
        <input type="password" id="password" placeholder="password"  required>
        <input type="password" id="rpassword" placeholder="config-password"  required>
        <div>
            <a href="login">login</a>
            <button type="submit" id="btn">register</button>
            
        </div>

        <!-- <span>
            <input type="checkbox"> من را به خاطر بسپار
        </span> -->
        <span id="showerror" style="display: none;">پسورد باید حداقل 8 کاراکتر شامل حروف کوچک و بزرگ داشته باشد</span>


    </form>

    <script src="public/js/jquery-3.4.1.min.js"></script>
    <script>
        function CheckPassword(inputtxt) {
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
             alert(inputtxt.match(passw));
            if (inputtxt.match(passw)) {
                return true;
            } else {
                return false;
            }
        }
     function Checkphone(number){
            var regex =new RegExp("^(\\+98|0)?9\\d{9}$");
            var result=regex.test(number);
             return result;
            }
        

        $("#btn").on('keypress', function(e) {
            if (e.which == 13) {
                $('form#btn').submit();
                return false;
            }
        });
        $("#btn").on('click', function() {
            var username = document.getElementById("username").value;

            var password = document.getElementById("password").value;

            var rpassword = document.getElementById("rpassword").value;
var x=Checkphone(username);
alert(x);
           if(x==false){
            document.getElementById("showerror").style.display = "block";
                $("#showerror").text(" فرمت موبایل رعایت نشده است" )
           }else if (username == "" || password == "" || rpassword == "") {

                document.getElementById("showerror").style.display = "block";
                $("#showerror").text("پر کردن تمام فیلدها الزامی است");
            } else if (password !== rpassword) {
                document.getElementById("showerror").style.display = "block";
                $("#showerror").text("تکرار پسورد اشتباه است");
                document.getElementById("rpassword").value = "";
            } else if (CheckPassword(password)==false){
                document.getElementById("showerror").style.display = "block";
                $("#showerror").text(" پسورد باید بین 6 تا 20 کاراکتر و شامل حروف کوچک و بزرگ انگلیسی , اعداد باشد");
                document.getElementById("password").value = "";
                document.getElementById("rpassword").value = "";
            } else {
                $.ajax({
                    url: "<?= URL; ?>register/insert_data",
                    type: "POST",
                    data: {
                        "username": username,
                        "password": password,
                        "rpassword": rpassword
                    },
                    success: function(response) {
                        response = JSON.parse(response);
                        if (response.status_code == "404") {

                            // alert("شما قبلا ثبت نام کرده اید");
                            window.location = "<?= URL; ?>login";
                        } else {

                            // alert("ثبت نام با موفقیت انجام شد");
                            window.location = "<?= URL; ?>login";
                        }
                    },
                    error: function(response) {
                        alert("خطای 500");
                    }
                });
            }
        });
    </script>
</body>

</html>