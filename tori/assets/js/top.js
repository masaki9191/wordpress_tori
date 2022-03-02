$('.intro_top_page_slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 0,
    infinite: true,
    cssEase: 'ease-in-out',
    autoplay: true,
    fade: true,
    dots: false,
    arrows: false,
    adaptiveHeight: true,
    autoplaySpeed: 6000,
    pauseOnFocus: false,
    pauseOnHover: false,
    touchMove: false
});

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

    canvasList.push(document.getElementById("waveCanvas"));
    colorList.push(['#43c0e4']);

    canvasList.push(document.getElementById("waveCanvas1"));
    colorList.push(['#43c0e4']);

    for (var canvasIndex in canvasList) {
        var canvas = canvasList[canvasIndex];
        canvas.width = document.documentElement.clientWidth;
        if (innerWidth < 768)
            canvas.height = 80;
        else
            canvas.height = 200;
        canvas.contextCache = canvas.getContext("2d");
    }
    update();
}

init();

var zIndex = 1;
var sliders = $(".cb-slideshow");
var sliderCount = $(".cb-slideshow li").length;
$(document).ready(function() {
    // $("#subBtn").click(function() {

    //     var flag = false;
    //     var container = $("#contact");
    //     var company_name = $("#company_name");
    //     var chinese_first = $("#chinese_first");
    //     var chinese_last = $("#chinese_last");
    //     var furigana_first = $("#furigana_first");
    //     var furigana_last = $("#furigana_last");
    //     var phone = $("#phone");
    //     var email = $("#email");
    //     var message = $("#message");
    //     var datas = [company_name, chinese_first, chinese_last, furigana_first, furigana_last, phone, email, message];


    //     for (let index = 0; index < datas.length; index++) {
    //         var data = datas[index];
    //         if (data.val() == "") {
    //             var element = data.closest(".form-group", container);
    //             if (!element.hasClass('invalid'))
    //                 element.addClass("invalid");
    //             flag = true;
    //         } else {
    //             data.removeClass("invalid");
    //         }
    //     }
    //     if (flag)
    //         return false;
    //     else
    //         return true;
    // });
    //setInterval(function() { animationSlider(); }, 6000);
});

// function animationSlider() {
//     var index = zIndex % sliderCount;
//     console.log(index);
//     zIndex += 1;
//     var slider = $(".cb-slideshow li:nth-child(" + index + ") span");
//     slider.get(0).style.zIndex = zIndex;
//     console.log(slider);
//     // console.log(slider);
//     // var elements = $(".cb-slideshow span");

//     //gsap.to("", { x: '100%', duration: 1 });

//     gsap.fromTo(slider, { x: '-100%' }, { x: 0, duration: 2 });

//     gsap.fromTo(slider, { scale: '1.2' }, { scale: '1', duration: 4 });

// }