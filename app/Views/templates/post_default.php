<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="/style/templates.css">

        <title>中正大學買賣交流</title>
    </head>

    
    <body>
        <div class="atop">
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color:skyblue">
                <div class="container-fluid" style="height:60px;">
                    <a class="navbar-brand" href="/PostController/post"><strong>中 正 大 學 買 賣 交 流</strong></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/PostController/post"><strong>首頁</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/PostController/myaccount"><strong>我的帳號</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/ChatController/chat"><strong>聊天訊息</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/PostController/create_type"><strong>新增商品</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="/LoginController/logout"><strong>登出</strong></a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="搜尋商品" aria-label="Search" style="height: 40px; width:500px;">
                        <button class="btn btn-primary" type="submit">🔍搜尋</button>
                    </form>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row" style="height: 100%;">
            <?= $this->renderSection('content') ?>
        </div>
    <body>
</html>