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
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="/style/post.css">

        <title>中正大學買賣交流</title>
    </head>
    
    <body>
        <div class="col-2"></div>
        <div class="col-8">
            <div style="height: 100px"></div>
            <?php
                echo '<div style="text-align: center; background-color: rgb(255, 255, 255);">';
                echo '<div style="height: 20px;"></div>';
                echo '
                <table width="100%" style="table-layout:fixed; text-align: left; user-select: none;">
                <tr>
                <td id="head_name" colspan="10" style="text-align: center;">';
                if(isset($header)){
                    echo '
                    <a href="/PostController/account/'.$post['seller_account'].'" style="height: 53px; width: 198px;">
                        <img class="user2" src="/header/'.$header.'" style="margin-bottom: 10px">
                        <span id="name_len" class="type2"> '.$post['seller'].'</span>
                    </a>
                    <div style="height: 10px"></div>
                    </td>
                    <td colspan="10"></td>
                    </tr>
                    <tr>';
                }
                else{
                    echo '
                    <a href="/PostController/account/'.$post['seller_account'].'">
                        <img class="user2" src="/header/user.jpg" style="margin-bottom: 10px">
                        <span id="name_len" class="type2"> '.$post['seller'].'</span>
                    </a>
                    <div style="height: 10px"></div>
                    </td>
                    </tr>
                    <tr>';
                }
                $img[0] = '';
                $img[1] = '';
                $img[2] = '';
                $t = 0;
                $count = 0;
                for($j = 0; isset($post['image'][$j]); $j++){
                    if($post['image'][$j] == ':'){
                        if($post['image'][$j+1] == ' '){
                            continue;
                        }
                        else{
                            for($k = $j+1; isset($post['image'][$k]); $k++){
                                if($post['image'][$k] != ' '){
                                    $img[$t][$k-($j+1)] = $post['image'][$k];
                                }
                                else{
                                    $t++;
                                    $count++;
                                    break;
                                }
                            }

                            if(!isset($post['image'][$k])){
                                $count++;
                            }
                        }
                    }
                }
                echo '<td colspan="10" style="text-align: center; vertical-align:text-top;">
                    <img id="img03" name="img03" class="img1" src="/item_images/'.$img[0].'"><br><br>
                ';
                for($i = 0; $i < $count; $i++){
                    echo '<img id="img0'.$i.'" name="img0'.$i.'" class="img3" src="/item_images/'.$img[$i].'" style="margin-left: 10px; margin-right: 10px;">';
                }
                echo '</td>';
                echo '<td colspan="10">
                        <p class="type2">【'.$post['way'].'】 '.$post['name'].'</p>';
                if($post['number'] == 0){
                    if($post['way'] == '徵'){
                        echo '<span class="type3">&nbsp已徵到&nbsp</span>';
                    }
                    else{
                        echo '<span class="type3">&nbsp已售出&nbsp</span>';
                    }
                }
                else{
                    echo '<span class="type3">&nbsp$'.$post['price'].'&nbsp</span>';
                }
                echo '<span class="type4">&nbsp&nbsp|&nbsp&nbsp數量：'.$post['number'].'</span><br><br>';
                echo '<p class="type6" style="max-width: 95px; background-color: yellow;">&nbsp商品詳情&nbsp</p>';
                echo '<p class="type6">【上架時間】 ';
                if($post_time_type == 0){
                    echo $post['post_time'].' days ago';
                }
                else if($post_time_type == 1){
                    echo $post['post_time'].' seconds ago';
                }
                else if($post_time_type == 2){
                    echo $post['post_time'].' minutes ago';
                }
                else if($post_time_type == 3){
                    echo $post['post_time'].' hours ago';
                }
                echo '</p>';
                echo '<p class="type6">【商品類別】 '.$post['type'].'</p>';
                echo '<p class="type6">【時間】 '.$post['time'].'</p>';
                echo '<p class="type6">【地點】 '.$post['place'].'</p>';
                echo '<p class="type6">【商品描述】</p>';
                echo '<p class="type6">'.$post['item_describe'].'</p>';
                echo '</td></tr>';
                echo '</table>';
                
            if($post['seller'] != $_SESSION['name2']){
                if($post['number'] == 0){
                    echo '
                    <br>
                    <button class="btn btn-primary" style="font-weight: bold;" onclick="javascript:history.back();">返回</button>
                    <span style="user-select: none;">&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                    <a href="/ChatController/chat?value='.$post['seller_account'].'" type="button" class="btn btn-success" style="font-weight: bold;"> 私訊賣家 </a>
                    <br><br>
                    ';
                }
                else{
                    echo '
                    <br>
                    <button class="btn btn-primary" style="font-weight: bold;" onclick="javascript:history.back();">返回</button>
                    <span style="user-select: none;">&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                    <a href="/ChatController/chat?value='.$post['seller_account'].'" type="button" class="btn btn-success" style="font-weight: bold;"> 💲 我想排看 </a>
                    <br><br>
                    ';
                }
            }
            else{
                echo '
                <br>
                <button class="btn btn-primary" style="font-weight: bold;" onclick="javascript:history.back();">返回</button>
                <span style="user-select: none;">&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                <a href="/PostController/delete_item/'.$post['id'].'" type="button" class="btn btn-danger" style="font-weight: bold;"> 🗑️ 刪除此商品 </a>
                <span style="user-select: none;">&nbsp&nbsp&nbsp&nbsp&nbsp</span>
                <a href="/PostController/modify_item/'.$post['id'].'" type="button" class="btn btn-secondary" style="font-weight: bold;"> 🛠️ 修改商品資料 </a>
                <br><br>
                ';
            }
            ?>
            </div><br>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<?php
    echo '
    <script>
        $("#img00").hover(function(){
            $("#img03").attr("src","/item_images/'.$img[0].'");
        },
        function(){
            $("#img03").attr("src","/item_images/'.$img[0].'");
        });

        $("#img01").hover(function(){
            $("#img03").attr("src","/item_images/'.$img[1].'");
        });

        $("#img02").hover(function(){
            $("#img03").attr("src","/item_images/'.$img[2].'");
        },
        function(){
            $("#img03").attr("src","/item_images/'.$img[0].'");
        });

        $(document).ready(function(){
            var width = $("#head_name").width();
            var len = $("#name_len").width();
            $("#head_name").css({"padding-right": width * 0.74 - len});
        });
    </script>
    ';
?>

<?= $this->endSection() ?>