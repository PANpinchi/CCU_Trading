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
                <?php 
                if(isset($header)){
                    echo'<img id="img1" name="img1" class="user" src="/header/'.$header.'">';
                }
                else{
                    echo'<img id="img1" name="img1" class="user" src="/header/user.jpg">';
                }
                ?>
                <br><br>
            </div>
            <form name = "accounts" action = "/PostController/change_acc" enctype="multipart/form-data" method="POST">
                <span class="type2" style="user-select: none;">姓名&nbsp:&nbsp<?php echo $name; ?></span><br>
                <span class="type2" style="user-select: none;">使用者帳號&nbsp:&nbsp<?php echo '<input id = "name2" name = "name2" type = "text" class="type2" style="height:35px; width:250px" placeholder = "暱稱" value="'.$name2.'" required>'; ?></span><br>
                <span class="type2" style="user-select: none;">系所&nbsp:&nbsp
                <select id= "department" name = "department" class="type2" style="height:35px; width:250px" required>
                    <option value="" disabled selected>請選擇科系</option>
                    <optgroup label="文學院">
                        <option value="中國文學系">中國文學系</option>
                        <option value="中國文學研究所">中國文學研究所</option>
                        <option value="外國語文學系">外國語文學系</option>
                        <option value="外國語文學研究所">外國語文研究所</option>
                        <option value="歷史學系">歷史學系</option>
                        <option value="歷史研究所">歷史研究所</option>
                        <option value="哲學系">哲學系</option>
                        <option value="哲學研究所">哲學研究所</option>
                        <option value="語言學研究所">語言學研究所</option>
                        <option value="台灣文學與創意應用研究所">台灣文學與創意應用研究所</option>
                        <option value="人文與社會科學研究中心">人文與社會科學研究中心</option>
                    </optgroup>
                    <optgroup label="社會科學院">
                        <option value="社會福利學系">社會福利學系</option>
                        <option value="社會福利研究所">社會福利研究所</option>
                        <option value="心理學系">心理學系</option>
                        <option value="心理研究所">心理研究所</option>
                        <option value="勞工關係學系">勞工關係學系</option>
                        <option value="勞工關係研究所">勞工關係研究所</option>
                        <option value="政治學系">政治學系</option>
                        <option value="政治研究所">政治研究所</option>
                        <option value="傳播學系">傳播學系</option>
                        <option value="傳播研究所">傳播研究所</option>
                        <option value="戰略暨國際事務研究所">戰略暨國際事務研究所</option>
                        <option value="認知科學博士學位學程">認知科學博士學位學程</option>
                    </optgroup>
                    <optgroup label="管理學院">
                        <option value="經濟學系">經濟學系</option>
                        <option value="經濟研究所">經濟研究所</option>
                        <option value="財務金融學系">財務金融學系</option>
                        <option value="財務金融研究所">財務金融研究所</option>
                        <option value="企業管理學系">企業管理學系</option>
                        <option value="企業管理研究所">企業管理研究所</option>
                        <option value="會計與資訊科技學系">會計與資訊科技學系</option>
                        <option value="會計與資訊科技研究所">會計與資訊科技研究所</option>
                        <option value="資訊管理學系">資訊管理學系</option>
                        <option value="資訊管理研究所">資訊管理研究所</option>
                        <option value="高階主管管理碩士在職專班">高階主管管理碩士在職專班</option>
                        <option value="國際財務金融管理碩士學位">國際財務金融管理碩士學位</option>
                        <option value="金融科技碩士學位">金融科技碩士學位</option>
                    </optgroup>
                    <optgroup label="教育學院">
                        <option value="成人及繼續教育學系">成人及繼續教育學系</option>
                        <option value="成人及繼續教育研究所">成人及繼續教育研究所</option>
                        <option value="教育學研究所">教育學研究所</option>
                        <option value="犯罪防治學系">犯罪防治學系</option>
                        <option value="犯罪防治研究所">犯罪防治研究所</option>
                        <option value="運動競技學系">運動競技學系</option>
                        <option value="運動競技研究所">運動競技研究所</option>
                        <option value="師資培育中心">師資培育中心</option>
                        <option value="教學專業發展數位學習碩士在職專班">教學專業發展數位學習碩士在職專班</option>
                        <option value="教育領導與管理發展國際碩士學位學程">教育領導與管理發展國際碩士學位學程</option>
                    </optgroup>
                    <optgroup label="法學院">
                        <option value="法律學系">法律學系</option>
                        <option value="法律研究所">法律研究所</option>
                        <option value="財經法律學系">財經法律學系</option>
                        <option value="財經法律研究所">財經法律研究所</option>
                        <option value="高階主管法律碩士在職專班">高階主管法律碩士在職專班</option>
                    </optgroup>
                    <optgroup label="理學院">
                        <option value="數學系">數學系</option>
                        <option value="數學研究所">數學研究所</option>
                        <option value="地球與環境科學系">地球與環境科學系</option>
                        <option value="地球與環境科學研究所">地球與環境科學研究所</option>
                        <option value="物理學系">物理學系</option>
                        <option value="物理研究所">物理研究所</option>
                        <option value="化學暨生物化學系">化學暨生物化學系</option>
                        <option value="化學暨生物化學研究所">化學暨生物化學研究所</option>
                        <option value="生物醫學科學系">生物醫學科學系</option>
                        <option value="生物醫學科學研究所">生物醫學科學研究所</option>
                        <option value="跨領域科學國際博士學位學程">跨領域科學國際博士學位學程</option>
                    </optgroup>
                    <optgroup label="工學院">
                        <option value="資訊工程學系">資訊工程學系</option>
                        <option value="資訊工程研究所">資訊工程研究所</option>
                        <option value="電機工程學系">電機工程學系</option>
                        <option value="電機工程研究所">電機工程研究所</option>
                        <option value="機械工程學系">機械工程學系</option>
                        <option value="機械工程研究所">機械工程研究所</option>
                        <option value="化學工程學系">化學工程學系</option>
                        <option value="化學工程研究所">化學工程研究所</option>
                        <option value="通訊工程學系">通訊工程學系</option>
                        <option value="通訊工程研究所">通訊工程研究所</option>
                        <option value="光機電整合工程研究所">光機電整合工程研究所</option>
                        <option value="前瞻製造系統碩士學位學程">前瞻製造系統碩士學位學程</option>
                        <option value="環境智能與智慧系統博士學位學程">環境智能與智慧系統博士學位學程</option>
                        <option value="機械工程學系光機電整合工程組">機械工程學系光機電整合工程組</option>
                    </optgroup>
                </select>
                </span><br>
                <span class="type2" style="user-select: none;">Email&nbsp:&nbsp<?php echo $account; ?></span><br>
                <span class="type2" style="user-select: none;">密碼&nbsp:&nbsp<?php echo '<input id = "password" name = "password" type = "password" class="type2" style="height:35px; width:250px" placeholder = "密碼長度限制6至15位" value="'.$password.'" required>';?></span><br>
                <span class="type2" style="user-select: none;">手機號碼&nbsp:&nbsp<?php echo '<input id = "phone" name = "phone" type = "text" class="type2" style="height:35px; width:250px" placeholder = "手機號碼" value="'.$phone.'" required>';?></span><br>
                <span class="type2" style="user-select: none;">性別&nbsp:&nbsp
                <?php 
                if($sex == '男'){
                    echo '
                    <input id = "sex1" name = "sex" type = "radio" style="height:15px; width:15px;" value="男" checked required><label for="sex1">&nbsp&nbsp男&nbsp&nbsp&nbsp</label>
                    <input id = "sex2" name = "sex" type = "radio" style="height:15px; width:15px;" value="女" required><label for="sex2">&nbsp&nbsp女&nbsp&nbsp</label>
                    ';
                }
                else{
                    echo '
                    <input id = "sex1" name = "sex" type = "radio" style="height:15px; width:15px;" value="男" required><label for="sex1">&nbsp&nbsp男&nbsp&nbsp&nbsp</label>
                    <input id = "sex2" name = "sex" type = "radio" style="height:15px; width:15px;" value="女" checked required><label for="sex2">&nbsp&nbsp女&nbsp&nbsp</label>
                    ';
                }
                ?></span><br>
                <span class="type2" style="user-select: none;">生日&nbsp:&nbsp<?php echo $birthday; ?></span><br><br><br>
                <div align="center">
                    <br>
                    <button class="btn btn-secondary" style="font-weight: bold; opacity: .5;"> 儲存修改 </button>
                    <br><br>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<?php echo'
    <script>    
        $("#header").on("change", function(e){      
            const file = this.files[0];
            
            const fr = new FileReader();
            fr.onload = function (e) {
                $("#img1").attr("src", e.target.result);
            };
            
            // 使用 readAsDataURL 將圖片轉成 Base64
            fr.readAsDataURL(file);
        });

        $("#department").val("'.$department.'").change();
    </script>
';?>

<?= $this->endSection() ?>