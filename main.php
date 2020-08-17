<main>
    <div id="banner">
        <div class="infoPanel" id="bannerInfo">

					<span>
						Мы с радостью готовы пердложить вам на выбор множество отличных коллекций керамогранита турециких брендов Decovita и QUA по выгодно низким ценам оптом и в розницу.
					</span>
        </div>
    </div>
<?php $query="SELECT * FROM `brands` ";
$brands=mysqli_query($dbh,$query);
foreach ($brands as $brand){
    $query="SELECT * FROM `collections` WHERE `brand`=".$brand["id"];
    $collections=mysqli_query($dbh,$query);
    //echo var_dump($collections);
    if ($collections->num_rows>0){?>
    <div class="brand">
        <div class="brandName">
            <span><?=$brand["name"]?></span>
        </div>
        <div class="catalogue">
            <?php
            foreach ($collections as $collection){?>
            <div class="collectionCard">
                <a href="brand/?collection=<?=$collection["id"]?>"><img src="<?=$collection["mainPhoto"]?>"><span class="infoPanel"><?=$collection["name"]?></span> </a>
            </div>
<?php }?>
            <div class="collectionCard getFull">
                <a href="brand/?brand=<?=$brand["id"]?>/" class="getFull">Посмотреть все коллекции <?=$brand['name']?></a>
            </div>
        </div>
    </div>
    <?php }}?>
</main>
