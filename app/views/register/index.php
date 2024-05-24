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
        <h1>ثبت نام</h1>
        <input type="text" id="username" placeholder="نام کاربری">
        <input type="password" id="password" placeholder="رمز ورود">
        <input type="password" id="rpassword" placeholder="تکرار رمز عبور">
        <span>
            <input type="checkbox"> من را به خاطر بسپار
        </span>
        <span id="showerror">پسورد باید حداقل 8 کاراکتر شامل حروف کوچک و بزرگ داشته باشد</span>
        <button type="submit" id="btn">ثبت نام</button>

    </form>

    <script src="public/js/jquery-3.4.1.min.js"></script>
    <script>
        function CheckPassword(inputtxt) {
            var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

            if (inputtxt.value.match(passw)) {
                return true;
            } else {
                return false;
            }
        }
        $("#btn").on('click', function() {
            var username = document.getElementById("username").value;

            var password = document.getElementById("password").value;

            var rpassword = document.getElementById("rpassword").value;

            if (username == "" || password == "" || rpassword == "") {

                document.getElementById("showerror").style.display = "block";
                $("#showerror").text("پر کردن تمام فیلدها الزامی است");
            } else if (password !== rpassword) {
                document.getElementById("showerror").style.display = "block";
                $("#showerror").text("تکرار پسورد اشتباه است");
                document.getElementById("rpassword").value = "";
            } else if ((password.length) < 2) {
                document.getElementById("showerror").style.display = "block";
                $("#showerror").text("پسورد باید حداقل 8 کاراکتر داشته باشد");
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
                            // document.getElementById("showerror").value="شما قبلا ثبت نام کرده اید";
                            // $("#showerror").text("شما قبلا ثبت نام کرده اید");
                             alert("شما قبلا ثبت نام کرده اید");
                            window.location = "<?= URL?>app/views/login/index.php";
                        } else {
                            // $("#showerror").text="ثبت نام با موفقیت انجام شد";
                            alert("ثبت نام با موفقیت انجام شد");
                            window.location ="<?=URL?>app/views/login/index.php";
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