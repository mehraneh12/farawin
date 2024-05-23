
   
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
           <h1>فرم لاگین</h1>
           <input type="text" id="username" placeholder="نام کاربری">
           <input type="password" id="password" placeholder="رمز ورود">
           <input type="password" id="rpassword" placeholder="تکرار رمز عبور">
           <span>
               <input type="checkbox"> من را به خاطر بسپار
           </span>
           <span id="showerror">پسورد باید حداقل 8 کاراکتر شامل حروف کوچک و بزرگ داشته باشد</span>
           <button type="submit" id="btn">ثبت نام</button>
   
       </form>
   
