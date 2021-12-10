<?= $this->extend('templates\admin_default') ?>
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
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" href="/style/chat.css">

        <title>中正大學買賣交流</title>
    </head>

    <body>
        <div class="col-2"></div>
        <div id="my" class="col-8" align="center" style="background-color: rgb(250, 250, 250); user-select: none;">
            <div style="height: 100px;"></div>
            <p class="type1">搜尋聊天紀錄</p>
            <form class="d-flex" action = "/AdminController/search_message" method="POST">
                <?php
                if(isset($search_from_name)){
                    echo '<input name="from" class="form-control me-2 type4" type="search" placeholder="From (學生姓名)" value="'.$search_from_name.'" aria-label="Search" style="height: 40px; width: 45%;">';
                }
                else{
                    echo '<input name="from" class="form-control me-2 type4" type="search" placeholder="From (學生姓名)" aria-label="Search" style="height: 40px; width: 45%;">';
                }
                if(isset($search_to_name)){
                    echo '<input name="to" class="form-control me-2 type4" type="search" placeholder="To (學生姓名)" value="'.$search_to_name.'" aria-label="Search" style="height: 40px; width: 45%;">';
                }
                else{
                    echo '<input name="to" class="form-control me-2 type4" type="search" placeholder="To (學生姓名)" aria-label="Search" style="height: 40px; width: 45%;">';
                }
                ?>
                <button class="btn btn-primary" type="submit" style="height: 40px; width: 8%;">搜尋</button>
            </form>
            <div style="height: 40px"></div>
            <div id="results">
                <!--訊息-->
                <?php 
                    $year = NULL;
                    $month = NULL;
                    $day = NULL;

                    for($i = 1; isset($from[$i]); $i++){
                        /* 計算時間 */
                        $hours = $time[$i][11] * 10 + $time[$i][12];
                        $minutes = $time[$i][14] * 10 + $time[$i][15];
                        $afternoon = 0;
                        if($hours >= 12){
                            $afternoon = 1;
                            if($hours > 12){
                                $hours -= 12;
                            }
                        }
                        else if($hours == 0){
                            $hours = 12;
                        }
                        if($minutes < 10){
                            $minutes = '0'.$minutes;
                        }

                        /* 計算日期 */
                        $temp_year = $time[$i][0] * 1000 + $time[$i][1] * 100 + $time[$i][2] * 10 + $time[$i][3];
                        $temp_month = $time[$i][5] * 10 + $time[$i][6];
                        $temp_day = $time[$i][8] * 10 + $time[$i][9];

                        if($temp_year != $year || $temp_month != $month || $temp_day != $day){
                            $year = $temp_year;
                            $month = $temp_month;
                            $day = $temp_day;
                            echo '<p class="type0" style="user-select: none;">━━━ '.$year.' 年 '.$month.' 月 '.$day.' 日 ━━━</p>';
                        }

                        if($from[$i] != $search_from_account){
                            echo '
                            <div align="right" style="margin-right: 5%;">
                                <span class="type2" style="user-select: none;">';
                                    if($afternoon == 0){
                                        echo '上午 '.$hours.':'.$minutes;
                                    }
                                    else{
                                        echo '下午 '.$hours.':'.$minutes;
                                    }
                            echo '
                                </span>
                                <div class="speech-bubble-right" style="width: fit-content; max-width: 50%; min-width: 5%; text-align: center;">
                                    <p class="type1">
                                        &nbsp&nbsp'.$content[$i].'&nbsp&nbsp
                                    </p>
                                </div>
                            </div>';
                        }
                        else{
                            echo '
                            <div align="left" style="margin-left: 5%">
                                <span class="type2" style="user-select: none;">';
                                    if($afternoon == 0){
                                        echo '上午 '.$hours.':'.$minutes;
                                    }
                                    else{
                                        echo '下午 '.$hours.':'.$minutes;
                                    }
                            echo '
                                </span>
                                <div class="speech-bubble-left" style="width: fit-content;">
                                    <p class="type1">
                                        &nbsp&nbsp'.$content[$i].'&nbsp&nbsp
                                    </p>
                                </div>
                            </div>';
                        }
                    }

                    if($i == 1){
                        echo '
                        <div style="text-align: center;">
                        <p class="type1" style="color: rgb(150, 150, 150)"> 查無聊天紀錄 </p><br>
                        </div>';
                    }
                ?>
            </div>
            <div id="tail" style="height: 100px;"></div>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<script>
    $(window).on('scroll', function() {
        const w_h = $(window).scrollTop();
        $('#chat_people').css({'top': w_h+90});
    });

    $(document).ready(function(){
        var height = $(window).height();
        $('#chat_people2').css({'height': height - 200});

        $(window).resize(function() {
            var height = $(window).height();
            $('#chat_people2').css({'height': height - 200});
        });
    });
    
    function SubmitFormData() {
        var message = $("#message").val();
        $.post("/AdminController/message", {message: message},
        function(data) {
        $('#messages')[0].reset();
        });
    }

    document.documentElement.scrollTo({
        top: $(document.documentElement)[0].scrollHeight,
        behavior: 'instant'
    });
</script>

<?= $this->endSection() ?>