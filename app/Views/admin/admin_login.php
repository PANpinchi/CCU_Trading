<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/style/login.css">
        
        <title>中正大學買賣交流</title>
    </head>

    <body>
        <div class="row" style="user-select: none;">
            <div class="col-4"></div>
            <div class="col-4" align="center">
                <br><br><br>
                <p class="type0">中 正 大 學 買 賣 交 流</p>
                <br><br>
                <form name = "accounts" action = "/AdminController/compare_admin_account" method="POST" style="border: 1px rgb(230, 215, 210) solid">
                    <br>
                    <p class="type1">管理員登入</p>
                    <input id = "account" name = "account" type = "email" class="type2" style="height:35px; width:250px" placeholder = "帳號/電子郵件" required><br><br>
                    <input id = "password" name = "password" type = "password" class="type2" style="height:35px; width:250px" placeholder = "密碼" required><br><br>
                    <button class="btn btn-primary" style="font-weight: bold;"> 登入 </button><br><br>
                </form>
            </div>
            <div class="col-4" style="position: absolute; bottom: 10px; right: 0px; text-align: right;">
                    <a href="/LoginController/login" type="button" class="btn btn-secondary" style="font-weight: bold; opacity: .5;">一般登入</a>
            </div>
        </div>
    <body>
</html>