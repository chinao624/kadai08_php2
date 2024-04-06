<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <title>Dog Model Resist</title>
  <link href="./css/sample.css?ver=1.0.1" rel="stylesheet">
  <script src="./js/jquery-2.1.3.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">
</head>

<body>

<!-- Head[Start] -->
<header id="header">
<h1>Dog Model Resist</h1>
     <img src="header.jpg" alt="header">
</header>

<!-- Head[End] -->

<!-- Main[Start] -->
<!-- formタグでくくっている中身だけが飛んでいく -->
<div class=container>
    <h3>Register model dog data</h3>
    <form id ="wrap" action="insert.php" method="post" enctype="multipart/form-data">

    <div>
                <label for="name" class="spacer">Name</label>
                <input type="text" name="name">
            </div>

            <div>
                <label for="breed" class="spacer">Breed</label>
                <input type="text" name="breed">
            </div>
    <div>
                <label for="birthday" class="spacer">Birthday</label>
                <select name="year">
                <?php
    // 年の選択肢
    for ($i = 2010; $i <= 2030; $i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>                
    </select>
    <span style="font-size: small";>年</span>
                <select name="month">
                <?php
    // 月の選択肢
    for ($i = 1; $i <= 12; $i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
                </select>
                <span style="font-size: small";>月</span>

                <select name="day">
                <?php
    // 日の選択肢
    for ($i = 1; $i <= 31; $i++) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
                </select>
                <span style="font-size: small";>日</span>
            </div>

            <div>
                <label for="weight" class="spacer">Weight</label>
                <select name="weight">
                <?php
    // 体重の選択肢
    for ($i = 0; $i <= 60; $i+=0.5) {
        echo "<option value='$i'>$i</option>";
    }
    ?>
                </select>
                <span style="font-size: small";>Kg</span>
            </div>

            <div>
                <label for="email" class="spacer">Owner's Email</label>
                <input id ="email" name="email" type="text" />
            </div>
        <div>
            <label for="note">Note</label><br>
        <textarea name="note" rows="4" cols="40"></textarea>
        </div>

        <div>
                <label for="image" class="spacer">Photo</label>
                <input type="file" name="image" />
            </div>

            <div class="save_btn"><button id="save" type="submit">SAVE</button></div>
    </form>
    
    <div class="tobtn"><a href="select.php" class="btn">Dog Model List</a></div>
    </div>
<!-- <form method="post" action="insert.php">
  <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前<input type="text" name="name"></label><br>
     <label>Email<input type="text" name="email"></label><br>
     <label>年齢<input type="text" name="age"></label><br>
     <label><textArea name="naiyo" rows="4" cols="40"></textArea></label><br>
   
     <input type="submit" value="送信">
    </fieldset>
</form> -->


<!-- Main[End] -->

<script src="./js/script.js"></script>
</body>
</html>
