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
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4" align="center">
                <br><br><br>
                <p class="type0">中 正 大 學 買 賣 交 流</p>
                <br><br><br><br>
                <form name = "accounts" action = "/LoginController/compare_verification_code" method="POST" style="border: 1px rgb(230, 215, 210) solid">
                    <br>
                    <p class="type1">驗證電子郵件</p>
                    <input id = "verification_code" name = "verification_code" type = "text" class="type2" style="height:35px; width:250px; text-align: center;" placeholder = "請輸入驗證碼" autocomplete="off" required><br><br>
                    <button class="btn btn-primary" style="font-weight: bold;"> 確認 </button><br><br>
                    <p class="type4">※ 請至學校電子郵件查看驗證碼</p>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    <body>
</html>