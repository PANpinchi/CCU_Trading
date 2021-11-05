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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <style>
            .footer{
                position: fixed;
                bottom: 0px;
            }
            input{
                padding-left: 10px;
                width:80%;
                height:40px;
                border-radius: 5px;
                border: 1px solid;
            }
        </style>
        <title>中正大學買賣交流</title>
    </head>

    
    <body >
        <div class="col-2"></div>
        <div class="col-8" align="center" style="background-color: rgb(250, 250, 250)">
            <div style="height: 80px;"></div>
            <div align="center">
                <!--訊息-->
                <?php 
                    for($i = 0; isset($from[$i]); $i++){
                        if($from[$i] == $_SESSION['name']){
                            echo '<p>'.$content[$i].'</p>';
                        }
                        else{
                            echo '<p>_________'.$content[$i].'</p>';
                        }
                    }
                ?>
            </div>
            <div class="footer" style="width:66.6%;">
                <!--輸入-->
                <form name = "messages" action="/ChatController/message" method="POST">
                    <input name = "message" id = "message" type="text" placeholder="輸入文字" autocomplete="off"></input>
                    <button class="btn btn-primary" type="submit" style="height:40px;">發送</button>
                    <br><br>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<?= $this->endSection() ?>