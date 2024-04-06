<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai08;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONNECT:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM dog_data ORDER BY indate DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute(); //true or false

//３．データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <title>Dog Model List</title>
  <link href="./css/sample.css?ver=1.0.1" rel="stylesheet"> 
  <script src="./js/jquery-2.1.3.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Economica:700" rel="stylesheet">
</head>

<body>
<!-- Head[Start] -->
<header>
<header id="header">
<h2>Dog Model List</h2>
     <img src="header2.jpg" alt="header">
</header>
<!-- Head[End] -->


<!-- Main[Start] -->

    <div class="card-container">
      <?php foreach($values as $value){ ?>
      <div class="card">
      <div class="image-container">
        <img src="data:image/png;base64,<?=base64_encode($value["image"])?>" alt="Dog Image">
    </div>
    <p><?="<strong>Name:</strong> " .$value["name"]?></p>
    <p><?="<strong>Breed:</strong> " .$value["breed"]?></p>
    <p><?="<strong>Birthday:</strong> " .$value["year"].'年' .$value["month"] .'月' .$value["day"].'日生' ?></p>
    <p><?="<strong>Weight:</strong> " .$value["weight"].'Kg'?></p>
    <p><?="<strong>Email:</strong> " .$value["email"]?></p>
    <p><?="<strong>Note:</strong> " .$value["note"]?></p>
    <p><?="<strong>Registration Date:</strong> " .$value["indate"]?></p>
    <button class="delete-btn" data-name="<?=$value['name']?>">delete</button>
    </div> 
    <?php } ?>
    
</div>
<div class="tobtn"><a href="index.php" class="btn">Dog Model Resist</a></div>
<!-- Main[End] -->

<script src="./js/script.js"></script>

</body>
</html>
