<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?=URL;?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <style>
    *{
        border:1px solid gray;
        box-sizing: border-box;border-radius: 15px;
    }
    body{
        margin: 0;
        padding: 0;
        border: 0;
    }
    .container{
        display: flex;
        width: 100%;
        height: 100vh;
        justify-content: start;
        flex-direction: row; border: 0;
        
    }
    .side{  border-radius: 15px;
        display: flex;
        width: 30%;
        height: 100vh;
        justify-content:space-between;
        flex-direction: column;
        margin: 10px;
        
    }
    .chat{margin: 10px;border-radius: 15px;
        display: flex;
        width: 70%;
        height: 100vh;
        justify-content: start;
        flex-direction: column;
    }
    .side.header{
        display: flex;
        width: 100%;
        height: 10vh;
        justify-content:start;
        flex-direction: row;
    }
   .side.body{
    
        width: 100%;
        height: 90vh;
       border: 2px solid red;
        
   }
    </style>
</head>

<body>
    <div class="container">
         <div class="col-md-8 chat">
            <div class="header">
                <i class="fas fa-search"></i>
                <i class="fas fa-add"></i>
            </div>
            <div class="body">chat</div>
            <div class="footer"><i class="fas fa-search"></i></div>
        </div>
        <div class="col-md-4 side">
            <div class="header">
                <span>farawin</span><a>x</a><a>x</a>
                <!-- <i class="fas fa-search"></i>
                <i class="fas fa-add">&items;</i> -->
            </div>
            <div class="body">salam</div>
            <div class="footer">

            </div>
        </div>
       
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/demo.js"></script>
</body>

</html>