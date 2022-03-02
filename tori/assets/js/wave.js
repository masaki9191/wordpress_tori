/**
 * Init function.
 * 
 * Initialize variables and begin the animation.
 */
function init() {
    info.seconds = 0;
    info.t = 0;
    canvasList = [];
    colorList = [];
    // canvas1個めの色指定
    canvasList.push(document.getElementById("waveCanvas"));
    colorList.push(['#43c0e4']);

    // 各キャンバスの初期化
    for (var canvasIndex in canvasList) {
        var canvas = canvasList[canvasIndex];
        canvas.width = document.documentElement.clientWidth; //Canvasのwidthをウィンドウの幅に合わせる
        if (innerWidth < 768)
            canvas.height = 80;
        else
            canvas.height = 200;
        canvas.contextCache = canvas.getContext("2d");
    }
    // 共通の更新処理呼び出し
    update();
}

init();