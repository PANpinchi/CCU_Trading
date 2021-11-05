<?= $this->extend('templates\post_default') ?>
<?= $this->section('content') ?>

<?php session_start();?>

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

        <title>中正大學買賣交流</title>
    </head>

    
    <body>
        <div class="col-2"></div>
        <div class="col-8" align="center">
            <div style="height: 80px"></div>
            <p id="name">陳俊騰</p>
            <button onclick="GetName()">私訊</button>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<script>
    function GetName() {
        var name = document.getElementById("name").innerText;
        window.location.href="/ChatController/chat?value="+name; 
    }
</script>

<?= $this->endSection() ?>