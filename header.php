
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?=$title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?='https://'.$_SERVER["HTTP_HOST"]?>/style.css" >
    <script>
        function f() {
            var menu= document.getElementById('menu-mobile');
            menu.style.display='block';
            menu.style.transform='scaleY(1.0)';
            document.getElementById('open-menu').style.display='none';
            document.getElementById('close-menu').style.display='block';
        }

        function f1() {
            var menu= document.getElementById('menu-mobile');
            menu.style.display='none';
            menu.style.transform='scaleY(0.0)';
            document.getElementById('open-menu').style.display='block';
            document.getElementById('close-menu').style.display='none';
        }
    </script>
</head>
<body>
<?php if(isAdmin())echo "<div id=\"adminPanel\"><a href=\"".$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]."/admin\">Панель управления</a> 
<a href=\"".$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]."/exit\">Выход</a></div>";?>
<header>
    <div id="header">
        <a href="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/"><img id="logo" src="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/img/LogoFull.png"></a>
        <div id="menu">
            <li><a href="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/">Главная</a> </li>
            <li><a href="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/about">О нас</a> </li>
            <li><a href="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/contacts">Контакты</a> </li>
        </div>
        <div id="phone">
					<span>
						+7 (000) 000 00 00
					</span>
        </div>
        <input type="button" class="mobile-menu" id="open-menu" value="&#9776;" onclick="f()"></input>
        <input type="button" class="mobile-menu" id="close-menu" value="&#10006;" onclick="f1()"></input>
    </div>
    <div id="menu-mobile">
        <li><a href="/">Главная</a> <hr></li>
        <li><a href="about">О нас</a> <hr></li>
        <li><a href="contacts">Контакты</a> <hr></li>
		<li>+7 (000) 000 00 00</li>
    </div>

</header>