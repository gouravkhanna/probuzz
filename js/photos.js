function openPhotoFancyBox() {
	 $('.fancybox1').css({"display":"block"}).hide().fadeIn("slow");
	 $('.box').slideDown("slow");
	 $('.fancybox1').css({"z-index":"999999"});
}
$(document).ready( function (){
        $('.fancybox1').css({"display":"none"});
    }
);

