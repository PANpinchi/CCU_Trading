<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/style/login.css">
        <style>
        body {
            background-image: url("/img/login_img.jpg")
        }

        form{
            width: 400px;
            height: auto;
            border: auto;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 10px 10px 10px 10px;
            margin: auto;
        }

        a{
            text-decoration:none;
        }

        .type0{
            font-weight: bold;
            font-size: 50px;
            color : rgb(255, 255, 255);
        }

        .type1{
            font-weight: bold;
            font-size: 30px;
            color : rgb(50, 50, 50);
        }

        .type2{
            font-weight: bold;
            font-size: 1em;
            color : rgb(50, 50, 50);
        }

        .type3{
            font-weight: bold;
            font-size: 1em;
            color : rgb(25, 25, 200);
        }

        .type4{
            font-weight: bold;
            font-size: 1em;
            color : red;
        }

        </style>
        <title>中正大學買賣交流</title>
    </head>

    <body>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4" align="center">
                <br><br><br>
                <p class="type0">中 正 大 學 買 賣 交 流</p>
                <br><br><br><br>
                <form name = "accounts" action = "/LoginController/check_password" method="POST" style="border: 1px rgb(230, 215, 210) solid">
                    <br>
                    <p class="type1">確認臨時密碼</p>
                    <input id = "verify" name = "verify" type = "text" class="type2" style="height:35px; width:250px" placeholder = "請輸入臨時密碼" required><br><br>
                    <a class="btn btn-primary" role="button" href="/LoginController/login" style="font-weight: bold; margin-right: 30px"> 返回 </a>
                    <button class="btn btn-primary" style="font-weight: bold;"> 確認 </button><br><br>
                    <p class="type4">※ 請至學校電子信箱取得臨時密碼</p>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    <body>
</html>