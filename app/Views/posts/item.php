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
            <?php
                echo '<div style="height: 500px; background-color: rgb(255, 255, 255);">';
                echo '<div style="height: 20px;"></div>';
                echo '<table width="100%" style="table-layout:fixed;"><tr><td rowspan="10" colspan="6">';
                $img = '';
                for($j = 0; isset($post['image'][$j]); $j++){
                    if($post['image'][$j] == ':'){
                        if($post['image'][$j+1] == ' '){
                            continue;
                        }
                        else{
                            for($k = $j+1; isset($post['image'][$k]); $k++){
                                if($post['image'][$k] != ' '){
                                    $img[$k-($j+1)] = $post['image'][$k];
                                }
                                else{
                                    break;
                                }
                            }
                            break;
                        }
                    }
                }
                echo '<img class="img1" src="/item_images/'.$img.'" style="margin-left: 20px;"></td>';
                echo '<td colspan="8"><span class="type2">【'.$post['way'].'】 '.$post['name'].'</span></td>';
                echo '</tr>';
                echo '<tr>';
                echo '<td colspan="8"><span class="type3">$'.$post['price'].' </span>';
                echo '<span class="type4"> | 數量：'.$post['number'].'</span></td>';
                echo '</tr>';
                for($i = 0; $i < 8; $i++){
                    echo '<tr>';
                    for($j = 0; $j < 8; $j++){
                        echo '<td>&nbsp</td>';
                    }
                    echo '</tr>';
                }
                echo '</table></div><br>';
            ?>
            
        </div>
        <div class="col-2"></div>
    <body>
</html>

<?= $this->endSection() ?>