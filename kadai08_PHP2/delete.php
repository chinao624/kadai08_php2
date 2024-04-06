<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

// 1. DB接続
try {
    $pdo = new PDO('mysql:dbname=kadai08;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DB接続エラー:' . $e->getMessage());
}

// 2. 削除対象の名前を取得
$name = $_GET['name'];
echo "名前が'{$name}'のDog Dataを削除しようとしています。";

// 3. データを削除
$sql = "DELETE FROM dog_data WHERE name = :name";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
if ($stmt->execute()) {
    echo "名前が'{$name}'のDog Dataを削除しました。";
} else {
    $error = $stmt->errorInfo();
    echo "名前が'{$name}'のDog Dataの削除に失敗しました。エラー: " . $error[2];
}