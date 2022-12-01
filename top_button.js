//
// CMSUno
// Plugin Top Button
//
function f_save_topButton(){
	let c=document.getElementById("topButtonCol").value,x=new FormData();
	if(c==''||c.substr(0,1)!='#')c='#e86256';
	x.set('action','save');
	x.set('unox',Unox);
	x.set('c',c);
	fetch('uno/plugins/top_button/top_button.php',{method:'post',body:x})
	.then(r=>r.text())
	.then(r=>{
		f_alert(r);
		if(r.substr(0,1)!='!')document.getElementById("topButImg").style.backgroundColor=c;
	});
}
function f_delColor_topButton(f){
	let p=f.previousElementSibling;
	p.value='#e86256';
	p.style.background='#e86256';
}
//
colorPick("#topButton .color");
