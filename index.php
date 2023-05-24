

<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>main_page</title>
        <link rel="stylesheet" href="../styles/reset.css">
        <link rel="stylesheet" href="../styles/main_page.css">
        <link rel="stylesheet" href="../styles/slider2.css"> <!--이미지 슬라이드를 위한 css-->
        <script src="./main.js"></script> <!--임시로 만든 js-->
    </head>

    <body>  

        <?php
        session_save_path("./session");
        session_start();
        if(isset($_SESSION['ID']))
        {
            $ID = $_SESSION['ID'];
            $NICKNAME = $_SESSION['NICK'];
        }

        include_once("./header/header.php");
        ?>
        


        <section>
            <div class="out">
                <div class="inner"> <a href="#" class="start_btn">시작하기</a>  </div>   <!--계시판으로 이동하는 버튼-->                      
            </div>

            <div class="slider">
                <input type="radio" name="slide" id="slide1" checked> <!--이미지를 넘기는데 사용되는 원형 버튼들-->
                <input type="radio" name="slide" id="slide2">
                <input type="radio" name="slide" id="slide3">
                <input type="radio" name="slide" id="slide4">
                <ul id="imgholder" class="imgs">
                    <li><img src="../image/slide1.jpg"></li> <!--슬라이드에 들어갈 이미지, 나중에 샘플 이미지에서 웹을 소개하는 이미지로 교체 요망-->
                    <li><img src="../image/slide2.jpg"></li>
                    <li><img src="../image/slide3.jpg"></li>
                    <li><img src="../image/slide4.jpg"></li>
                </ul>
                <div class="bullets"> <!--다음 이미지를 불러오게 하는 label class-->
                    <label for="slide1">&nbsp;</label>
                    <label for="slide2">&nbsp;</label>
                    <label for="slide3">&nbsp;</label>
                    <label for="slide4">&nbsp;</label>
                </div>
            </div>
        </section>
        <?php include_once("./header/footer.php")?>
    </body>

</html>
