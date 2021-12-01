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
            <p class="type0">賣家資料</p>
            <hr>
            <table style="width: 100%">
                <tr>
                    <td class="type2">姓名&nbsp:&nbsp<?php echo $user['name']; ?></td>
                    <td class="type2">使用者帳號&nbsp:&nbsp<?php echo $user['name2']; ?></td>
                    <td class="type2">系所&nbsp:&nbsp<?php echo $user['department']; ?></td>
                </tr>
                <tr>
                    <td class="type2">手機號碼&nbsp:&nbsp
                        <?php 
                            echo $user['phone'][0].$user['phone'][1];
                            for($i = 2; isset($user['phone'][$i+2]); $i++){
                                echo '*';
                            }
                            echo $user['phone'][$i].$user['phone'][$i+1];
                        ?>
                    </td>
                    <td class="type2">性別&nbsp:&nbsp<?php echo $user['sex']; ?>性</td>
                </tr>
            </table>
            <br><br><br>
            <p class="type0">個人賣場</p>
            <hr>
            <table width="100%" style="table-layout:fixed;" cellspacing="50" align="center">
                <?php
                    for($j = 0; $j < $count; $j++){
                        if($j % 3 == 0){
                            echo '<br><tr>';
                        }
                        echo '<td style="background-color: rgb(255, 255, 255); border: 10px solid rgb(245, 245, 245)">';
                        echo '<a href="/PostController/item/'.$post[$j]['id'].'">';
                        echo '<div style="height: 10px"></div>';
                        echo '<div align="center" style="height: 430px;">';
                        $img = '';
                        for($k = 0; isset($post[$j]['image'][$k]); $k++){
                            if($post[$j]['image'][$k] == ':'){
                                if($post[$j]['image'][$k+1] == ' '){
                                    continue;
                                }
                                else{
                                    for($l = $k+1; isset($post[$j]['image'][$l]); $l++){
                                        if($post[$j]['image'][$l] != ' '){
                                            $img[$l-($k+1)] = $post[$j]['image'][$l];
                                        }
                                        else{
                                            break;
                                        }
                                    }
                                    break;
                                }
                            }
                        }
                        echo '<img class="img2" src="/item_images/'.$img.'"><br><br>';
                        echo '<p class="type2" style="text-align: left; margin-left: 15px;">【'.$post[$j]['way'].'】 '.$post[$j]['name'].'</p>';
                        echo '<span class="type3" style="float: left; margin-left: 15px;">$'.$post[$j]['price'].'</span>';
                        echo '<span class="type4" style="float: right; margin-right: 15px;">數量：'.$post[$j]['number'].'</span>';
                        echo '</div></a></td>';
                    }

                    while($j % 3 != 0){
                        echo '<td> </td>';
                        $j++;
                    }
                ?>
            </table>
            <div align="center">
                <br>
                <a href="#" type="button" class="btn btn-primary" style="font-weight: bold;"> 私訊賣家 </a>
                <br><br>
            </div>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<?= $this->endSection() ?>