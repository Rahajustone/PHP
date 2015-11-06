
		function firmalar(firma)
		{
		   xmlHttp=ajax();
		   if (xmlHttp==null)
		   {
			alert ('Tarayıcınız Ajax Desteklemiyor!');
			return;
			}
				var url='sorun/firmalar.php';
				var sc ='firma='+firma;
				xmlHttp.open('POST', url, true);
				xmlHttp.setRequestHeader('If-Modified-Since', 'Sat, 1 Jan 2000 00:00:00 GMT');
				xmlHttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded; charset=UTF-8');
				xmlHttp.setRequestHeader('Content-length', sc.length);
				xmlHttp.setRequestHeader('Connection', 'close');
				
				xmlHttp.onreadystatechange=Guncellehatabildir22;
				xmlHttp.send(sc);
				return false;
				
		}
			
		function Guncellehatabildir22()
		{
			   document.getElementById('firmalar').innerHTML=xmlHttp.responseText;
		}		
		
				
		

			
		function ajax()
		{
			var xmlHttp=null;
			try
			{
				xmlHttp=new XMLHttpRequest();
			}
			catch (e)
			{
				try
				{
					xmlHttp=new ActiveXObject('Msxml2.XMLHTTP');
				}
				catch (e)
				{
					xmlHttp=new ActiveXObject('Microsoft.XMLHTTP');
				}
			}
			return xmlHttp;
		}
