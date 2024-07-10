<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アンケートフォーム</title>
</head>
<body>
    <h1>アンケート</h1>
    <form action="write.php" method="post">
        <label for="name">おなまえ:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label>どちらかというと…</label><br>
        <p></p>
        <input type="radio" id="dog" name="choice" value="犬派" required>
        <label for="dog">犬派🐶</label><br>
        <p></p>
        <input type="radio" id="cat" name="choice" value="猫派" required>
        <label for="cat">猫派🐱</label><br><br>
        
        <input type="submit" value="送信">
    </form>
    <br>
    <a href="read.php">アンケート結果を見る</a>
</body>
</html>

