<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アンケート結果</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['選択肢', '数'],
                <?php
                $file = fopen("data.csv", "r");
                $dogCount = 0;
                $catCount = 0;

                if ($file) {
                    fgetcsv($file); // ヘッダーをスキップ
                    while (($data = fgetcsv($file)) !== FALSE) {
                        if ($data[1] == "犬派") {
                            $dogCount++;
                        } else if ($data[1] == "猫派") {
                            $catCount++;
                        }
                    }
                    fclose($file);
                }
                echo "['犬派', $dogCount],";
                echo "['猫派', $catCount],";
                ?>
            ]);

            var options = {
                title: 'アンケート結果',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <h1>アンケート結果</h1>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <br>
    <table border="1">
        <tr>
            <th>名前</th>
            <th>選択肢</th>
            <th>回答日時</th>
        </tr>
        <?php
        $file = fopen("data.csv", "r");

        if ($file) {
            fgetcsv($file); // ヘッダーをスキップ
            while (($data = fgetcsv($file)) !== FALSE) {
                echo "<tr>";
                foreach ($data as $cell) {
                    echo "<td>" . htmlspecialchars($cell, ENT_QUOTES, 'UTF-8') . "</td>";
                }
                echo "</tr>";
            }
            fclose($file);
        } else {
            echo "<tr><td colspan='3'>データがありません。</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="index.php">アンケートフォームに戻る</a>
</body>
</html>

