<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= URL; ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    
    <link rel="stylesheet" href="public/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            border: 0;

            box-sizing: border-box;
            border-radius: 15px;
        }

        body {
            margin: 0;
            padding: 0;
            border: 0;
        }

        .container {
            direction: rtl;
            display: flex;
            width: 100%;
            height: 100vh;
            justify-content: start;
            flex-direction: row;
            border: 0;

        }

        .side {
            border-radius: 15px;
            display: flex;
            width: 30%;
            height: 97vh;
            justify-content: start;
            flex-direction: column;
            margin: 10px;
            border: 1px solid black;

        }

        .chat {
            margin: 10px;
            border-radius: 15px;
            display: flex;
            width: 70%;
            height: 97vh;
            justify-content: start;
            flex-direction: column;
            border: 1px solid black;
        }

        .chat .header,
        .chat .footer {
            display: flex;
            justify-content: start;
            flex-direction: row;
            height: 7%;
            margin: 5px;
            border: 1px solid black;
        }

        .chat .body {
            height: 87%;
            border: none;
        }

        .side .header,
        .side .footer {
            display: flex;
            width: 97%;
            height: 7%;
            margin: 5px;
            border: 1px solid black;
            justify-content: start;
            flex-direction: row;
        }

        .side .body {
            height: 87%;
            border: none;
            width: 100%;

            margin: 5px;
            justify-content: start;
        }

        .side .body,
        .side .header,
        .side .footer,
        .chat .body,
        .chat .header,
        .chat .footer {
            padding: 5px;
            align-items: center;
          
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="col-md-4 side"style="padding:0px !important;">
            <div class="header" style="direction: rtl;">
                <span style="margin-left: auto;padding:5px;border:none">فراوین</span>
                <a><i class="fa fa-plus" style="color:gray;font-size:25px;margin-left:5px;"></i></a>
                <a><i class="fa fa-refresh" style="color:gray;font-size:23px;margin:0 5px;"></i></a>
                <!-- <a style=" margin-right:5px;padding:5px;border-radius: 50%;border:1px solid black"><i class="fa fa-add"></i></a> -->

            </div>
            <div class="body" style="padding:0px;margin:0px;border-radius:0px;  overflow: scroll;">
               
                <div style="align-items: center !important;padding:5px;border-radius:0px;margin:0px;right:0;width:100%;"> 
                    <img src="public/images/1074675991715247274-128.png" alt="" style="width:30px;height:30px;">
                    <span style="margin-left: auto;padding:5px;border:none">احمد کریمی</span>
                </div>
            </div>

        </div>
        <div class="col-md-8 chat">
            <div class="header">
                <img src="public/images/1074675991715247274-128.png" alt="" style="width:30px;height:30px;">
                <span style="margin-left: auto;padding:5px;border:none">احمد کریمی</span>
                <a><i class="fa fa-edit" style="color:gray;font-size:25px;margin:0 5px;;"></i></a>
                <a><i class="fa fa-refresh" style="color:gray;font-size:23px;margin:0 6px;"></i></a>
            </div>
            <div class="body"style="  overflow: scroll;">
                <div style="display:flex;align-items: center !important;padding:5px;flex-direction:column;border:1px solid gray;width:20%;margin-bottom:5px;"> 
                    <!-- <img src="public/images/1074675991715247274-128.png" alt="" style="width:30px;height:30px;"> -->
                    <span style="margin-left: auto;padding:5px;">سلام خوبی؟</span>
                    <span style="margin-left: auto;padding:5px;font-size:10px;">2 فروردین  11:29</span>
                </div>
                <div style="display:flex;align-items: center !important;padding:5px;flex-direction:column;border:1px solid gray;width:20%;margin-bottom:5px;"> 
                    <!-- <img src="public/images/1074675991715247274-128.png" alt="" style="width:30px;height:30px;"> -->
                    <span style="margin-left: auto;padding:5px;">پروزه رو تا کجا رسوندی؟</span>
                    <span style="margin-left: auto;padding:5px;font-size:10px;">2 فروردین  11:30</span>
                </div>
                <div style="display:flex;align-items: center !important;padding:5px;float:left;flex-direction:column;border:1px solid gray;width:20%;"> 
                    <!-- <img src="public/images/1074675991715247274-128.png" alt="" style="width:30px;height:30px;"> -->
                    <span style="margin-left: auto;padding:5px;"><prev>
                        سلام.ممنون.

خوب پیش میرم و اخراشه..
                    </prev></span>
                    <span style="margin-left: auto;padding:5px;font-size:10px;">2 فروردین 12:10</span>
                </div>
            </div>
            <div class="footer">
                <span style="margin-left: auto;padding:5px;border:none;margin-left:auto;">پیام ...</span>
                <a><i class="fa fa-send" style="color:gray;font-size:28px;margin:0 5px;font-size:22px;"></i></a>

            </div>
        </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="public/js/demo.js"></script>
</body>

</html>