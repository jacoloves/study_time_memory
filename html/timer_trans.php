<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勉強時間測る</title>
</head>
<body>
<?php
    $subject = $_POST['subject'];
    $counter = $_POST['counter'];

    $hh = intval(substr($counter, 0, 2));
    $mm = intval(substr($counter, 3, 5));
    $ss = intval(substr($counter, 6, 8));

    $hhmmss = sprintf("%d:%d:%d", $hh, $mm, $ss);

    if ($subject == '') {
        print '科目名が入力されていません。<br>';
        print '<form>';
        print '<input type="button" onclick="history.back()" value="戻る">';
        print '</form>';
    } else {
        print '下記条件で登録してもよろしいですか？<br>';
        print '科目名：';
        print $subject;
        print '<br>';
        print '時間：';
        print $hhmmss;
        print '<br>';
    }

    print '<form method="post" action="timer_register.php">';
    print '<input type="hidden" name="subject" value="'.$subject.'">';
    print '<input type="hidden" name="hhmmss" value="'.$hhmmss.'">';
    print '<br>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
?>
</body>
</html>