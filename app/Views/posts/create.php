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
                <span class="type1"> 商品類別&nbsp:&nbsp</span>
                <select id="type" name="type" class="type1" style="height:35px; width:250px" required>
                    <option value="" disabled selected>請選擇商品類別</option>
                    <optgroup label="女生衣著">
                        <option value="上衣">上衣</option>
                        <option value="長褲/緊身褲">長褲/緊身褲</option>
                        <option value="短褲">短褲</option>
                        <option value="裙裝">裙裝</option>
                        <option value="牛仔褲">牛仔褲</option>
                        <option value="洋裝">洋裝</option>
                        <option value="禮服">禮服</option>
                        <option value="連身褲/吊帶褲">連身褲/吊帶褲</option>
                        <option value="外套/背心">外套/背心</option>
                        <option value="毛衣/針織">毛衣/針織</option>
                        <option value="大學T/帽T">大學T/帽T</option>
                        <option value="套裝">套裝</option>
                        <option value="內衣褲">內衣褲</option>
                        <option value="睡衣/居家服">睡衣/居家服</option>
                        <option value="傳統服飾">傳統服飾</option>
                        <option value="角色扮演服">角色扮演服</option>
                        <option value="襪子/絲襪">襪子/絲襪</option>
                        <option value="其他女生衣著">其他女生衣著</option>
                    </optgroup>
                    <optgroup label="男生衣著">
                        <option value="牛仔褲">牛仔褲</option>
                        <option value="大學T/帽T">大學T/帽T</option>
                        <option value="毛衣/針織">毛衣/針織</option>
                        <option value="外套、風衣與背心">外套、風衣與背心</option>
                        <option value="西裝">西裝</option>
                        <option value="長褲">長褲</option>
                        <option value="短褲">短褲</option>
                        <option value="上衣">上衣</option>
                        <option value="內著">內著</option>
                        <option value="睡衣">睡衣</option>
                        <option value="套裝">套裝</option>
                        <option value="傳統服飾">傳統服飾</option>
                        <option value="戲服">戲服</option>
                        <option value="職業制服">職業制服</option>
                        <option value="襪子">襪子</option>
                        <option value="其他男生衣著">其他男生衣著</option>
                    </optgroup>
                    <optgroup label="美妝保養">
                        <option value="手足保養、美甲">手足保養、美甲</option>
                        <option value="美髮護理">美髮護理</option>
                        <option value="男士保養">男士保養</option>
                        <option value="香水/香氛">香水/香氛</option>
                        <option value="彩妝">彩妝</option>
                        <option value="美容工具">美容工具</option>
                        <option value="肌膚保養">肌膚保養</option>
                        <option value="美妝、保養組合">美妝、保養組合</option>
                        <option value="身體清潔、保養">身體清潔、保養</option>
                        <option value="其他美妝保養">其他美妝保養</option>
                    </optgroup>
                    <optgroup label="保健">
                        <option value="保健食品/營養品">保健食品/營養品</option>
                        <option value="醫療保健">醫療保健</option>
                        <option value="個人照護">個人照護</option>
                        <option value="情趣用品">情趣用品</option>
                        <option value="其他保健用品">其他保健用品</option>
                    </optgroup>
                    <optgroup label="時尚配件">
                        <option value="戒指">戒指</option>
                        <option value="耳環">耳環</option>
                        <option value="圍巾/披肩">圍巾/披肩</option>
                        <option value="手套">手套</option>
                        <option value="髮飾">髮飾</option>
                        <option value="手鍊/手環">手鍊/手環</option>
                        <option value="腳鍊/腳環">腳鍊/腳環</option>
                        <option value="帽子">帽子</option>
                        <option value="項鍊">項鍊</option>
                        <option value="眼鏡">眼鏡</option>
                        <option value="其他時尚配件">其他時尚配件</option>
                    </optgroup>
                    <optgroup label="家用電器">
                        <option value="投影機與周邊配件">投影機與周邊配件</option>
                        <option value="生活家電">生活家電</option>
                        <option value="大型家電">大型家電</option>
                        <option value="電視機與周邊配件">電視機與周邊配件</option>
                        <option value="廚房家電">廚房家電</option>
                        <option value="居安與家用零件">居安與家用零件</option>
                        <option value="電池">電池</option>
                        <option value="遙控器">遙控器</option>
                        <option value="其他家電">其他家電</option>
                    </optgroup>
                    <optgroup label="男鞋">
                        <option value="靴子">靴子</option>
                        <option value="休閒鞋款">休閒鞋款</option>
                        <option value="懶人鞋/穆勒鞋">懶人鞋/穆勒鞋</option>
                        <option value="樂福鞋/帆船鞋">樂福鞋/帆船鞋</option>
                        <option value="牛津鞋/綁帶皮鞋">牛津鞋/綁帶皮鞋</option>
                        <option value="涼拖鞋">涼拖鞋</option>
                        <option value="鞋材/鞋類周邊">鞋材/鞋類周邊</option>
                        <option value="其他男鞋">其他男鞋</option>
                    </optgroup>
                    <optgroup label="手機平板與周邊">
                        <option value="電話/儲值卡">電話/儲值卡</option>
                        <option value="平板電腦">平板電腦</option>
                        <option value="手機">手機</option>
                        <option value="穿戴裝置">穿戴裝置</option>
                        <option value="手機周邊配件">手機周邊配件</option>
                        <option value="對講機">對講機</option>
                        <option value="其他手機平板用品">其他手機平板用品</option>
                    </optgroup>
                    <optgroup label="旅行相關用品/行李箱">
                        <option value="行李箱">行李箱</option>
                        <option value="旅行包">旅行包</option>
                        <option value="旅行相關周邊">旅行相關周邊</option>
                        <option value="其他旅行相關用品">其他旅行相關用品</option>
                    </optgroup>
                    <optgroup label="女生包包/精品">
                        <option value="後背包">後背包</option>
                        <option value="電腦包">電腦包</option>
                        <option value="晚宴包/手拿包">晚宴包/手拿包</option>
                        <option value="腰包/胸包">腰包/胸包</option>
                        <option value="托特包">托特包</option>
                        <option value="手提包">手提包</option>
                        <option value="側/肩背包">側/肩背包</option>
                        <option value="皮夾">皮夾</option>
                        <option value="包包配件">包包配件</option>
                        <option value="其他女生精品">其他女生精品</option>
                    </optgroup>
                    <optgroup label="美食外送">
                        <option value="飲品/冰品">飲品/冰品</option>
                        <option value="咖啡/下午茶">咖啡/下午茶</option>
                        <option value="日式料理">日式料理</option>
                        <option value="韓式料理">韓式料理</option>
                        <option value="港式料理">港式料理</option>
                        <option value="中式料理">中式料理</option>
                        <option value="其他西式料理">其他西式料理</option>
                        <option value="義法料理">義法料理</option>
                        <option value="純素料理">純素料理</option>
                        <option value="星馬料理">星馬料理</option>
                        <option value="美墨料理">美墨料理</option>
                        <option value="披薩、速食料理">披薩、速食料理</option>
                        <option value="早午餐">早午餐</option>
                        <option value="泰越料理">泰越料理</option>
                        <option value="便當">便當</option>
                        <option value="台灣小吃/魯味">台灣小吃/滷味</option>
                        <option value="低卡健康餐">低卡健康餐</option>
                        <option value="鍋物/燒烤">鍋物/燒烤</option>
                        <option value="泰越料理">泰越料理</option>
                        <option value="其他美食">其他美食</option>
                    </optgroup>
                    <optgroup label="女鞋">
                        <option value="靴子">靴子</option>
                        <option value="休閒鞋款">休閒鞋款</option>
                        <option value="平底鞋">平底鞋</option>
                        <option value="跟鞋">跟鞋</option>
                        <option value="楔型鞋">楔型鞋</option>
                        <option value="涼拖鞋">涼拖鞋</option>
                        <option value="鞋材/鞋類周邊">鞋材/鞋類周邊</option>
                        <option value="其他女鞋">其他女鞋</option>
                    </optgroup>
                    <optgroup label="男生包包">
                        <option value="後背包">後背包</option>
                        <option value="電腦包">電腦包</option>
                        <option value="托特包">托特包</option>
                        <option value="公事包">公事包</option>
                        <option value="手拿包">手拿包</option>
                        <option value="腰包/胸包">腰包/胸包</option>
                        <option value="側/肩背包">側/肩背包</option>
                        <option value="皮夾">皮夾</option>
                        <option value="其他男生包包">其他男生包包</option>
                    </optgroup>
                    <optgroup label="手錶">
                        <option value="女錶">女錶</option>
                        <option value="男錶">男錶</option>
                        <option value="情侶對錶/手錶禮盒">情侶對錶/手錶禮盒</option>
                        <option value="手錶配件">手錶配件</option>
                        <option value="其他手錶用品">其他手錶用品</option>
                    </optgroup>
                    <optgroup label="影音">
                        <option value="耳機/耳麥/藍芽耳機">耳機/耳麥/藍芽耳機</option>
                        <option value="多媒體播放器">多媒體播放器</option>
                        <option value="麥克風">麥克風</option>
                        <option value="綜合擴大機/混音器">綜合擴大機/混音器</option>
                        <option value="音響/喇叭">音響/喇叭</option>
                        <option value="視聽線材/轉換器">視聽線材/轉換器</option>
                        <option value="其他音訊產品">其他音訊產品</option>
                    </optgroup>
                    <optgroup label="美食、伴手禮">
                        <option value="便利/即食品">便利/即食品</option>
                        <option value="休閒零食">休閒零食</option>
                        <option value="油品調味">油品調味</option>
                        <option value="烘焙必需品">烘焙必需品</option>
                        <option value="早餐麥片">早餐麥片</option>
                        <option value="飲品">飲品</option>
                        <option value="乳製品/蛋">乳製品/蛋</option>
                        <option value="生鮮食品">生鮮食品</option>
                        <option value="烘焙點心">烘焙點心</option>
                        <option value="禮盒">禮盒</option>
                        <option value="其他伴手禮">其他伴手禮</option>
                    </optgroup>
                    <optgroup label="寵物">
                        <option value="寵物食品">寵物食品</option>
                        <option value="寵物配件">寵物配件</option>
                        <option value="寵物廁所相關/貓砂">寵物廁所相關/貓砂</option>
                        <option value="寵物美容">寵物美容</option>
                        <option value="寵物服飾配件">寵物服飾配件</option>
                        <option value="寵物健康保健">寵物健康保健</option>
                        <option value="其他寵物用品">其他寵物用品</option>
                    </optgroup>
                    <optgroup label="遊戲/電玩">
                        <option value="電玩主機">電玩主機</option>
                        <option value="主機周邊">主機周邊</option>
                        <option value="主機遊戲">主機遊戲</option>
                        <option value="其他遊戲/電玩">其他遊戲/電玩</option>
                    </optgroup>
                    <optgroup label="相機/空拍機">
                        <option value="相機">相機</option>
                        <option value="安全視訊監控及系統">安全視訊監控及系統</option>
                        <option value="鏡頭">鏡頭</option>
                        <option value="鏡頭周邊配件">鏡頭周邊配件</option>
                        <option value="相機周邊配件">相機周邊配件</option>
                        <option value="相機保養配件">相機保養配件</option>
                        <option value="空拍機">空拍機</option>
                        <option value="空拍機周邊配件">空拍機周邊配件</option>
                        <option value="其他相機/空拍機">其他相機/空拍機</option>
                    </optgroup>
                    <optgroup label="居家生活">
                        <option value="居家香氛">居家香氛</option>
                        <option value="浴室">浴室</option>
                        <option value="寢具">寢具</option>
                        <option value="居家裝飾">居家裝飾</option>
                        <option value="暖暖包/冷熱水袋">暖暖包/冷熱水袋</option>
                        <option value="家具">家具</option>
                        <option value="園藝植作">園藝植作</option>
                        <option value="五金修繕/電動工具">五金修繕/電動工具</option>
                        <option value="日用品">日用品</option>
                        <option value="餐廚用具">餐廚用具</option>
                        <option value="燈具">燈具</option>
                        <option value="居安防護">居安防護</option>
                        <option value="收納">收納</option>
                        <option value="節慶/派對用品">節慶派對用品</option>
                        <option value="風水/宗教商品">風水/宗教商品</option>
                        <option value="其他居家生活用品">其他居家生活用品</option>
                    </optgroup>
                    <optgroup label="戶外與運動用品">
                        <option value="運動健身與戶外休閒">運動健身與戶外休閒</option>
                        <option value="運動鞋/戶外鞋">運動鞋/戶外鞋</option>
                        <option value="運動服飾/戶外服飾">運動服飾/戶外服飾</option>
                        <option value="運動戶外裝備及配件">運動戶外裝備及配件</option>
                        <option value="其他運動及戶外用品">其他運動及戶外用品</option>
                    </optgroup>
                    <optgroup label="文具/美術用品">
                        <option value="禮品盒/包裝材料">禮品盒/包裝材料</option>
                        <option value="文具用品/修正用品">文具用品/修正用品</option>
                        <option value="學校/辦公用品">學校/辦公用品</option>
                        <option value="美術用具">美術用具</option>
                        <option value="筆記本/紙製品">筆記本/紙製品</option>
                        <option value="信紙/信封">信紙/信封</option>
                        <option value="其他文具/美術用品">其他文具/美術用品</option>
                    </optgroup>
                    <optgroup label="愛好與收藏品">
                        <option value="收藏品">收藏品</option>
                        <option value="紀念品">紀念品</option>
                        <option value="玩具與遊戲">玩具與遊戲</option>
                        <option value="CD/DVD/藍光光碟">CD/DVD/藍光光碟</option>
                        <option value="樂器與樂器配件">樂器與樂器配件</option>
                        <option value="相簿">相簿</option>
                        <option value="刺繡作品">刺繡作品</option>
                        <option value="其他愛好與收藏品">其他愛好與收藏品</option>
                    </optgroup>
                    <optgroup label="汽/機車類">
                        <option value="汽/機車">汽/機車</option>
                        <option value="汽/機車周邊零件">汽/機車周邊零件</option>
                        <option value="保養維修工具">保養維修工具</option>
                        <option value="汽/機車美容用品">汽/機車美容用品</option>
                        <option value="油品保養">油品保養</option>
                        <option value="鑰匙圈及鑰匙套">鑰匙圈及鑰匙套</option>
                        <option value="其他汽/機車用品">其他汽/機車用品</option>
                    </optgroup>
                    <optgroup label="票卷/優惠卷">
                        <option value="活動與景點">活動與景點</option>
                        <option value="餐卷">餐卷</option>
                        <option value="禮卷">禮卷</option>
                        <option value="交通">交通</option>
                        <option value="課程/工作坊">課程/工作坊</option>
                        <option value="旅遊">旅遊</option>
                        <option value="遊戲/虛擬點數">遊戲/虛擬點數</option>
                        <option value="其他票卷">其他票卷</option>
                    </optgroup>
                    <optgroup label="課本與書籍">
                        <option value="雜誌期刊">雜誌期刊</option>
                        <option value="書籍">書籍</option>
                        <option value="電子書">電子書</option>
                        <option value="其他書籍">其他書籍</option>
                    </optgroup>
                    <optgroup label="電腦與周邊配件">
                        <option value="桌上型電腦">桌上型電腦</option>
                        <option value="電腦/筆電周邊配件">電腦周邊配件</option>
                        <option value="儲存裝置">儲存裝置</option>
                        <option value="軟體">軟體</option>
                        <option value="列印機/掃描機">列印機/掃描機</option>
                        <option value="鍵盤/滑鼠">鍵盤/滑鼠</option>
                        <option value="筆記型電腦">筆記型電腦</option>
                        <option value="其他電腦用品">其他電腦用品</option>
                    </optgroup>
                </select>
                <br><br>
                <span class="type1"> 商品圖片&nbsp:&nbsp</span>
                <input name="img01" id="img01" style="display: none;" type="file" accept=".jpg,.png" required>
                <button name="capture01" id="capture01" type="button" style="border: none; background-color: rgb(245, 245, 245);" onclick="img01.click()">
                    <img id="img1" name="img1" src="/img/upload_img.png" style="width: 200px; height: 200px; max-width: 200px; max-height: 200px;">
                </button>
                <input name="img02" id="img02" style="display: none;" type="file" accept=".jpg,.png">
                <button name="capture02" id="capture02" style="display: none; border: none; background-color: rgb(245, 245, 245);" type="button" onclick="img02.click()">
                    <img id="img2" name="img2" style="max-width: 200px; max-height: 200px;">
                </button>
                <input name="img03" id="img03" style="display: none;" type="file" accept=".jpg,.png">
                <button name="capture03" id="capture03" style="display: none; border: none; background-color: rgb(245, 245, 245);" type="button" onclick="img03.click()">
                    <img id="img3" name="img3" style="max-width: 200px; max-height: 200px;">
                </button><br><br>
                <p class="type1"> 商品描述&nbsp:&nbsp</p> <textarea id="describe" name="describe" required></textarea><br><br>
                <button class="btn btn-primary" style="font-weight: bold;"> 儲存並上架 </button><br><br>
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
</script>

<?= $this->endSection() ?>