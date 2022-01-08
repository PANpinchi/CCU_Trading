<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/style/login.css">
        
        <title>中正大學買賣交流</title>
    </head>

    <body>
        <div class="row" style="user-select: none;">
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4"></div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" align="center">
                <br><br><br>
                <p class="type0">中 正 大 學 買 賣 交 流</p>
                <br><br>
                <form name = "accounts" action = "/LoginController/compare_account" method="POST" style="border: 1px rgb(230, 215, 210) solid">
                    <br>
                    <p class="type1">登入</p>
                    <input id = "account" name = "account" type = "email" class="type2" style="height:35px; width:250px" placeholder = "帳號/電子郵件" required><br><br>
                    <input id = "password" name = "password" type = "password" class="type2" style="height:35px; width:250px" placeholder = "密碼" required><br><br>
                    <a class="btn btn-primary" role="button" href="/LoginController/signup" style="font-weight: bold; margin-right: 30px"> 註冊 </a>
                    <button class="btn btn-primary" style="font-weight: bold;"> 登入 </button><br><br>
                    <a href="/LoginController/forget" type="button">忘記密碼 ？</a><br><br>
                    <p class="type4">※ 請使用學校電子郵件登入</p>
                </form>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4 col-lg-4" style="position: absolute; bottom: 10px; right: 0px; text-align: right;">
                    <a href="/AdminController/admin_login" type="button" class="btn btn-secondary" style="font-weight: bold; opacity: .5;">管理員登入</a>
            </div>
        </div>
    <body>
</html>