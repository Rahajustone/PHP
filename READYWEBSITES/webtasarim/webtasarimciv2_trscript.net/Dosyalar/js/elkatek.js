// JavaScript Document
$(function() {
	$("#haberler").jCarouselLite({
		vertical: true,
		hoverPause:true,
		btnPrev: ".hn",
		btnNext: ".hp",
		visible: 2,
		auto:3000,
		speed:500
	});
});

$(function() {
	$("#indirim").jCarouselLite({
		vertical: false,
		hoverPause:true,
		btnPrev: ".in",
		btnNext: ".ip",
		visible: 1,
		auto:3000,
		speed:500
	});
});
$(function() {
	$("#reflist").jCarouselLite({
		vertical: false,
		hoverPause:true,
		btnPrev: ".rn",
		btnNext: ".rp",
		visible: 7,
		auto:3000,
		speed:500
	});
});

function bulten_kayit() {
    $.ajax({
        type: 'POST',
        url: 'includes/ajax/bulten.php',
        data: $('#bultens').serialize(),
        success: function(Cevap) {
            $('#bulten_sonuc').html(Cevap);
            }
    });
}

function lookup(inputString) {
	if(inputString.length == 0) {
		// Hide the suggestion box.
		$('#suggestions').hide();
	} else {
		$.post("includes/ajax/rpc.php", {queryString: ""+inputString+""}, function(data){
			if(data.length >0) {
				$('#suggestions').show();
				$('#autoSuggestionsList').html(data);
			}
		});
	}
} // lookup

function fill(thisValue) {
	$('#inputString').val(thisValue);
	setTimeout("$('#suggestions').hide();", 200);
	
}
$(document).ready(function(){

	$(".group1").colorbox({rel:'group1'});
	$(".video").colorbox();
	$(".talep").colorbox();

	$("#click").click(function(){ 
		$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("");
		return false;
	});
});

 function getFile(){
   document.getElementById("myfile").click();
 }
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
    document.myForm.submit();
    event.preventDefault();
  }	

function basvuru(id) {
	$('#bform').show("slow");
    $.ajax({
        type: 'POST',
        url: 'includes/ajax/basvuru.php',
        data: 'id='+id,
        success: function(Cevap) {
            $('#pozisyon').html(Cevap);
            }
    });
}
function adet(){
   	var veri=document.siparis.adet.value;
	return veri;
}

$(document).ready(function(){
	$("#arti").click(function(){
		
	var deger;
	deger = isNaN(parseInt(document.siparis.adet.value)) ? 0 : parseInt(document.siparis.adet.value);	
	if(deger<100)
	{
		$('input[name=adet]').val(deger+1)
	}
	
	});
});

$(document).ready(function(){
	$("#eksi").click(function(){
	var deger;
	deger = isNaN(parseInt(document.siparis.adet.value)) ? 0 : parseInt(document.siparis.adet.value);	
	if(deger>1)
	{
		$('input[name=adet]').val(deger-1)
	}
	});
});

function error_close() 
{
	$(document).ready(function(){	
	$("#result_error").hide("slow");	
	});
}

function uyari(mesaj,url) {
	$(document).ready(function(){
		var answer = confirm(mesaj)
		if (answer){ window.location.href=url; } else { return false;}
	});
}

function siparis_tamamla() 
{
	$(document).ready(function(){	
	$("#siparis_form").show("slow");	
	});
}