$(function(){
    let timer;
    let timerID;
    let timerFlg = 0;

    reset_timer();

    // startButton click event
    $("#btnStart").on("click", function(){
        if (timerFlg === 0) {
            start_count();
        } else {
            stop_count();
        }
    });

    // resetButton click event
    $("#btnReset").on("click", function(){
        reset_timer();
    });

    // reset
    function reset_timer() {
        if (timerFlg === 1) {
            stop_count();
        }
        timer = 0;
        $("#counter").val("00:00:00:00");
    }

    // start
    function start_count() {
        $("#btnStart").val("stop");
        timerFlg = 1;
        timerID = setInterval(count_up, 10);
    }

    // stop
    function stop_count() {
        $("#btnStart").val("start");
        timerFlg = 0;
        clearInterval(timerID);
    }

    // 10mm sec countup
    function count_up() {
        ++timer;
        let formatTimer = counter_format(timer);
        $("#counter").val(formatTimer);
    }


    // hh:mm:ss:10mmsec display
    function counter_format(num) {
        let numZan = num;
        let hh = Math.floor(numZan / (100*60*60));
        numZan = numZan - (hh * 100 * 60 * 60);
        let mm = Math.floor(numZan / (100 * 60));
        numZan = numZan - (mm * 100 * 60);
        let ss = Math.floor(numZan / 100);
        numZan = numZan - (ss * 100);
        let ms = numZan;

        if (hh < 10) { hh = "0" + hh; }
        if (mm < 10) { mm = "0" + mm; }
        if (ss < 10) { ss = "0" + ss; }
        if (ms < 10) { ms = "0" + ms; }
        return hh + ":" + mm + ":" + ss + ":" + ms;
    }
});