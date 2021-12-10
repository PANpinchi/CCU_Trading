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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="/style/post.css">
        
        <title>中正大學買賣交流</title>
    </head>

    
    <body>
        <div class="col-2" style="background-color: rgb(255, 255, 255);">
            <div style="height: 90px;"> </div>
            <div id="type_box" style="position: absolute; width: 16%; min-width: 243px;">
                <div style="width: 100%; height: 60px; padding-left: 20px; border-bottom: 1px solid rgb(230, 230, 230)">
                    <p class="type7" style="user-select: none;">📦 商品分類</p>
                </div>
                <div id="type_box2" class="cart2 type8 scr" style="text-align: center">
                    <li>
                        <ul>
                            <li><a href="/AdminController/admin_post_type/上衣">上衣</a></li>
                            <li><a href="/AdminController/admin_post_type/褲子">褲子</a></li>
                            <li><a href="/AdminController/admin_post_type/裙裝">裙裝</a></li>
                            <li><a href="/AdminController/admin_post_type/套裝">套裝</a></li>
                            <li><a href="/AdminController/admin_post_type/外套、背心">外套、背心</a></li>
                            <li><a href="/AdminController/admin_post_type/其他服飾">其他服飾</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>服飾/配件 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/美髮護理">美髮護理</a></li>
                        <li><a href="/AdminController/admin_post_type/美容工具">美容工具</a></li>
                        <li><a href="/AdminController/admin_post_type/肌膚保養">肌膚保養</a></li>
                        <li><a href="/AdminController/admin_post_type/香水、香氛">香水、香氛</a></li>
                        <li><a href="/AdminController/admin_post_type/其他美妝保養">其他美妝保養</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>美妝保養 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/保健食品">保健食品</a></li>
                        <li><a href="/AdminController/admin_post_type/醫療保健">醫療保健</a></li>
                        <li><a href="/AdminController/admin_post_type/個人照護">個人照護</a></li>
                        <li><a href="/AdminController/admin_post_type/其他保健用品">其他保健用品</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>保健用品 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/戒指">戒指</a></li>
                        <li><a href="/AdminController/admin_post_type/耳環">耳環</a></li>
                        <li><a href="/AdminController/admin_post_type/圍巾/披肩">圍巾/披肩</a></li>
                        <li><a href="/AdminController/admin_post_type/手套">手套</a></li>
                        <li><a href="/AdminController/admin_post_type/髮飾">髮飾</a></li>
                        <li><a href="/AdminController/admin_post_type/帽子">帽子</a></li>
                        <li><a href="/AdminController/admin_post_type/項鍊">項鍊</a></li>
                        <li><a href="/AdminController/admin_post_type/眼鏡">眼鏡</a></li>
                        <li><a href="/AdminController/admin_post_type/手錶">手錶</a></li>
                        <li><a href="/AdminController/admin_post_type/其他時尚配件">其他時尚配件</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>時尚配件 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/休閒鞋款">休閒鞋款</a></li>
                        <li><a href="/AdminController/admin_post_type/運動鞋款">運動鞋款</a></li>
                        <li><a href="/AdminController/admin_post_type/高跟鞋">高跟鞋</a></li>
                        <li><a href="/AdminController/admin_post_type/靴子">靴子</a></li>
                        <li><a href="/AdminController/admin_post_type/拖鞋">拖鞋</a></li>
                        <li><a href="/AdminController/admin_post_type/鞋類周邊">鞋類周邊</a></li>
                        <li><a href="/AdminController/admin_post_type/其他鞋款">其他鞋款</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>鞋款 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/後背包">後背包</a></li>
                        <li><a href="/AdminController/admin_post_type/電腦包">電腦包</a></li>
                        <li><a href="/AdminController/admin_post_type/腰包、胸包">腰包、胸包</a></li>
                        <li><a href="/AdminController/admin_post_type/手提包">手提包</a></li>
                        <li><a href="/AdminController/admin_post_type/側、肩背包">側、肩背包</a></li>
                        <li><a href="/AdminController/admin_post_type/皮夾">皮夾</a></li>
                        <li><a href="/AdminController/admin_post_type/其他包包配件">其他包包配件</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>包包配件 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/飲品、冰品">飲品、冰品</a></li>
                        <li><a href="/AdminController/admin_post_type/美味料理">美味料理</a></li>
                        <li><a href="/AdminController/admin_post_type/休閒零食">休閒零食</a></li>
                        <li><a href="/AdminController/admin_post_type/生鮮食品">生鮮食品</a></li>
                        <li><a href="/AdminController/admin_post_type/其他美食">其他美食</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>美食外送 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/桌上型電腦">桌上型電腦</a></li>
                        <li><a href="/AdminController/admin_post_type/筆記型電腦">筆記型電腦</a></li>
                        <li><a href="/AdminController/admin_post_type/電腦筆電周邊配件">電腦筆電周邊配件</a></li>
                        <li><a href="/AdminController/admin_post_type/手機">手機</a></li>
                        <li><a href="/AdminController/admin_post_type/平板電腦">平板電腦</a></li>
                        <li><a href="/AdminController/admin_post_type/麥克風">麥克風</a></li>
                        <li><a href="/AdminController/admin_post_type/音響、喇叭">音響、喇叭</a></li>
                        <li><a href="/AdminController/admin_post_type/其他電子產品">其他電子產品</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>電子產品 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/寵物食品">寵物食品</a></li>
                        <li><a href="/AdminController/admin_post_type/寵物配件">寵物配件</a></li>
                        <li><a href="/AdminController/admin_post_type/其他寵物用品">其他寵物用品</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>寵物用品 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/電玩主機">電玩主機</a></li>
                        <li><a href="/AdminController/admin_post_type/主機周邊">主機周邊</a></li>
                        <li><a href="/AdminController/admin_post_type/主機遊戲">主機遊戲</a></li>
                        <li><a href="/AdminController/admin_post_type/其他遊戲、電玩">其他遊戲、電玩</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>遊戲/電玩 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/相機">相機</a></li>
                        <li><a href="/AdminController/admin_post_type/鏡頭">鏡頭</a></li>
                        <li><a href="/AdminController/admin_post_type/相機周邊配件">相機周邊配件</a></li>
                        <li><a href="/AdminController/admin_post_type/鏡頭周邊配件">鏡頭周邊配件</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>相機/鏡頭 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/居家香氛">居家香氛</a></li>
                        <li><a href="/AdminController/admin_post_type/居家裝飾">居家裝飾</a></li>
                        <li><a href="/AdminController/admin_post_type/家具">家具</a></li>
                        <li><a href="/AdminController/admin_post_type/餐廚用具">餐廚用具</a></li>
                        <li><a href="/AdminController/admin_post_type/節慶、派對用品">節慶、派對用品</a></li>
                        <li><a href="/AdminController/admin_post_type/其他居家生活用品">其他居家生活用品</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>居家生活 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/禮品盒、包裝材料">禮品盒、包裝材料</a></li>
                        <li><a href="/AdminController/admin_post_type/文具用品、修正用品">文具用品、修正用品</a></li>
                        <li><a href="/AdminController/admin_post_type/筆記本、紙製品">筆記本、紙製品</a></li>
                        <li><a href="/AdminController/admin_post_type/信紙、信封">信紙、信封</a></li>
                        <li><a href="/AdminController/admin_post_type/其他文具、美術用品">其他文具、美術用品</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>文具/美術用品 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/汽機車">汽機車</a></li>
                        <li><a href="/AdminController/admin_post_type/汽機車周邊零件">汽機車周邊零件</a></li>
                        <li><a href="/AdminController/admin_post_type/汽機車維修工具">汽機車維修工具</a></li>
                        <li><a href="/AdminController/admin_post_type/其他汽機車用品">其他汽機車用品</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>汽機車類 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/教科書">教科書</a></li>
                        <li><a href="/AdminController/admin_post_type/雜誌期刊">雜誌期刊</a></li>
                        <li><a href="/AdminController/admin_post_type/電子書">電子書</a></li>
                        <li><a href="/AdminController/admin_post_type/其他書籍">其他書籍</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>課本與書籍 <span style="float: right;">➲</span></a>
                    </li>
                    <li>
                        <ul>
                        <li><a href="/AdminController/admin_post_type/運動及戶外用品">運動及戶外用品</a></li>
                        <li><a href="/AdminController/admin_post_type/票卷、優惠卷">票卷、優惠卷</a></li>
                        <li><a href="/AdminController/admin_post_type/遊戲、虛擬點數">遊戲、虛擬點數</a></li>
                        </ul>
                        <a href="#"><div style="height: 7px;"></div>其他 <span style="float: right;">➲</span></a>
                    </li>
                    <li style="height: 80px;">
                    </li>
                </div>
            </div>
            <div style="height: 90px;"> </div>
        </div>
        <div class="col-8" style="background-color: rgb(250, 250, 250); user-select: none;">
            <div style="height: 100px;"></div>
            <p class="type0" style="font-size: 40px">&nbsp以下為可能的搜尋結果 </p>
            <br>
            <?php
                echo '<p class="type1">&nbsp&nbsp搜尋使用者結果 </p>';
                if(isset($search_users[0])){
                    for($i = 0; isset($search_users[$i]); $i++){
                        echo '<div class="border2">';
                        echo '<a href="/AdminController/admin_account/'.$search_users[$i]['account'].'">';
                        echo '<div style="height: 45px; text-align: left; user-select: none;">';
                        echo '<div style="height: 10px;"></div>';
                        if(isset($search_users[$i]['header'])){
                            echo '&nbsp&nbsp&nbsp
                                <img class="user4" src="/header/'.$search_users[$i]['header'].'">
                                <span class="type6" style="height: 100px;">&nbsp&nbsp&nbsp'.$search_users[$i]['name2'].'</span>';
                        }
                        else{
                            echo '&nbsp&nbsp&nbsp
                                <img class="user4" src="/header/user.jpg">
                                <span class="type6" style="height: 50px;">&nbsp&nbsp&nbsp'.$search_users[$i]['name2'].'</span>';
                        }
                        echo '</div></a></div>';
                    }
                }
                else{
                    echo '
                    <div style="text-align: center;">
                    <p class="type1" style="color: rgb(150, 150, 150)"> 查無使用者 </p><br>
                    </div>';
                }

                echo '<br>';
                echo '<p class="type1">&nbsp&nbsp搜尋商品結果 </p>';
                if(isset($search_posts[0])){
                    for($i = 0; isset($search_posts[$i]); $i++){
                        echo '<div class="border2">';
                        echo '<div style="height: 45px; text-align: left; user-select: none;">';
                        echo '<div style="height: 10px;"></div>';
                        echo '<a href="/AdminController/item_manager/'.$search_posts[$i]['id'].'">';
                        echo '<div style="text-align: left;">';
                        $img = '';
                        for($j = 0; isset($search_posts[$i]['image'][$j]); $j++){
                            if($search_posts[$i]['image'][$j] == ':'){
                                if($search_posts[$i]['image'][$j+1] == ' '){
                                    continue;
                                }
                                else{
                                    for($k = $j+1; isset($search_posts[$i]['image'][$k]); $k++){
                                        if($search_posts[$i]['image'][$k] != ' '){
                                            $img[$k-($j+1)] = $search_posts[$i]['image'][$k];
                                        }
                                        else{
                                            break;
                                        }
                                    }
                                    break;
                                }
                            }
                        }
                        echo '<table><tr><td rowspan="2">';
                        echo '&nbsp&nbsp&nbsp<img class="img3" src="/item_images/'.$img.'"></td>';
                        echo '<td><span class="type2">&nbsp&nbsp&nbsp【'.$search_posts[$i]['way'].'】 '.$search_posts[$i]['name'].'</span></td>';
                        echo '</tr><tr><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                        if($search_posts[$i]['number'] == 0){
                            if($search_posts[$i]['way'] == '徵'){
                                echo '<span class="type3"> 已徵到 </span>';
                            }
                            else{
                                echo '<span class="type3"> 已售出 </span>';
                            }
                        }
                        else{
                            echo '<span class="type3">$'.$search_posts[$i]['price'].'&nbsp</span>';
                        }
                        echo '<span class="type4"> | 數量：'.$search_posts[$i]['number'].'</span>';
                        echo '</td></tr></table></div></a></div></div>';
                    }
                }
                else{
                    echo '
                    <div style="text-align: center;">
                    <p class="type1" style="color: rgb(150, 150, 150)"> 查無商品 </p><br>
                    </div>';
                }
            ?>
            <br><br><br>
        </div>
        <div class="col-2" style="background-color: rgb(255, 255, 255);">
            <div style="height: 90px;"> </div>
            <div id="chat_box" style="position: absolute; width: 16%; min-width: 243px;">
                <div style="height: 60px; padding-left: 20px; border-bottom: 1px solid rgb(230, 230, 230)">
                    <p class="type7" style="user-select: none;">✉ Message</p>
                </div>
                <div id="chat_box2" class="scr">
                    <?php
                    for($i = 0; isset($chat_name[$i]); $i++){
                        echo '
                        <a href="/AdminController/admin_chat?value='.$chat_people[$i].'">
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
            </div>
        </div>
    <body>
</html>

<script>
    jQuery(document).ready(function($) {
        $('.cart2>li>a').click(function(event) {
            const h = $(this).offset().top;
            const w_h = $(window).scrollTop();
            $(this).siblings('ul').css({'top': h-w_h});

            event.preventDefault();

            $(this).toggleClass('active');

            //其他隱藏起來
            $(this).parent().siblings().find('ul').slideUp(10);

            //打開
            $(this).siblings('ul').slideToggle();

            var ul = $(this).siblings('ul');

            $(this).hover(function(){
                //滑鼠停留
            },function(){
                //滑鼠離開
                setTimeout(function(){
                    if (ul.is(':hover')){
                        ul.hover(function(){
                        },function(){
                            ul.slideUp(10);
                        });
                    }
                    else{
                        ul.slideUp(10);
                    }
                }, 100);
            });

            $(this).parent().siblings().find('a').removeClass('active');
        });
    });

    $(window).on('scroll', function() {
        const w_h = $(window).scrollTop();
        $('#type_box').css({'top': w_h+90});
        $('#chat_box').css({'top': w_h+90});
    });

    $(document).ready(function(){
        var height = $(window).height();
        $('#type_box2').css({'height': height - 200});
        $('#chat_box2').css({'height': height - 200});

        $(window).resize(function() {
            var height = $(window).height();
            $('#type_box2').css({'height': height - 200});
            $('#chat_box2').css({'height': height - 200});
        });
    });
</script>

<?= $this->endSection() ?>