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
            <p class="type0" style="user-select: none;">個人資料</p>
            <hr>
            <div style="text-align: center;">
                <form name = "accounts" action = "/PostController/change_header" enctype="multipart/form-data" method="POST">
                    <input name="header" id="header" style="display: none;" type="file" accept=".jpg,.png" required>
                    <button name="capture01" id="capture01" type="button" style="border: none; background-color: rgb(250, 250, 250);" onclick="header.click()">
                        <?php 
                        if(isset($header)){
                            echo'<img id="img1" name="img1" class="user" src="/header/'.$header.'">';
                        }
                        else{
                            echo'<img id="img1" name="img1" class="user" src="/header/user.jpg">';
                        }
                        ?>
                    </button>
                    <br><br>
                    <button class="btn btn-secondary" style="font-weight: bold; opacity: .5;"> 儲存照片 </button>
                </form>
            </div>
            <span class="type2" style="user-select: none;">姓名&nbsp:&nbsp<?php echo $name; ?></span><br>
            <span class="type2" style="user-select: none;">使用者帳號&nbsp:&nbsp<?php echo $name2; ?></span><br>
            <span class="type2" style="user-select: none;">系所&nbsp:&nbsp<?php echo $department; ?></span><br>
            <span class="type2" style="user-select: none;">Email&nbsp:&nbsp<?php echo $account; ?></span><br>
            <span class="type2" style="user-select: none;">密碼&nbsp:&nbsp
                <?php 
                    echo $password[0].$password[1];
                    for($i = 2; isset($password[$i+2]); $i++){
                        echo '*';
                    }
                    echo $password[$i].$password[$i+1];
                ?>
            </span><br>
            <span class="type2" style="user-select: none;">手機號碼&nbsp:&nbsp
                <?php 
                    echo $phone[0].$phone[1];
                    for($i = 2; isset($phone[$i+2]); $i++){
                        echo '*';
                    }
                    echo $phone[$i].$phone[$i+1];
                ?>
            </span><br>
            <span class="type2" style="user-select: none;">性別&nbsp:&nbsp<?php echo $sex; ?>性</span><br>
            <span class="type2" style="user-select: none;">生日&nbsp:&nbsp<?php echo $birthday; ?></span><br><br><br>
            <div align="center">
                <a href="/Postcontroller/change_account" type="button" class="btn btn-secondary" style="font-weight: bold; opacity: .5;"> 修改個人資料 </a>
            </div>
            <p class="type0" style="user-select: none;">個人賣場</p>
            <hr>
            <table width="100%" style="table-layout:fixed;" cellspacing="50" align="center">
                <?php
                    for($j = 0; $j < $count; $j++){
                        if($j % 3 == 0){
                            echo '<br><tr>';
                        }
                        echo '<td style="background-color: rgb(255, 255, 255); border: 10px solid rgb(250, 250, 250)">';
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
                <br><br>
                <a href="/LoginController/logout" type="button" class="btn btn-primary" style="font-weight: bold; opacity: .9"> 登出 </a>
                <br><br><br>
            </div>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<script>    
    $('#header').on('change', function(e){      
        const file = this.files[0];
        
        const fr = new FileReader();
        fr.onload = function (e) {
            $('#img1').attr('src', e.target.result);
        };
        
        // 使用 readAsDataURL 將圖片轉成 Base64
        fr.readAsDataURL(file);
    });
</script>

<?= $this->endSection() ?>