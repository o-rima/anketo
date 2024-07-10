<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $choice = $_POST['choice'];
    $datetime = date('Y-m-d H:i:s');
    
    // サニタイズ処理
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $choice = htmlspecialchars($choice, ENT_QUOTES, 'UTF-8');
    $datetime = htmlspecialchars($datetime, ENT_QUOTES, 'UTF-8');

    $file = fopen("data.csv", "a");

    if ($file) {
        fputcsv($file, [$name, $choice, $datetime]);
        fclose($file);
        echo "アンケートの送信が完了しました。<br>";
    } else {
        echo "アンケートの送信に失敗しました。<br>";
    }
}
?>
<a href="index.php">戻る</a>


