<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勉強時間測る</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="stopwatch.js"></script>
</head>
<body>
    <form action="timer_trans.php" method="post">
        科目: <input id="subject" name="subject" type="text" style="width:200px" value="プログラミング(PHPアプリ開発)">
        <br>
        <input id="counter" name="counter" type="text" value="00:00:00:00">
        <input id="btnStart" name="btnStart" type="button" value="start">
        <input id="btnReset" name="btnReset" type="button" value="reset">
        <br>
        <button id="submit" name="submit" type="submit">送信</button>
    </form> 
    <br>
    <a href="timer_select.php">更新</a>
</body>
</html>