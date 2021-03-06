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
        <div class="col-8">
            <div style="height: 100px"></div>
            <?php echo '<form name = "accounts" action = "/PostController/modify/'.$post['id'].'" enctype="multipart/form-data" method="POST">';?>
                <p class="type0"> 修改商品資料 </p>
                <hr>
                <span class="type1"> 商品需求&nbsp:&nbsp</span>
                <?php 
                    if($post['way'] == '賣'){
                        echo '<input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="賣" checked required><span class="type1">&nbsp&nbsp賣&nbsp&nbsp</span>';
                    }
                    else{
                        echo '<input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="賣" required><span class="type1">&nbsp&nbsp賣&nbsp&nbsp</span>';
                    }
                    if($post['way'] == '徵'){
                        echo '<input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="徵" checked required><span class="type1">&nbsp&nbsp徵&nbsp&nbsp</span>';
                    }
                    else{
                        echo '<input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="徵" required><span class="type1">&nbsp&nbsp徵&nbsp&nbsp</span>';
                    }
                    if($post['way'] == '送'){
                        echo '<input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="送" checked required><span class="type1">&nbsp&nbsp送&nbsp&nbsp</span>';
                    }
                    else{
                        echo '<input id="way" name="way" type="radio" style="width: 15px; height: 15px;" value="送" required><span class="type1">&nbsp&nbsp送&nbsp&nbsp</span>';
                    }
                ?>
                <br><br>
                <?php echo '<span class="type1"> 商品名稱&nbsp:&nbsp</span> <input id="name" name="name" type="text" style="width: 250px" value="'.$post['name'].'" autocomplete="off" required><br><br>';?>
                <?php echo '<span class="type1"> 商品價格&nbsp:&nbsp</span> <input id="price" name="price" type="number" style="width: 250px" value="'.$post['price'].'" autocomplete="off" required><br><br>';?>
                <?php echo '<span class="type1"> 商品數量&nbsp:&nbsp</span> <input id="number" name="number" type="number" style="width: 250px" value="'.$post['number'].'" autocomplete="off" required><br><br>';?>
                <?php echo '<span class="type1"> 交易時間&nbsp:&nbsp</span> <input id="time" name="time" type="text" style="width: 250px" value="'.$post['time'].'" autocomplete="off" required><br><br>';?>
                <?php echo '<span class="type1"> 交易地點&nbsp:&nbsp</span> <input id="place" name="place" type="text" style="width: 250px" value="'.$post['place'].'" autocomplete="off" required><br><br>';?>
                <?php echo '<span class="type1"> 商品類別&nbsp:&nbsp '.$post['type'].'</span>';?>
                <br><br>
                <span class="type1"> 商品圖片&nbsp:&nbsp</span>
                <?php 
                if($img[0][0] != '?'){
                    echo '<img id="img1" name="img1" src="/item_images/'.$img[0].'" style="width: 200px; height: 200px; max-width: 200px; max-height: 200px;">&nbsp&nbsp&nbsp&nbsp';
                }
                if($img[1][0] != '?'){
                    echo '<img id="img2" name="img2" src="/item_images/'.$img[1].'" style="width: 200px; height: 200px; max-width: 200px; max-height: 200px;">&nbsp&nbsp&nbsp&nbsp';
                }
                if($img[2][0] != '?'){
                    echo '<img id="img3" name="img3" src="/item_images/'.$img[2].'" style="width: 200px; height: 200px; max-width: 200px; max-height: 200px;">';
                }
                ?>
                <br><br>
                <?php echo '<p class="type1"> 商品描述&nbsp:&nbsp</p> <textarea id="describe" name="describe" value="'.$post['item_describe'].'" required></textarea><br><br>'?>
                <div style="text-align:center">
                    <button class="btn btn-primary" style="font-weight: bold;"> 儲存修改 </button><br><br><br>
                <div>
            </form>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<script>
    var editor = CKEDITOR.replace( 'describe' );
    var value = $('#describe').attr('value');
    editor.setData(value);
</script>

<?= $this->endSection() ?>