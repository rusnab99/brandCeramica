<?php
require_once 'functions.php';
echo var_dump($_FILES);
$query="INSERT INTO `collections`( `description`, `brand`, `name`, `spec`, `tech`) VALUES ('".$_POST["desc"]."',".$_POST["brand"].",'".$_POST["name"]."','".$_POST["spec"]."','".$_POST["tech"]."')";
echo $query."<br/>";
$result=mysqli_query($dbh,$query);
$query="SELECT LAST_INSERT_ID() FROM `collections`";
$id= mysqli_insert_id($dbh);
mkdir(__DIR__.DIRECTORY_SEPARATOR."user_img".DIRECTORY_SEPARATOR.$id,0777,true);
rename($_FILES["mainPhoto"]["tmp_name"],__DIR__.DIRECTORY_SEPARATOR."user_img".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$_FILES["mainPhoto"]["name"]);
$photos="";
for ($i=0;$i<count($_FILES["photos"]["name"]);$i++)
{
    rename($_FILES["photos"]["tmp_name"][$i],__DIR__.DIRECTORY_SEPARATOR."user_img".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$_FILES["photos"]["name"][$i]);
    $photos=$photos.",user_img".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$_FILES["photos"]["name"][$i];
}
$query="UPDATE `collections`set `mainPhoto`='".mysqli_real_escape_string ($dbh,"user_img".DIRECTORY_SEPARATOR.$id.DIRECTORY_SEPARATOR.$_FILES["mainPhoto"]["name"])."', `photos`='".mysqli_escape_string($dbh,$photos)."' WHERE id=".$id;
mysqli_query($dbh,$query);
header('Location: '.$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]."/admin",true, 302);