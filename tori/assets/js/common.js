AOS.init();

var unit = 200,
    canvasList, // キャンバスの配列
    info = {}, // 全キャンバス共通の描画情報
    colorList; // 各キャンバスの色情報
if (innerWidth < 768) {
    unit = 80;
}

function update() {
    for (var canvasIndex in canvasList) {
        var canvas = canvasList[canvasIndex];
        // 各キャンバスの描画
        draw(canvas, colorList[canvasIndex]);
    }
    // 共通の描画情報の更新
    info.seconds = info.seconds + .014;
    info.t = info.seconds * Math.PI;
    // 自身の再起呼び出し
    setTimeout(update, 35);
}

/**
 * Draw animation function.
 * 
 * This function draws one frame of the animation, waits 20ms, and then calls
 * itself again.
 */
function draw(canvas, color) {
    // 対象のcanvasのコンテキストを取得
    var context = canvas.contextCache;
    // キャンバスの描画をクリア
    context.clearRect(0, 0, canvas.width, canvas.height);

    //波を描画 drawWave(canvas, color[数字（波の数を0から数えて指定）], 透過, 波の幅のzoom,波の開始位置の遅れ )
    drawWave(canvas, color[0], 1, 2, 0);
    drawWave(canvas, color[1], 0.5, 4, 0);
    drawWave(canvas, color[2], 0.3, 1.6, 0);
    drawWave(canvas, color[3], 0.2, 3, 100);
    drawWave(canvas, color[4], 0.8, 2, 0);

    drawWave(canvas, color[5], 0.4, 2, 10);
    drawWave(canvas, color[6], 0.2, 1.6, 20);
    drawWave(canvas, color[7], 0.1, 3, 30);
    drawWave(canvas, color[8], 0.7, 2, 40);

    drawWave(canvas, color[9], 0.9, 1, 20);
    drawWave(canvas, color[10], 0.8, 3.6, 30);
    drawWave(canvas, color[11], 0.7, 2, 40);
    drawWave(canvas, color[12], 0.6, 1, 50);
}

/**
 * 波を描画
 * drawWave(色, 不透明度, 波の幅のzoom, 波の開始位置の遅れ)
 */
function drawWave(canvas, color, alpha, zoom, delay) {
    var context = canvas.contextCache;
    context.strokeStyle = color; //線の色
    context.lineWidth = 1; //線の幅
    context.globalAlpha = alpha;
    context.beginPath(); //パスの開始
    drawSine(canvas, info.t / 0.5, zoom, delay);
    context.stroke(); //線
}

/**
 * Function to draw sine
 * 
 * The sine curve is drawn in 10px segments starting at the origin. 
 * drawSine(時間, 波の幅のzoom, 波の開始位置の遅れ)
 */
function drawSine(canvas, t, zoom, delay) {
    var xAxis = Math.floor(canvas.height / 2);
    var yAxis = 0;
    var context = canvas.contextCache;
    // Set the initial x and y, starting at 0,0 and translating to the origin on
    // the canvas.
    var x = t; //時間を横の位置とする
    var y = Math.sin(x) / zoom;
    context.moveTo(yAxis, unit * y + xAxis); //スタート位置にパスを置く

    // Loop to draw segments (横幅の分、波を描画)
    for (i = yAxis; i <= canvas.width + 10; i += 10) {
        x = t + (-yAxis + i) / unit / zoom;
        y = Math.sin(x - delay) / 3;
        context.lineTo(i, unit * y + xAxis);
    }
}


$(".sp-link,#spMenu .item").click(function() {
    $(".sp-link").toggleClass("change");
    if ($(".sp-link").hasClass("change")) {
        $(".sp-link p").text("CLOSE");
    } else {
        $(".sp-link p").text("MENU");
    }
    $(".c-overlay").toggleClass("change");
    $("body").toggleClass("change");
});

var retinaCheck = window.devicePixelRatio;
if (innerWidth < 768) { // Retinaディスプレイのときを分岐させている
    document.querySelectorAll('img.retina').forEach( item => {
        var value = item.getAttribute("src");
        var retinaimg = value.replace(/\.(?=(?:png|jpg|jpeg|svg)$)/i, '@2x.');
        item.setAttribute("srcset", retinaimg);
    });
}


/*
const $window = $(window);

function headerC(scrollTop) {
    var header = $("#header");
    var top = 0;
    if (window.innerWidth < 768) {
        top = 100;
    } else {
        top = 100;
    }
    if (scrollTop > top) {
        if (!header.hasClass("change")) {
            header.addClass("change")
        }
    } else {
        if (header.hasClass("change")) {
            header.removeClass("change")
        }
    }
}

$(document).ready(function() {
    $window.scroll(function() {
        var scrollTop = $(document).scrollTop()
        headerC(scrollTop);
    });
});*/


$(function () {
  var hd_size = $('#header').innerHeight(); //ヘッダーの高さを取得
  var pos = 0;
  $(window).on('scroll', function () {
    var current_pos = $(this).scrollTop(); //現在の位置を取得
    if (current_pos < pos || current_pos == 0) { //上にスクロール もしくは 最上部
      $('#header').css({ 'top': 0 }); //ヘッダーを表示
    } else {
      $('#header').css({ 'top': '-' + hd_size + 'px' }); //ヘッダーを非表示(下にスクロール)
    }
    pos = current_pos;
  });
});