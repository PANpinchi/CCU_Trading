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
            <p class="type0"> 新增商品 </p>
            <hr>
            <p class="type8"> 商品類別&nbsp:&nbsp</p>
            <div class="cart type8" style="text-align: center">
                <li>
                    <a href="#">服飾/配件 <span style="float: right;">➲</span></a>
                    <ul>
                        <li><a href="/PostController/create/上衣">上衣</a></li>
                        <li><a href="/PostController/create/褲子">褲子</a></li>
                        <li><a href="/PostController/create/裙裝">裙裝</a></li>
                        <li><a href="/PostController/create/套裝">套裝</a></li>
                        <li><a href="/PostController/create/外套、背心">外套、背心</a></li>
                        <li><a href="/PostController/create/其他服飾">其他服飾</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">美妝保養 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/美髮護理">美髮護理</a></li>
                    <li><a href="/PostController/create/美容工具">美容工具</a></li>
                    <li><a href="/PostController/create/肌膚保養">肌膚保養</a></li>
                    <li><a href="/PostController/create/香水、香氛">香水、香氛</a></li>
                    <li><a href="/PostController/create/其他美妝保養">其他美妝保養</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">保健用品 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/保健食品">保健食品</a></li>
                    <li><a href="/PostController/create/醫療保健">醫療保健</a></li>
                    <li><a href="/PostController/create/個人照護">個人照護</a></li>
                    <li><a href="/PostController/create/其他保健用品">其他保健用品</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">時尚配件 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/戒指">戒指</a></li>
                    <li><a href="/PostController/create/耳環">耳環</a></li>
                    <li><a href="/PostController/create/圍巾/披肩">圍巾/披肩</a></li>
                    <li><a href="/PostController/create/手套">手套</a></li>
                    <li><a href="/PostController/create/髮飾">髮飾</a></li>
                    <li><a href="/PostController/create/帽子">帽子</a></li>
                    <li><a href="/PostController/create/項鍊">項鍊</a></li>
                    <li><a href="/PostController/create/眼鏡">眼鏡</a></li>
                    <li><a href="/PostController/create/手錶">手錶</a></li>
                    <li><a href="/PostController/create/其他時尚配件">其他時尚配件</a></li>
                    </ul>
                </li>
                <br>
                <li>
                    <a href="#">鞋款 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/休閒鞋款">休閒鞋款</a></li>
                    <li><a href="/PostController/create/運動鞋款">運動鞋款</a></li>
                    <li><a href="/PostController/create/高跟鞋">高跟鞋</a></li>
                    <li><a href="/PostController/create/靴子">靴子</a></li>
                    <li><a href="/PostController/create/拖鞋">拖鞋</a></li>
                    <li><a href="/PostController/create/鞋類周邊">鞋類周邊</a></li>
                    <li><a href="/PostController/create/其他鞋款">其他鞋款</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">包包配件 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/後背包">後背包</a></li>
                    <li><a href="/PostController/create/電腦包">電腦包</a></li>
                    <li><a href="/PostController/create/腰包、胸包">腰包、胸包</a></li>
                    <li><a href="/PostController/create/手提包">手提包</a></li>
                    <li><a href="/PostController/create/側、肩背包">側、肩背包</a></li>
                    <li><a href="/PostController/create/皮夾">皮夾</a></li>
                    <li><a href="/PostController/create/其他包包配件">其他包包配件</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">美食外送 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/飲品、冰品">飲品、冰品</a></li>
                    <li><a href="/PostController/create/美味料理">美味料理</a></li>
                    <li><a href="/PostController/create/休閒零食">休閒零食</a></li>
                    <li><a href="/PostController/create/生鮮食品">生鮮食品</a></li>
                    <li><a href="/PostController/create/其他美食">其他美食</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">電子產品 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/桌上型電腦">桌上型電腦</a></li>
                    <li><a href="/PostController/create/筆記型電腦">筆記型電腦</a></li>
                    <li><a href="/PostController/create/電腦筆電周邊配件">電腦筆電周邊配件</a></li>
                    <li><a href="/PostController/create/手機">手機</a></li>
                    <li><a href="/PostController/create/平板電腦">平板電腦</a></li>
                    <li><a href="/PostController/create/麥克風">麥克風</a></li>
                    <li><a href="/PostController/create/音響、喇叭">音響、喇叭</a></li>
                    <li><a href="/PostController/create/其他電子產品">其他電子產品</a></li>
                    </ul>
                </li>
                <br>
                <li>
                    <a href="#">寵物用品 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/寵物食品">寵物食品</a></li>
                    <li><a href="/PostController/create/寵物配件">寵物配件</a></li>
                    <li><a href="/PostController/create/其他寵物用品">其他寵物用品</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">遊戲/電玩 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/電玩主機">電玩主機</a></li>
                    <li><a href="/PostController/create/主機周邊">主機周邊</a></li>
                    <li><a href="/PostController/create/主機遊戲">主機遊戲</a></li>
                    <li><a href="/PostController/create/其他遊戲、電玩">其他遊戲、電玩</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">相機/鏡頭 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/相機">相機</a></li>
                    <li><a href="/PostController/create/鏡頭">鏡頭</a></li>
                    <li><a href="/PostController/create/相機周邊配件">相機周邊配件</a></li>
                    <li><a href="/PostController/create/鏡頭周邊配件">鏡頭周邊配件</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">居家生活 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/居家香氛">居家香氛</a></li>
                    <li><a href="/PostController/create/居家裝飾">居家裝飾</a></li>
                    <li><a href="/PostController/create/家具">家具</a></li>
                    <li><a href="/PostController/create/餐廚用具">餐廚用具</a></li>
                    <li><a href="/PostController/create/節慶、派對用品">節慶、派對用品</a></li>
                    <li><a href="/PostController/create/其他居家生活用品">其他居家生活用品</a></li>
                    </ul>
                </li>
                <br>
                <li>
                    <a href="#">文具/美術用品 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/禮品盒、包裝材料">禮品盒、包裝材料</a></li>
                    <li><a href="/PostController/create/文具用品、修正用品">文具用品、修正用品</a></li>
                    <li><a href="/PostController/create/筆記本、紙製品">筆記本、紙製品</a></li>
                    <li><a href="/PostController/create/信紙、信封">信紙、信封</a></li>
                    <li><a href="/PostController/create/其他文具、美術用品">其他文具、美術用品</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">汽機車類 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/汽機車">汽機車</a></li>
                    <li><a href="/PostController/create/汽機車周邊零件">汽機車周邊零件</a></li>
                    <li><a href="/PostController/create/汽機車維修工具">汽機車維修工具</a></li>
                    <li><a href="/PostController/create/其他汽機車用品">其他汽機車用品</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">課本與書籍 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/教科書">教科書</a></li>
                    <li><a href="/PostController/create/雜誌期刊">雜誌期刊</a></li>
                    <li><a href="/PostController/create/電子書">電子書</a></li>
                    <li><a href="/PostController/create/其他書籍">其他書籍</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">其他 <span style="float: right;">➲</span></a>
                    <ul>
                    <li><a href="/PostController/create/運動及戶外用品">運動及戶外用品</a></li>
                    <li><a href="/PostController/create/票卷、優惠卷">票卷、優惠卷</a></li>
                    <li><a href="/PostController/create/遊戲、虛擬點數">遊戲、虛擬點數</a></li>
                    </ul>
                </li>
            </div>
        </div>
        <div class="col-2"></div>
    <body>
</html>

<script>
    jQuery(document).ready(function($) {
	
        $('.cart>li>a').click(function(event) {

            event.preventDefault();

            $(this).toggleClass('active');

            //打開
            $(this).siblings('ul').slideToggle();
            
            //其他隱藏起來
            $(this).parent().siblings().find('ul').slideUp();

            $(this).parent().siblings().find('a').removeClass('active');
        });
    });
</script>

<?= $this->endSection() ?>