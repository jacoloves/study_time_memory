<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    try {
        $startTime = date('Y-m-d 00:00:00');
        $endTime = date("Y-m-d 23:59:59", strtotime('+7 day'));

        $dsn = 'mysql:dbname=tools;host=mysql;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT subject,record FROM times_record WHERE created_at BETWEEN ? and ?";
        $stmt = $dbh->prepare($sql);
        $data[] = $startTime;
        $data[] = $endTime;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        print "<table border=1>";
        print "<th>科目名</th>";
        print "<th>勉強時間</th>";
        print "<tr>" + $rec['subject'] + "</tr>";
        print "<tr>" + $rec['record'] + "</tr>";;
        print "</th>";
        foreach ($rec as $value)
        print "</table>";

        $dbh = null;

    } catch (Exception $e) {
        print $e;
        print '<br>';
        print 'DB接続エラーです。<br>';
        exit();
    }
?>

    <a href="index.php">戻る</a>
</body>
</html>