<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);
// ↑エラー内容を表示してくれる魔法の言葉

//1. POSTデータ取得

$name = $_POST["name"];
$breed = $_POST["breed"];
$year = $_POST["year"];
$month = $_POST["month"];
$day = $_POST["day"];
$weight = $_POST["weight"];
$email = $_POST["email"];
$note = $_POST["note"];


// 画像データについての取得
$imageTmpName = $_FILES["image"]["tmp_name"]; //ファイルの一時的な場所
$imageName = $_FILES["image"]["name"];

// var_dump($_FILES);
// exit();
// var_dump($imageTmpName);
// exit();

    // $imageTmpName = $_FILES["image"]["tmp_name"];
    // ファイルのバイナリデータを取得
    $imageData = file_get_contents($imageTmpName);


// var_dump($_POST);
// exit();

//2. DB接続します　PHPの構文　これはこのまま使ってOK
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=kadai08;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DB_CONNECT:'.$e->getMessage());//エラーがでたときに、DB_CONECTと出てくる　DB接続にエラーがあるとわかる
}


//３．データ登録SQL作成
$sql = "INSERT INTO dog_data(name,breed,year,month,day,weight,email,note,image,indate)VALUES(:name,:breed,:year,:month,:day,:weight,:email,:note,:image, sysdate());";
$stmt = $pdo->prepare($sql);
// bind変数を使って、危ない文字がないかクリーニングして、VALUEに渡す
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（文字列の場合 PDO::PARAM_STR)
$stmt->bindValue(':breed', $breed, PDO::PARAM_STR);  
$stmt->bindValue(':year', $year, PDO::PARAM_INT);  
$stmt->bindValue(':month', $month, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':day', $day, PDO::PARAM_INT);  
$stmt->bindValue(':weight', $weight, PDO::PARAM_INT);  
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  
$stmt->bindValue(':note', $note, PDO::PARAM_STR);  
$stmt->bindValue(':image', $imageData, PDO::PARAM_LOB);
$status = $stmt ->execute();


// 画像の処理
//     $stmt_image = $pdo->prepare("INSERT INTO dog_data (image) VALUES (:image);");
    
// $status_image = $stmt_image->execute(); //ここで初めて実行される。 true or falseが入る



//４．データ登録処理後
if($status==false){
    // SQL実行時にエラーがある場合
    $error = $stmt->errorInfo();
    $errorMessage = "SQL_ERROR: " . $error[2];
    exit($errorMessage);
} else {
    // リダイレクト前にセッションを開始する
    session_start();
    // index.phpへリダイレクト
    header("Location: index.php");
    exit();
}


?>
