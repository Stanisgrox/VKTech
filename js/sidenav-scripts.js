function giveme(){
	$.ajax({   
		type: 'POST',
		url: 'scripts/addmoney.php',
		data: $('#addbalance').serialize()+'&'+$.param({'key': window.userdata.key}),
		success: function (data){
			console.log(data);
			if(data == 'success'){sidemenu_change('');}
		}
	});
}
function sidemenu_change(menu){
	if(!menu){$.get('fragments/sidemenu.php','login='+window.userdata.login,function(data){document.getElementById('menu').innerHTML = data;}); return}
	$.get('fragments/sidemenu'+menu+'.php',function(data){document.getElementById('menu').innerHTML = data;})}
			