<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/style/login.css">

        <title>中正大學買賣交流</title>
    </head>

    
    <body>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8" align="center">
                <br><br><br>
                <p class="type0">中 正 大 學 買 賣 交 流</p>
                <form name = "accounts" action = "/LoginController/store_account" method="POST" style="width: 800px; border: 1px rgb(230, 215, 210) solid;">
                    <br>
                    <p class="type1">註冊</p>
                    <input id = "name" name = "name" type = "text" class="type2" style="height:35px; width:250px" placeholder = "姓名" required>
                    <input id = "name2" name = "name2" type = "text" class="type2" style="height:35px; width:250px" placeholder = "暱稱" required>
                    <br><br>
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
                    <input id = "phone" name = "phone" type = "text" class="type2" style="height:35px; width:250px" placeholder = "手機號碼" required>
                    <br><br>
                    <input id = "account" name = "account" type = "email" class="type2" style="height:35px; width:250px" placeholder = "帳號/電子郵件" required>
                    <input id = "birthday" name = "birthday" type = "text" class="type2" style="height:35px; width:250px" placeholder = "生日" onfocus="(this.type = 'date')" required>
                    <br><br>
                    <input id = "password" name = "password" type = "password" class="type2" style="height:35px; width:250px" placeholder = "密碼" required>
                    <span style="height:35px; width:250px; display:inline-block; text-align:left;">
                        <span class="type6">&nbsp性別&nbsp&nbsp:&nbsp&nbsp&nbsp</span>
                        <input id = "sex" name = "sex" type = "radio" style="height:15px; width:15px;" value="男" required><span class="type6">&nbsp&nbsp男&nbsp&nbsp&nbsp</span>
                        <input id = "sex" name = "sex" type = "radio" style="height:15px; width:15px;" value="女" required><span class="type6">&nbsp&nbsp女&nbsp&nbsp</span>
                    </span>
                    <br><br>
                    <a class="btn btn-primary" role="button" href="/LoginController/login" style="font-weight: bold; margin-right: 30px"> 返回 </a>
                    <button class="btn btn-primary" style="font-weight: bold;"> 註冊 </button><br><br>
                    <input type="checkbox" value="1" required>我已閱讀並同意本<a href="#" type="button" data-bs-toggle="modal" data-bs-target="#standard">網站規範</a><br><br>
                    <p class="type4">※ 註冊前請同學務必詳閱並同意「網站規範」</p>
                    <p class="type4">※ 請使用學校電子郵件註冊</p>
                </form>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="modal fade" id="standard">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">網站規範</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="text-align: left">
                        <p>
                        2021版規修訂調整
                        <br><br>
                        加入資格：中正大學學生及教職員或者中正周邊住戶店家，私訊粉專「中正買賣審核用」學生證/教職員證明以利管理員審核。
                        <br><br>
                        📌社團總則：本社團成立目的為物品交流，希望大家友善讓利交易商品，以雙方可接受的價格為主，但不可超過原價！不可超過原價！不可超過原價！（重要）<br>
                        📌原則上管理員不參與任何交易糾紛，但我們為此設立一個置頂公告，如果你有遇到惡意的買家/賣家，可以至該公告貼文下留言，提醒大家或者你周遭的朋友。<br>
                        📌版規如下，如違反版規將不告知刪文，情節嚴重者將被踢除社團
                        <br><br>
                        一、請勿張貼與買賣無關之事項，如認養動物、徵才、直銷、租屋、家教、廣告平台等，以上一切行為一律禁止（徵求人力短時間照顧寵物為合理範圍）<br>
                        二、禁止於網路販賣及贈送以下物品：隱形眼鏡及其相關衛生用品，藥品，醫療器材，菸酒，爆竹煙火，活體動物，保育類產製品，動物處方用藥，膠囊狀，錠狀食品，色情或暴力出版品，侵害他人著作權，商標，專利等權利之權物品，贓物等法定不得拍賣之物。<br>
                        三、社團中不得販賣消費（電子）點數，票券上有表示不可轉售者，也禁止販售。如有折價券、抵用券等販售金額不得高於面額之80%（若該券為消費後得到而非贈品則不在此限內）<br>
                        四、為求公平公正，所有商品皆需標上價錢，如較新或價格較高的商品請標上購入時原價，得標順序請以留言為主，如賣家有指定（全排優先、認識優先）則不在此限內，請勿私下私訊賣家，避免爭議<br>
                        五、請善用Hashtag、相簿，且禁止洗版，情節嚴重者將予以禁言處分。為了方便商品分類，如已被排定或已售出的商品請標註或刪文，避免爭議<br>
                        六、即日起團購將在團購中正進行，此社團如有揪團購的情形一律不告知刪文，（團購中正：https：//goo.g/mlfD2K）<br>
                        此外，本社團的目的是交流而非營利，故禁止販售大量手工、批發商品、自產自銷（如贈送、無營利則不在此限內）<br>
                        七、版規或以外未盡之事務，管理員保留對其解釋及處分的權力<br>
                        請大家遵守版規詳閱公告，維護好社團氣氛😁
                        <br><br>
                        📌補充說明：<br>
                        ▲ 建議買賣雙方交易時留下電話面交，除了較方便找人，也不易產生交易糾紛<br>
                        ▲ 如果是請人代PO者，亦需遵守本社規定，若違規亦會刪文，情節嚴重者將聯同原賣家一同踢除社團<br>
                        ▲發文範例<br>
                        【賣/買/送】：商品名稱<br>
                        【價錢】：原價：XXX元，想賣：XXX元（請務必標明價格）<br>
                        【地點】：皆可，指定宿舍，活中門口，圖書館門口，系館，郵寄，其他..<br>
                        【時間】：私訊or哪天之前<br>
                        【內容】：商品詳細內容、相關網頁等⋯<br>
                        【備註/其他】：使用狀況，產品來源，為何出清等等⋯<br>
                        ▲周邊店家廣告：一年只可被一人推廣一次<br>
                        ▲罰則：輕則刪文禁言，重則踢除社團。如有發現有違版規的事宜也歡迎使用檢舉功能，共同維持社團環境
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">我已閱讀本網站規範</button>
                    </div>
                </div>
            </div>
        </div>
    <body>
</html>