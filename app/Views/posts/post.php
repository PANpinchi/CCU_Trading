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
        <div class="col-2" style="background-color: rgb(255, 255, 255); width: 242px;">
            <div style="height: 90px;"> </div>
            <div style="width: 105%; height: 60px; padding-left: 20px; border-bottom: 1px solid rgb(230, 230, 230)">
                <p class="type7" style="user-select: none;">📦 商品分類</p>
            </div>
            <div class="cart2 type8" style="text-align: center">
                <li>
                    <ul>
                        <li><a href="/PostController/post_type/上衣">上衣</a></li>
                        <li><a href="/PostController/post_type/褲子">褲子</a></li>
                        <li><a href="/PostController/post_type/裙裝">裙裝</a></li>
                        <li><a href="/PostController/post_type/套裝">套裝</a></li>
                        <li><a href="/PostController/post_type/外套、背心">外套、背心</a></li>
                        <li><a href="/PostController/post_type/其他服飾">其他服飾</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>服飾/配件 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/美髮護理">美髮護理</a></li>
                    <li><a href="/PostController/post_type/美容工具">美容工具</a></li>
                    <li><a href="/PostController/post_type/肌膚保養">肌膚保養</a></li>
                    <li><a href="/PostController/post_type/香水、香氛">香水、香氛</a></li>
                    <li><a href="/PostController/post_type/其他美妝保養">其他美妝保養</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>美妝保養 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/保健食品">保健食品</a></li>
                    <li><a href="/PostController/post_type/醫療保健">醫療保健</a></li>
                    <li><a href="/PostController/post_type/個人照護">個人照護</a></li>
                    <li><a href="/PostController/post_type/其他保健用品">其他保健用品</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>保健用品 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/戒指">戒指</a></li>
                    <li><a href="/PostController/post_type/耳環">耳環</a></li>
                    <li><a href="/PostController/post_type/圍巾/披肩">圍巾/披肩</a></li>
                    <li><a href="/PostController/post_type/手套">手套</a></li>
                    <li><a href="/PostController/post_type/髮飾">髮飾</a></li>
                    <li><a href="/PostController/post_type/帽子">帽子</a></li>
                    <li><a href="/PostController/post_type/項鍊">項鍊</a></li>
                    <li><a href="/PostController/post_type/眼鏡">眼鏡</a></li>
                    <li><a href="/PostController/post_type/手錶">手錶</a></li>
                    <li><a href="/PostController/post_type/其他時尚配件">其他時尚配件</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>時尚配件 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/休閒鞋款">休閒鞋款</a></li>
                    <li><a href="/PostController/post_type/運動鞋款">運動鞋款</a></li>
                    <li><a href="/PostController/post_type/高跟鞋">高跟鞋</a></li>
                    <li><a href="/PostController/post_type/靴子">靴子</a></li>
                    <li><a href="/PostController/post_type/拖鞋">拖鞋</a></li>
                    <li><a href="/PostController/post_type/鞋類周邊">鞋類周邊</a></li>
                    <li><a href="/PostController/post_type/其他鞋款">其他鞋款</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>鞋款 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/後背包">後背包</a></li>
                    <li><a href="/PostController/post_type/電腦包">電腦包</a></li>
                    <li><a href="/PostController/post_type/腰包、胸包">腰包、胸包</a></li>
                    <li><a href="/PostController/post_type/手提包">手提包</a></li>
                    <li><a href="/PostController/post_type/側、肩背包">側、肩背包</a></li>
                    <li><a href="/PostController/post_type/皮夾">皮夾</a></li>
                    <li><a href="/PostController/post_type/其他包包配件">其他包包配件</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>包包配件 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/飲品、冰品">飲品、冰品</a></li>
                    <li><a href="/PostController/post_type/美味料理">美味料理</a></li>
                    <li><a href="/PostController/post_type/休閒零食">休閒零食</a></li>
                    <li><a href="/PostController/post_type/生鮮食品">生鮮食品</a></li>
                    <li><a href="/PostController/post_type/其他美食">其他美食</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>美食外送 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/桌上型電腦">桌上型電腦</a></li>
                    <li><a href="/PostController/post_type/筆記型電腦">筆記型電腦</a></li>
                    <li><a href="/PostController/post_type/電腦筆電周邊配件">電腦筆電周邊配件</a></li>
                    <li><a href="/PostController/post_type/手機">手機</a></li>
                    <li><a href="/PostController/post_type/平板電腦">平板電腦</a></li>
                    <li><a href="/PostController/post_type/麥克風">麥克風</a></li>
                    <li><a href="/PostController/post_type/音響、喇叭">音響、喇叭</a></li>
                    <li><a href="/PostController/post_type/其他電子產品">其他電子產品</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>電子產品 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/寵物食品">寵物食品</a></li>
                    <li><a href="/PostController/post_type/寵物配件">寵物配件</a></li>
                    <li><a href="/PostController/post_type/其他寵物用品">其他寵物用品</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>寵物用品 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/電玩主機">電玩主機</a></li>
                    <li><a href="/PostController/post_type/主機周邊">主機周邊</a></li>
                    <li><a href="/PostController/post_type/主機遊戲">主機遊戲</a></li>
                    <li><a href="/PostController/post_type/其他遊戲、電玩">其他遊戲、電玩</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>遊戲/電玩 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/相機">相機</a></li>
                    <li><a href="/PostController/post_type/鏡頭">鏡頭</a></li>
                    <li><a href="/PostController/post_type/相機周邊配件">相機周邊配件</a></li>
                    <li><a href="/PostController/post_type/鏡頭周邊配件">鏡頭周邊配件</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>相機/鏡頭 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/居家香氛">居家香氛</a></li>
                    <li><a href="/PostController/post_type/居家裝飾">居家裝飾</a></li>
                    <li><a href="/PostController/post_type/家具">家具</a></li>
                    <li><a href="/PostController/post_type/餐廚用具">餐廚用具</a></li>
                    <li><a href="/PostController/post_type/節慶、派對用品">節慶、派對用品</a></li>
                    <li><a href="/PostController/post_type/其他居家生活用品">其他居家生活用品</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>居家生活 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/禮品盒、包裝材料">禮品盒、包裝材料</a></li>
                    <li><a href="/PostController/post_type/文具用品、修正用品">文具用品、修正用品</a></li>
                    <li><a href="/PostController/post_type/筆記本、紙製品">筆記本、紙製品</a></li>
                    <li><a href="/PostController/post_type/信紙、信封">信紙、信封</a></li>
                    <li><a href="/PostController/post_type/其他文具、美術用品">其他文具、美術用品</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>文具/美術用品 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/汽機車">汽機車</a></li>
                    <li><a href="/PostController/post_type/汽機車周邊零件">汽機車周邊零件</a></li>
                    <li><a href="/PostController/post_type/汽機車維修工具">汽機車維修工具</a></li>
                    <li><a href="/PostController/post_type/其他汽機車用品">其他汽機車用品</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>汽機車類 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/教科書">教科書</a></li>
                    <li><a href="/PostController/post_type/雜誌期刊">雜誌期刊</a></li>
                    <li><a href="/PostController/post_type/電子書">電子書</a></li>
                    <li><a href="/PostController/post_type/其他書籍">其他書籍</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>課本與書籍 <span style="float: right;">➲</span></a>
                </li>
                <li>
                    <ul>
                    <li><a href="/PostController/post_type/運動及戶外用品">運動及戶外用品</a></li>
                    <li><a href="/PostController/post_type/票卷、優惠卷">票卷、優惠卷</a></li>
                    <li><a href="/PostController/post_type/遊戲、虛擬點數">遊戲、虛擬點數</a></li>
                    </ul>
                    <a href="#"><div style="height: 7px;"></div>其他 <span style="float: right;">➲</span></a>
                </li>
            </div>
            <div style="height: 90px;"> </div>
        </div>
        <div class="col-8" style="background-color: rgb(250, 250, 250); width: 1031px; user-select: none;" align="center">
            <div style="height: 100px;"></div>
            <?php
                if($count == -1){
                    echo '<div style="height: 100px;"></div>';
                    echo '<img src="/img/no_item.png" style="width: auto; height: auto;max-width: 50%; max-height: 50%;"><br>';
                    echo '<p class="type6" style="user-select: none;"><br>暫無商品</p>';
                    echo '<p class="type6" style="user-select: none;">趕快去新增商品吧</p>';
                }
                else{
                    for($i = $count; $i >= 0; $i--){
                        echo '<div class="border1">';
                        echo '<div style="height: 45px; width: 400px; text-align: left; user-select: none;">';
                        echo '<div style="height: 10px;"></div>';
                        if(isset($header[$i])){
                            echo '
                            <a href="/PostController/account/'.$seller_account[$i].'">
                                <img class="user2" src="/header/'.$header[$i].'">
                                <span class="type6" style="height: 50px;"> '.$seller[$i].'</span>
                            </a>';
                        }
                        else{
                            echo '
                            <a href="/PostController/account/'.$seller_account[$i].'">
                                <img class="user2" src="/header/user.jpg">
                                <span class="type6" style="height: 50px;"> '.$seller[$i].'</span>
                            </a>';
                        }

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
                        if($number[$i] == 0){
                            if($way[$i] == '徵'){
                                echo '<span class="type3" style="float: left;"> 已徵到 </span>';
                            }
                            else{
                                echo '<span class="type3" style="float: left;"> 已售出 </span>';
                            }
                        }
                        else{
                            echo '<span class="type3" style="float: left;">$'.$price[$i].'</span>';
                        }
                        echo '<span class="type4" style="float: right;">數量：'.$number[$i].'</span>';
                        echo '</div></a></div><br>';
                    }
                }
            ?>
        </div>
        <div class="col-2" style="background-color: rgb(255, 255, 255); min-width: 258px;">
            <div style="height: 90px;"> </div>
            <div style="height: 60px; padding-left: 20px; border-bottom: 1px solid rgb(230, 230, 230)">
                <p class="type7" style="user-select: none;">✉ Message</p>
            </div>
            <?php
            for($i = 0; isset($chat_name[$i]); $i++){
                echo '
                <a href="/ChatController/chat?value='.$chat_people[$i].'">
                    <div class="type6 touch" style="height:90px; padding-left: 20px; border-bottom: 1px solid rgb(230, 230, 230)">
                    <div style="height: 22px;"></div>';
                    if(isset($chat_header[$i])){
                        echo '<img class="user3" src="/header/'.$chat_header[$i].'">';
                    }
                    else{
                        echo '<img class="user3" src="/header/user.jpg">';
                    }
                    echo '&nbsp'.$chat_name[$i].'<br></div>
                </a>';
            }
            ?>
        </div>
    <body>
</html>

<script>
    jQuery(document).ready(function($) {
	
        $('.cart2>li>a').click(function(event) {

            event.preventDefault();

            $(this).toggleClass('active');

            //其他隱藏起來
            $(this).parent().siblings().find('ul').slideUp(10);

            //打開
            $(this).siblings('ul').slideToggle();

            $(this).parent().siblings().find('a').removeClass('active');
        });
    });
</script>

<?= $this->endSection() ?>