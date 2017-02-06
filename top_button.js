//
// CMSUno
// Plugin Top Button
//
function f_load_topButton(){
	jQuery('#topButton .color').colorPicker();
}
function f_save_topButton(){
	jQuery(document).ready(function(){
		var c=document.getElementById("topButtonCol").value;
		if(c.indexOf("(")!=-1)c=c.match(/\((.*?)\)/)[1];
		else c='';
		jQuery.post('uno/plugins/top_button/top_button.php',{'action':'save','unox':Unox,'c':c},function(r){
			f_alert(r);
			if(r.substr(0,1)!='!'){
				if(c=='')c='232,98,86';
				document.getElementById("topButImg").style.backgroundColor='rgba('+c+',.8)';
			}
		});
	});
}
function f_delColor_topButton(f){
	var g=f.parentNode.firstChild;
	jQuery(g).parent().empty().append('<input type="text" class="input color" name="topButtonCol" id="topButtonCol" style="width:100px;" /><span class="del" onclick="f_delColor_topButton(this);"></span>');
	jQuery('#topButton .color').colorPicker();
}
//
f_load_topButton();

