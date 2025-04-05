<?php
session_start();
include 'header.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fellnet</title>
    <style> 
       
body, h1, h2, h3, p, ul, li, img {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f1f1f1;
    line-height: 1.6;
}

header {
    background-color:#617e92;
    color: #fff;
    padding: 10px 0;
}

.headeri {
    max-width: 1200px;
    margin: 0 auto;
}

.headeri p {
    font-size: 24px;
}

ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    background-color: #444444;
}

ul li {
    padding: 10px 20px;
    cursor: pointer;
}

ul a {
    text-decoration: none;
    color: #fff;
}

main {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
}

.bgfoto {
    display: flex;
    margin-bottom: 20px;
}

.bgfoto input {
    flex: 1;
    padding: 10px;
}

.bgfoto button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
}

.Photos {
    background-color: #333;
    color: #fff;
    padding: 10px;
}

.fotografit {
    display: flex;
    flex-wrap: wrap;
}

.rubrika {
    width: calc(33.33% - 20px);
    margin: 10px;
    overflow: hidden;
    position: relative;
}

.rubrika img {
    width: 100%;
    height: auto;
    border: 1px solid #ccc;
}

.Creation {
    position: absolute;
    bottom: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
}

.footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

.f h2 {
    font-size: 20px;
    margin-bottom: 10px;
}

.ff {
    display: flex;
}

.ff a {
    margin-right: 10px;
}

.footermain {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.footerleft, .footercenter, .footerright {
    flex: 1;
}

.fundi {
    text-align: center;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #666;
}


@media screen and (max-width: 768px) {
    .fotografit .rubrika {
        width: calc(50% - 20px);
    }
}

        </style>
</head>
<body>
    <main>
        <div class="bgfoto">
            <input type="text" placeholder="Search" style="height: 20px;">
            <button class="butoni_bg"></button>
        </div>
        <div class="Photos">
            <h3>Fellne</h3>
        </div>
        <div class="fotografit">
            <div class="rubrika">
                <img src="img/images (19).jpeg" alt="" class="img">
                <div class="text">
                    <p>19"</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images(20).jpeg" alt="" class="img">
                <div class="text">
                    <p>20"</p>

                </div>
            </div>
            <div class="rubrika">
                <img src="img/images(21).jpeg" alt="" class="img">
                <div class="text">
                    <p>18"</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images(22).jpeg" alt="" class="img">
                <div class="text">
                    <p>22"</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images(23).jpeg" alt="" class="img">
                <div class="text">
                    <p>19"</p>
                </div>
            </div>
            <div class="rubrika">
                <img src="img/images(24).jpg" alt="" class="img">
                <div class=" text">
                    <p>22"</p>
                </div>
            </div>
    </main>
  
    </body>
</html>
<?php
include 'footer.php'
?>
