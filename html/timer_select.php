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
        // $startTime = date('Y-m-d 00:00:00');
        // $endTime = date("Y-m-d 23:59:59", strtotime('+7 day'));

        $dsn = 'mysql:dbname=tools;host=mysql;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql = "SELECT subject,record FROM times_record WHERE created_at BETWEEN ? and ?";
        $sql = "SELECT subject,record FROM times_record";
        $stmt = $dbh->prepare($sql);
        // $data[] = $startTime;
        // $data[] = $endTime;
        // $stmt->execute($data);
        $stmt->execute();

        $dbh = null;
    } catch (Exception $e) {
        print $e;
        print '<br>';
        print 'DB接続エラーです。<br>';
        exit();
    }
?>


    <table border=1>
        <tr>
            <th>科目名</th>
            <th>勉強時間</th>
        </tr>
<?php 
    while(true) {
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($rec == false) {
            break;
        }
?>
    <tr>
        <td><?php print $rec['subject']; ?></td>
        <td><?php print $rec['record']; ?></td>
    </tr>
<?php
    }
?>

    </table>

    <a href="index.php">戻る</a>
</body>
</html>