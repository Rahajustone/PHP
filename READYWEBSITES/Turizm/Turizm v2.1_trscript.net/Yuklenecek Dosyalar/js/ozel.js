Cufon.replace('.solbaslik', { fontFamily: 'Ubuntu' });
Cufon.replace('.solbaslik2', { fontFamily: 'Ubuntu' });
Cufon.replace('.solmenu1', { fontFamily: 'UbuntuR' });
Cufon.replace('.solmenu2', { fontFamily: 'UbuntuR' });
Cufon.replace('.yesilbaslik', { fontFamily: 'UbuntuR' });
Cufon.replace('.mavibaslik', { fontFamily: 'UbuntuR' });
Cufon.replace('.turuncubaslik', { fontFamily: 'UbuntuR' });
Cufon.replace('.indirim', { fontFamily: 'UbuntuR' });
Cufon.replace('#menubar .telefon', { fontFamily: 'Ubuntu' });
Cufon.replace('.ubuntu', { fontFamily: 'Ubuntu' });
$(function(){
	$('form').jqTransform({imgPath:'tema/'});
});
$(document).ready(function () {
	$('#tabs').tabify();
});
$(document).ready(function () {
	$('#arama').tabify();
});
jQuery(document).ready(function(){
	jQuery("#formID").validationEngine();
});

jQuery(function(){
		$('#enddate').attr("readonly", "readonly");
		$('#startdate').attr("readonly", "readonly");
		
		Date.format = 'dd-mm-yyyy';
		$('.date-pick').datePicker();
		$('#startdate').bind(
		'dpClosed',
		function(e, selectedDates)
		{
			var d = selectedDates[0];
			if (d) {
				d = new Date(d);
				$('#enddate').dpSetStartDate(d.addDays(1).asString());
			}
		}
	);
	$('#enddate').bind(
		'dpClosed',
		function(e, selectedDates)
		{
			var d = selectedDates[0];
			if (d) {
				d = new Date(d);
				$('#startdate').dpSetEndDate(d.addDays(-1).asString());
			}
		}
	);      
});
