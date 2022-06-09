function init(){
	incluidos=init.arguments;
	for(i=0;i<incluidos.length;i++){
		cuerpo=document.body.innerHTML;
		html="<table><tr><td valign=\"top\"> <img src=\"../images/buttons/bold.gif\" width=\"21\" height=\"20\" onclick=\"instag('b','"+incluidos[i]+"')\" onmouseover=\"this.style.border='solid 1px #000000';\" onMouseOut=\"this.style.border='solid 1px #F7F7F7';\" style=\"border:solid 1px #F7F7F7;\" title=\"Negrita\">&nbsp;<img src=\"../images/buttons/underline.gif\" width=\"21\" height=\"20\" onclick=\"instag('u','"+incluidos[i]+"')\" onmouseover=\"this.style.border='solid 1px #000000';\" onmouseout=\"this.style.border='solid 1px #F7F7F7';\" style=\"border:solid 1px #F7F7F7;\" title=\"Subrayado\">&nbsp;<img src=\"../images/buttons/italic.gif\" width=\"21\" height=\"20\" onclick=\"instag('i','"+incluidos[i]+"')\" onmouseover=\"this.style.border='solid 1px #000000';\" onmouseout=\"this.style.border='solid 1px #F7F7F7';\" style=\"border:solid 1px #F7F7F7;\" title=\"Cursiva\">&nbsp;<img src=\"../images/buttons/link.gif\" width=\"21\" height=\"20\" onclick=\"inslink('"+incluidos[i]+"')\" onmouseover=\"this.style.border='solid 1px #000000';\" onmouseout=\"this.style.border='solid 1px #F7F7F7';\" style=\"border:solid 1px #F7F7F7;\" title=\"Insertar enlace\">&nbsp;<img src=\"../images/buttons/insertimage.gif\" width=\"21\" height=\"20\" onclick=\"captura_imag('"+incluidos[i]+"')\" onmouseover=\"this.style.border='solid 1px #000000';\" onmouseout=\"this.style.border='solid 1px #F7F7F7';\" style=\"border:solid 1px #F7F7F7;\" title=\"Insertar imagen\">&nbsp;<img src=\"../images/buttons/code.gif\" width=\"21\" height=\"20\"  onclick=\"instag('code','"+incluidos[i]+"')\" onmouseover=\"this.style.border='solid 1px #000000';\" onmouseout=\"this.style.border='solid 1px #F7F7F7';\" style=\"border:solid 1px #F7F7F7;\" title=\"C&oacute;digo\">&nbsp;<img src=\"../images/buttons/quote.gif\" width=\"21\" height=\"20\" onclick=\"instag('quote','"+incluidos[i]+"')\" onmouseover=\"this.style.border='solid 1px #000000';\" onmouseout=\"this.style.border='solid 1px #F7F7F7';\" style=\"border:solid 1px #F7F7F7;\" title=\"Citar\">&nbsp;</td><td valign=\"top\"><table border=\"0\" cellspacing=\"0\" cellpadding=\"0\"></table></td></tr></table><textarea name=\""+incluidos[i]+"\" cols=\"60\" rows=\"20\" id=\""+incluidos[i]+"\">";
		pat="<textarea+[^>]*"+incluidos[i]+"+[^<]+"; 	
		patron =new RegExp(pat,"gi");
		coincidencias=new Array();
		coincidencias=cuerpo.match(patron);
		for(j=0;j<coincidencias.length;j++){
			result=new Array();
			result=coincidencias[j].match(/\s+id=[^>\s]+/g);
			result[0]=result[0].split('"').join(''); 
			result[0]=result[0].split('id=').join(''); 
			result[0]=result[0].split(' ').join(''); 
			if(result[0]==incluidos[i])cuerpo2=cuerpo.split(coincidencias[j]);
		}
		document.body.innerHTML=cuerpo2[0]+html+cuerpo2[1];
	}
}
function instag(tag,campo){
	var input = document.getElementById(campo);
		if(typeof document.selection != 'undefined' && document.selection) {
			var str = document.selection.createRange().text;
			input.focus();
			var sel = document.selection.createRange();
			sel.text = "[" + tag + "]" + str + "[/" +tag+ "]";
			sel.select();
			return;
		}
		else if(typeof input.selectionStart != 'undefined'){
			var start = input.selectionStart;
			var end = input.selectionEnd;
			var insText = input.value.substring(start, end);
			input.value = input.value.substr(0, start) + '['+tag+']' + insText + '[/'+tag+']'+ input.value.substr(end);
			input.focus();
			input.setSelectionRange(start+2+tag.length+insText.length+3+tag.length,start+2+tag.length+insText.length+3+tag.length);
			return;
		}
		else{
			input.value+=' ['+tag+']Reemplace este texto[/'+tag+']';
			return;
		}
}
function inslink(campo){
	var input = document.getElementById(campo);
		if(typeof document.selection != 'undefined' && document.selection) {
			var str = document.selection.createRange().text;
			input.focus();
			var my_link = prompt("Enter URL:","http://");
				if (my_link != null) {
					if(str.length==0){
						str=my_link;
					}
					var sel = document.selection.createRange();
					sel.text = "[a href=\"" + my_link + "\"]" + str + "[/a]";
					sel.select();
					}
			return;
		}else if(typeof input.selectionStart != 'undefined'){
					var start = input.selectionStart;
					var end = input.selectionEnd;
					var insText = input.value.substring(start, end);
					var my_link = prompt("Enter URL:","http://");
						if (my_link != null) {
							if(insText.length==0){
								insText=my_link;
							}
							input.value = input.value.substr(0, start) +"[a href=\"" + my_link +"\"]" + insText  + "[/a]"+ input.value.substr(end);
							input.focus();
							input.setSelectionRange(start+11+my_link.length+insText.length+4,start+11+my_link.length+insText.length+4);
						}
			return;
		}else{
			var my_link = prompt("Ingresar URL:","http://");
			var my_text = prompt("Ingresar el texto del link:","");
			input.value+=" [a href=\"" + my_link +  "\"]" + my_text + "[/a]";
			return;
		}
}
var reng=5;
function ins_imag(emot,area){
	var input = document.getElementById(area);
		if(typeof document.selection != 'undefined' && document.selection) {
			var str =document.selection.createRange().text;
			input.focus();
			var sel =document.selection.createRange();
			sel.text = str + emot;
			sel.select();
			return;
		}
		else if(typeof input.selectionStart != 'undefined'){
			var start = input.selectionStart;
			var end = input.selectionEnd;
			var insText = input.value.substring(start, end);
			input.value = input.value.substr(0, start) + insText+ emot + input.value.substr(end);
			input.focus();
			input.setSelectionRange(end+emot.length,end+emot.length);
			return;
		}
		else{
			input.value+=emot;
			return;
		}
}
function captura_imag(area){
	var my_link = prompt("Ingresar URL:","http://");
		if (my_link != null) {
			ins_imag('[img src=\"'+my_link+'\"]',area);
		}
}