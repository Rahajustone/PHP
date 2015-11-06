function sepetekle(urun,adet,baslik,kat) {
	
		$('.sepet').hide();
		$('#loader').show();
		document.getElementById("loader").innerHTML = '<img src="images/loader.gif" />';
		
		var productX 		= $("#productImage").offset().left;
		var productY 		= $("#productImage").offset().top;

		var basketX 		= $("#basketTitleWrap").offset().left;
		var basketY 		= $("#basketTitleWrap").offset().top;
			
		var gotoX 			= basketX - productX;
		var gotoY 			= basketY - productY;
		
		var newImageWidth 	= $("#productImage").width() / 3;
		var newImageHeight	= $("#productImage").height() / 3;
		
		$("#productImage")
		.clone()
		.prependTo("#productImage")
		.css({'position' : 'absolute'})
		.animate({opacity: 1}, 100 )
		.addClass("delete")
		.animate({opacity: 0.0, marginLeft: gotoX, marginTop: gotoY, width: newImageWidth, height: newImageHeight}, 1500, function() {
			
			$('#loader').hide();
			$('.sepet').show();	
			$(".delete").remove();
			document.getElementById("sepetekle").innerHTML = baslik;
			

		
			$.ajax({  
				type: "POST",  
				url: "includes/ajax/sepet.php",  
				data: { urunID:urun,toplam:adet,kat:kat },
				success: function(theResponse) {
					
					if( $("#urunID").length > 0){
						$("#urunID").animate({ opacity: 0 }, 500);
						$("#urunID").before(theResponse).remove();
						$("#urunID").animate({ opacity: 0 }, 500);
						$("#urunID").animate({ opacity: 1 }, 500);
						
					} else {
						$("#basketItemsWrap").html(theResponse);
						$("#basketItemsWrap").hide();
						$("#basketItemsWrap").show("slow");  		
					}
					
				}  
			});  
		
	});
		
}
	
	



