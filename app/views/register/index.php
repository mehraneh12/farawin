<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <base href="<?=URL?>">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <form action="register/insert_data" method="POST">
        <h1>فرم ثبت نام</h1>
        <input type="text" id="username" placeholder="نام کاربری">
        <input type="password" id="password" placeholder="رمز ورود">
        <input type="password" id="rpassword" placeholder="تکرار رمز عبور">
        <span>
            <input type="checkbox" >
            <lable for="rememberme">مرا به خاطر بسپار </lable>
        </span>
        <span id="showerror"></span>
        <button type="submit" id="btn">ثبت نام</button>

    </form>
</body>
</html>