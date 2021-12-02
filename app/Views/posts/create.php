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
        <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
        <link rel="stylesheet" href="/style/post.css">

        <title>中正大學買賣交流</title>
    </head>
    
    <body>
        <div class="col-2"></div>
        <div class="col-8" style="background-color: rgb(255, 255, 255)">
            <div style="height: 100px"></div>
            <form name = "accounts" action = "/PostController/post_item" enctype="multipart/form-data" method="POST">
                <p class="type0"> 新增商品 </p>
                <hr>
                <span class="type1"> 商品需求&nbsp:&nbsp</span>
                <input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="賣" required><span class="type1">&nbsp&nbsp賣&nbsp&nbsp</span>
                <input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="徵" required><span class="type1">&nbsp&nbsp徵&nbsp&nbsp</span>
                <input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="送" required><span class="type1">&nbsp&nbsp送&nbsp&nbsp</span>
                <br><br>
                <span class="type1"> 商品名稱&nbsp:&nbsp</span> <input id="name" name="name" type="text" style="width: 250px" placeholder="商品名稱" autocomplete="off" required><br><br>
                <span class="type1"> 商品價格&nbsp:&nbsp</span> <input id="price" name="price" type="number" style="width: 250px" placeholder="NT$" autocomplete="off" required><br><br>
                <span class="type1"> 商品數量&nbsp:&nbsp</span> <input id="number" name="number" type="number" style="width: 250px" placeholder="商品數量" autocomplete="off" required><br><br>
                <span class="type1"> 交易時間&nbsp:&nbsp</span> <input id="time" name="time" type="text" style="width: 250px" placeholder="越快越好、哪天之前、其他..." autocomplete="off" required><br><br>
                <span class="type1"> 交易地點&nbsp:&nbsp</span> <input id="place" name="place" type="text" style="width: 250px" placeholder="活中門口、郵寄、其他..." autocomplete="off" required><br><br>
                <?php echo '<span class="type1"> 商品類別&nbsp:&nbsp '.$type.'</span>';?>
                <br><br>
                <span class="type1"> 商品圖片&nbsp:&nbsp</span>
                <input name="img01" id="img01" style="display: none;" type="file" accept=".jpg,.png" required>
                <button name="capture01" id="capture01" type="button" style="border: none; background-color: rgb(255, 255, 255);" onclick="img01.click()">
                    <img id="img1" name="img1" src="/img/upload_img.png" style="width: 200px; height: 200px; max-width: 200px; max-height: 200px;">
                </button>
                <input name="img02" id="img02" style="display: none;" type="file" accept=".jpg,.png">
                <button name="capture02" id="capture02" style="display: none; border: none; background-color: rgb(255, 255, 255);" type="button" onclick="img02.click()">
                    <img id="img2" name="img2" style="max-width: 200px; max-height: 200px;">
                </button>
                <input name="img03" id="img03" style="display: none;" type="file" accept=".jpg,.png">
                <button name="capture03" id="capture03" style="display: none; border: none; background-color: rgb(255, 255, 255);" type="button" onclick="img03.click()">
                    <img id="img3" name="img3" style="max-width: 200px; max-height: 200px;">
                </button><br><br>
                <p class="type1"> 商品描述&nbsp:&nbsp</p> <textarea id="describe" name="describe" required></textarea><br><br>
                <div style="text-align:center">
                    <button class="btn btn-primary" style="font-weight: bold;"> 儲存並上架 </button><br><br><br>
                </div>
            </form>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<script>
    CKEDITOR.replace( 'describe' );
    
    $('#img01').on('change', function(e){      
        const file = this.files[0];
        
        const fr = new FileReader();
        fr.onload = function (e) {
            $('#img1').attr('src', e.target.result);
            $('#img2').attr('src', '/img/upload_img.png');
            $('#img2').css('width', '200px');
            $('#img2').css('height', '200px');
            $("#capture02").css('display','inline-block');
        };
        
        // 使用 readAsDataURL 將圖片轉成 Base64
        fr.readAsDataURL(file);
    });
    $('#img02').on('change', function(e){      
        const file = this.files[0];
        
        const fr = new FileReader();
        fr.onload = function (e) {
            $('#img2').attr('src', e.target.result);
            $('#img3').attr('src', '/img/upload_img.png');
            $('#img3').css('width', '200px');
            $('#img3').css('height', '200px');
            $("#capture03").css('display','inline-block');
        };
        
        // 使用 readAsDataURL 將圖片轉成 Base64
        fr.readAsDataURL(file);
    });
    $('#img03').on('change', function(e){      
        const file = this.files[0];
        
        const fr = new FileReader();
        fr.onload = function (e) {
            $('#img3').attr('src', e.target.result);
        };
        
        // 使用 readAsDataURL 將圖片轉成 Base64
        fr.readAsDataURL(file);
    });

    jQuery(document).ready(function($) {
	
        $('.cart>li>a').click(function(event) {

            event.preventDefault();

            $(this).toggleClass('active');

            //我自己的ul 做收合效果
            $(this).siblings('ul').slideToggle();

            $(this).parent().siblings().find('a').removeClass('active');

            //this以外的都隱藏起來
            $(this).parent().siblings().find('ul').slideUp();
        });
    });
</script>

<?= $this->endSection() ?>