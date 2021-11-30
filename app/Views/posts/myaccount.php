<?= $this->extend('templates\post_default') ?>
<?= $this->section('content') ?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/style/post.css">

        <title>中正大學買賣交流</title>
    </head>
    
    <body>
        <div class="col-2"></div>
        <div class="col-8">
            <div style="height: 100px"></div>
            <p class="type0">個人資料</p>
            <hr>
            <p class="type2">姓名&nbsp:&nbsp<?php echo $name; ?></p>
            <p class="type2">暱稱&nbsp:&nbsp<?php echo $name2; ?></p>
            <p class="type2">系所&nbsp:&nbsp<?php echo $department; ?></p>
            <p class="type2">使用者帳號&nbsp:&nbsp<?php echo $account; ?></p>
            <p class="type2">手機號碼&nbsp:&nbsp<?php echo $phone; ?></p>
            <p class="type2">密碼&nbsp:&nbsp<?php echo $password; ?></p>
            <p class="type2">性別&nbsp:&nbsp<?php echo $sex; ?></p>
            <p class="type2">生日&nbsp:&nbsp<?php echo $birthday; ?></p>
            <div align="center">
                <a href="#" type="button" class="btn btn-secondary" style="font-weight: bold;"> 修改個人資料 </a>
                &nbsp&nbsp&nbsp&nbsp&nbsp
                <a href="/LoginController/logout" type="button" class="btn btn-primary" style="font-weight: bold;"> 登出 </a>
            </div>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<?= $this->endSection() ?>