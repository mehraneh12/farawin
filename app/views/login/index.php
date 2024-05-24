hi login page
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
        <h1>ورود</h1>
        <input type="text" id="username" name="username" placeholder="نام کاربری">
        <input type="password" id="password" name="password"  placeholder="رمز ورود">
        
        <span>
            <input type="checkbox"> من را به خاطر بسپار
        </span>
        <span id="showerror"></span>
        <button type="submit" id="btn">ورود</button>

    </form>


<script src="public/js/jquery-3.4.1.min.js"></script>

<script>
    function CheckPassword(inputtxt)
    {
        var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        if(inputtxt.value.match(passw))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    $("#btn").on('click',function (){
          var username = document.getElementById("username").value;
          var password = document.getElementById("password").value;

          if(username == ""){
              $("#showError").text("Username is empty");
          } else if (password == ""){
              $("#showError").text("Password is empty");
          } else if (!CheckPassword(password)){
              $("#showError").text("Password is not secure");
          } else {
              $.ajax({
                  url: "<?= URL; ?>login/check_data",
                  type: "POST",
                  data: {
                      "username": username,
                      "password": password
                  },
                  success: function (response){
                      response = JSON.parse(response);
                      if(response.status_code == "404"){
                          $("#showError").text("Username or Password is wrong");
                      } else {
                          window.location = "<?= URL; ?>";
                      }
                  },
                  error: function (response) {
                      alert("dsgdgfdgdfgd");
                  }
              });
          }
        }
    );
</script>

</body>
</html>