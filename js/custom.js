// slick js (products)
$(".block .products").slick({
	infinite: false,
	speed: 300,
	slidesToShow: 4,
	slidesToScroll: 4,
	responsive: [
		{
			breakpoint: 769,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 2,
			},
		},
	],
});
