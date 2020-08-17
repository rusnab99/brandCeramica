<?php
if(isset($_GET["collection"]))require_once "page.php";
else
if(isset($_GET["brand"])){
    $query="SELECT * FROM `brands` WHERE id=".$_GET["brand"]."LIMIT 1";
    $brand=mysqli_query($dbh,$query);
?>
 <div class="brand">
        <div class="brandName">
            <span><?=$brand["name"]?></span>
</div>
<div class="catalogue">
    <?php $query="SELECT * FROM `collections` WHERE `brand`=".$_GET["brand"];
    $collections=mysqli_query($dbh,$query);
    foreach ($collections as $collection){?>
        <div class="collectionCard">
            <a href="brand/?collection=<?=$collection["id"]?>"><img src="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]."/".$collection["mainPhoto"]?>"><span class="infoPanel"><?=$collection["name"]?></span> </a>
        </div>
    <?php
}}
else header('Location: '.$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]."/",true, 302);
