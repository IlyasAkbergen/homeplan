$(".result").slick({
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 5000,
    dots: false,
    prevArrow: '<div class="result__slider--button left"><button class="slider--button"><img src="./img/prev.png"></button></div>',
	nextArrow: '<div class="result__slider--button right"><button class="slider--button"><img src="./img/next.png"></button></div>',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 1
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1
            }
        },
        {
            breakpoint: 500,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }]
})
