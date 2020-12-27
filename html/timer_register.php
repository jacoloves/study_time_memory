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
        $subject = $_POST['subject'];
        $time = $_POST['hhmmss'];

        $dsn = 'mysql:dbname=tools;host=mysql;charset=utf8';
        $user = 'root';
        $password = 'root';
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO times_record(subject,record) VALUES (?,?)';
        $stmt = $dbh->prepare($sql);
        $data[] = $subject;
        $data[] = $time;
        $stmt->execute($data);

        $dbh = null;

        print '下記条件で登録しました。<br>';
        print '科目名：';
        print $subject;
        print '<br>';
        print '時間：';
        print $time;
        print '<br>'; 
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