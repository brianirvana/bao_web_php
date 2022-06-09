<script>
mesk=new Array();mesk[10]="A";mesk[11]="B";mesk[12]="C";mesk[13]="D";mesk[14]="E";mesk[15]="F";A=10;B=11;C=12;D=13;E=14;F=15;let="ABCDEF";function mes(num){if(let.indexOf(num) != -1){return eval(num)};else{if(num < 10){return eval(num)};else{return mesk[num]}}};

function color(begin,einde,stappen,stap){
hh1=(mes(begin.charAt(0))*16)+mes(begin.charAt(1));
hh2=(mes(begin.charAt(2))*16)+mes(begin.charAt(3));
hh3=(mes(begin.charAt(4))*16)+mes(begin.charAt(5));
pp1=(mes(einde.charAt(0))*16)+mes(einde.charAt(1));
pp2=(mes(einde.charAt(2))*16)+mes(einde.charAt(3));
pp3=(mes(einde.charAt(4))*16)+mes(einde.charAt(5));

if(hh1 < pp1){ff1=hh1+Math.floor((pp1-hh1)/stappen*stap);
ff1=eval("\'"+mes(Math.floor(ff1/16))+"\'")+eval("\'"+mes(ff1-(Math.floor(ff1/16)*16))+"\'");}
;else{ff1=hh1-Math.floor((hh1-pp1)/stappen*stap);
ff1=eval("\'"+mes(Math.floor(ff1/16))+"\'")+eval("\'"+mes(ff1-(Math.floor(ff1/16)*16))+"\'");}
if(hh2 < pp2){ff2=hh2+Math.floor((pp2-hh2)/stappen*stap);
ff2=eval("\'"+mes(Math.floor(ff2/16))+"\'")+eval("\'"+mes(ff2-(Math.floor(ff2/16)*16))+"\'");}
;else{ff2=hh2-Math.floor((hh2-pp2)/stappen*stap);
ff2=eval("\'"+mes(Math.floor(ff2/16))+"\'")+eval("\'"+mes(ff2-(Math.floor(ff2/16)*16))+"\'");}
if(hh3 < pp3){ff3=hh3+Math.floor((pp3-hh3)/stappen*stap);
ff3=eval("\'"+mes(Math.floor(ff3/16))+"\'")+eval("\'"+mes(ff3-(Math.floor(ff3/16)*16))+"\'");}
;else{ff3=hh3-Math.floor((hh3-pp3)/stappen*stap);
ff3=eval("\'"+mes(Math.floor(ff3/16))+"\'")+eval("\'"+mes(ff3-(Math.floor(ff3/16)*16))+"\'");}
;return ff1+ff2+ff3}
bum=0;bum2=0;txt=new Array();txt[0]="";function lightf(){
for(i=0;i != Math.floor(message.length/2);i++){txt[i]=color(lightcolor1,lightcolor2,Math.floor(message.length/2),i)};
for(i=Math.floor(message.length/2);i != message.length;i++){txt[i]=color(lightcolor2,lightcolor1,Math.floor(message.length/2),(i-Math.floor(message.length/2)))};
lightf1()}
function lightf1(){txt[message.length+1]="";bum2=message.length-bum;for(i=0;i != message.length;i++){if(i+bum < message.length){txt[message.length+1]=txt[message.length+1]+"<font color='#"+txt[(i+bum)]+"'>"+message.charAt(i)+"</font>"};else{txt[message.length+1]=txt[message.length+1]+"<font color='#"+txt[i-bum2]+"'>"+message.charAt(i)+"</font>"
}};if(bum != message.length){bum++;};else{bum=0};light.innerHTML=txt[message.length+1];setTimeout("lightf1()",50)}
</script>
<script>
lightcolor1="FF0000" // use capital letters
lightcolor2="000000" // use capital letters
message="Letras con Iluminación Propia, puedes cambiar su tamaño y color"
lightf()
</script>
                      