<div id="admin-func">
    <a id="add-brand" href="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/addBrand">Добавить производителя</a>
    <a id="add-brand" href="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/addCollection">Добавить коллекцию</a>
</div>
<script>
    function deleteProd(id) {

    }
</script>
<div class="list" id="productions">
    <span><h1>Производители</h1></span>
<?php
$query="SELECT * FROM `brands`";
$result=mysqli_query($dbh,$query);
foreach ($result as $post){
?>
    <div class="production"><span><?=($post["name"]);?></span><button class="delete"  onclick="deleteProd(<?=$post["id"];?>)">-</button> </div>
    <?php }?>
</div>

<span><h1>Коллекции</h1></span>
<?php foreach ($result as $post){
?>
<div class="list" id="collections">

    <span><h3><?=$post["name"]?></h3></span>
    <?php
     $query="SELECT * FROM `collections` where brand=".$post["id"];
     $res1=mysqli_query($dbh,$query);
     foreach ($res1 as $collection)
     {
     ?>
    <div class="collectionInList"><span><?=$collection["name"]?></span>
        <button class="delete"  onclick="deleteProd(<?=$collection["id"];?>)">-</button> </div>
    <?php } ?>
</div>
<?php } ?>