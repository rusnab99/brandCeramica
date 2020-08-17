<div><span>Добавление коллекции</span></div>
<div>
    <form enctype="multipart/form-data" action="<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/insertCollection.php" method="post">
    <table>
        <tr><td>
    <label for="name">Название....................</label></td><td>
            <input name="name" type="text"></td></tr>
        <tr><td>
    <label for="name">Бренд.......................</label></td><td>
            <select name="brand" >
                <?php
                $dbh = mysqli_connect($host, $user, $pswd,$database) or die("Не могу соединиться с MySQL.");
                $result= mysqli_query($dbh,"SELECT * FROM brands");

                foreach ($result as $item){?>
                <option value="<?=$item["id"];?>"><?=$item["name"];?></option>
                <?php } ?>
            </select></td></tr>
        <tr><td>
    <label for="name">Описание....................</label></td><td>
            <input name="desc" type="text"></td></tr>
        <tr><td>
    <label for="name">Технические характеристики..</label></td><td>
            <input name="spec" type="text"></td></tr>
        <tr><td>
    <label for="name">Технические особенности.....</label></td><td>
            <input name="tech" type="text"></td></tr>
        <tr><td>
    <label for="name">Фото-обложка</label></td><td>
            <input name="mainPhoto" type="file" accept=".jpg, .jpeg, .png, .bmp"></td></tr><tr><td>
    <label for="name">Фото коллекции</label></td><td>
            <input name="photos[]" type="file" multiple  accept=".jpg, .jpeg, .png, .bmp"></td></tr>
   </table>
    <input type="submit" "></form>
    <script>
        function f() {

            var request = new XMLHttpRequest();

            request.open("POST", "<?=$_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["HTTP_HOST"]?>/insertCollection.php", true);
            request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");

            request.onload = function () {
                if (this.status >= 200 && this.status < 400) {
                    document.getElementById("profile_dynamic").innerHTML=this.response;
                } else {
                    // We reached our target server, but it returned an error
                    alert("Все сломалось! Попробуйте перезагрузить страницу");
                }
            };


            let json = "type=" + document.getElementById('form-manufac').selectedIndex;

            request .send(json);
            return false;
        }
    </script>
</div>
