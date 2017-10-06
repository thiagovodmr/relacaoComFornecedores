var img2 = true;
var img3 = false;

setInterval(function mudar(){
	if(img2){
		document.getElementById('muda').src="imagens/img3.jpg";
		img2=false;
		img3=true;
	}
	else if(img3){
		document.getElementById("muda").src="imagens/img2.jpg";
		img3=false;
		img2=true;
	}
},1000*6);