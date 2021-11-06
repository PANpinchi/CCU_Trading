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
        <script>
            window.onload = function(){
                var scrollTop = window.pageYOffset|| document.documentElement.scrollTop || document.body.scrollTop;
                window.pageYOffset = 999999999999999999999999999999;
                document.documentElement.scrollTop = 999999999999999999999999999999;
                document.body.scrollTop = 999999999999999999999999999999;
            };
        </script>
        <style>
            .footer{
                position: fixed;
                bottom: 0px;
            }

            .type1{
                font: bold 20px sans-serif;
                padding-top: 5px;
                padding-bottom: 5px;
            }

            .speech-bubble-left {
                position: relative;
                background: #3db5ff;
                border-radius: 1em;
            }

            .speech-bubble-left:after {
                content: '';
                position: absolute;
                left: 10px;
                top: 60%;
                width: 0;
                height: 0;
                border: 20px solid transparent;
                border-right-color: #3db5ff;
                border-left: 0;
                border-bottom: 0;
                margin-top: -10px;
                margin-left: -20px;
            }

            .speech-bubble-right {
                position: relative;
                z-index:8;
                background: #3db5ff;
                border-radius: 1em;
            }

            .speech-bubble-right:after {
                content: '';
                position: absolute;
                z-index:-1;
                right: 10px;
                top: 60%;
                width: 0;
                height: 0;
                border: 20px solid transparent;
                border-left-color: #3db5ff;
                border-right: 0;
                border-bottom: 0;
                margin-top: -10px;
                margin-right: -20px;
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

    
    <body>
        <div class="col-2"></div>
        <div id="my" class="col-8" align="center" style="background-color: rgb(250, 250, 250);">
            <div style="height: 100px;"></div>
            <div>
                <!--訊息-->
                <?php 
                    for($i = 1; isset($from[$i]); $i++){
                        if($from[$i] == $_SESSION['name']){
                            echo '
                            <div align="right" style="margin-right: 5%">
                                <div class="speech-bubble-right" style="width: fit-content;">
                                    <p class="type1">
                                        &nbsp&nbsp'.$content[$i].'&nbsp&nbsp
                                    </p>
                                </div>
                            </div>';
                        }
                        else{
                            echo '
                            <div align="left" style="margin-left: 5%">
                                <div class="speech-bubble-left" style="width: fit-content;">
                                    <p class="type1">
                                        &nbsp&nbsp'.$content[$i].'&nbsp&nbsp
                                    </p>
                                </div>
                            </div>';
                        }
                    }
                ?>
            </div>
            <div style="height: 100px;"></div>

            <div class="footer" style="width:66%; background-color: rgb(250, 250, 250); z-index:9;">
                <div style="height: 20px;"></div>
                <!--輸入-->
                <form name = "messages" action="/ChatController/message" method="POST">
                    <input name = "message" id = "message" type="text" placeholder="輸入文字" autocomplete="off"></input>
                    <button class="btn btn-primary" type="submit" style="height:40px;">發送</button>
                </form>
                <div style="height: 20px;"></div>
            </div>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<?= $this->endSection() ?>