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
        <div class="col-8" align="center">
            <div style="height: 100px"></div>
            <!--<p id="name">陳俊騰</p>
            <button onclick="GetName()">私訊</button>-->

            <?php
                for($i = $count; $i >= 0; $i--){
                    echo '<div class="border1">';
                    echo '<div style="height: 45px; width: 400px; text-align: left;">';
                    echo '<a href="/PostController/account/'.$seller_account[$i].'"><span class="type6" style="float: left; height: 30px; margin-top: 8px; margin-bottom: 5px;">'.$seller[$i].'</span></a">';
                    echo '<span class="type5" style="float: right; height: 30px; margin-top: 11px; margin-bottom: 5px;">';
                    if($post_time_type[$i] == 0){
                        echo $post_time[$i].' day ago';
                    }
                    else if($post_time_type[$i] == 1){
                        echo $post_time[$i].' seconds ago';
                    }
                    else if($post_time_type[$i] == 2){
                        echo $post_time[$i].' minutes ago';
                    }
                    else if($post_time_type[$i] == 3){
                        echo $post_time[$i].' hours ago';
                    }
                    echo '</span></div>';
                    echo '<a href="/PostController/item/'.$id[$i].'">';
                    echo '<div style="height: 90%; width: 400px; text-align: left;">';
                    $img = '';
                    for($j = 0; isset($image[$i][$j]); $j++){
                        if($image[$i][$j] == ':'){
                            if($image[$i][$j+1] == ' '){
                                continue;
                            }
                            else{
                                for($k = $j+1; isset($image[$i][$k]); $k++){
                                    if($image[$i][$k] != ' '){
                                        $img[$k-($j+1)] = $image[$i][$k];
                                    }
                                    else{
                                        break;
                                    }
                                }
                                break;
                            }
                        }
                    }
                    echo '<img class="img1" src="/item_images/'.$img.'"><br><br>';
                    echo '<p class="type2">【'.$way[$i].'】 '.$name[$i].'</p>';
                    echo '<span class="type3" style="float: left;">$'.$price[$i].'</span>';
                    echo '<span class="type4" style="float: right;">數量：'.$number[$i].'</span>';
                    echo '</div></a></div><br>';
                }
            ?>
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