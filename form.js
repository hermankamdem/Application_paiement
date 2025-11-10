
	function resolution() {
		a=document.f.nom.value;
		b=document.f.pnom.value;
		c=document.f.ville.value;
		d=document.f.adres.value;
		e=document.f.pass.value;
		f=document.f.date.value;
		g=document.f.s.checked;
		h=document.f.d.checked;
		i=document.f.st.checked;
	      if ((a==false)||(b==false)||(c==false)||(d==false)||(e==false)||(f==false)||(h==false)||(i==false)) {
	      	alert("veillez renseigner tous les champs avant d'envoyer");
	      } else { alert("bravo vos information sont enregistre avec succes!"); 
	               windows.location.href="index.html";
	              }

	}

function confirm() {
		document.f.cpass.value=document.f.pass.value;
}














