with(document.Productos){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && nombre.value==""){
			ok=false;
			alert("Debe escribir un nombre");
			username.focus();
		}
		if(ok && cantidad.value==""){
			ok=false;
			alert("Debe escribir una ruta imagen");
			password.focus();
		}
		if(ok && description.value==""){
			ok=false;
			alert("Debe escribir una ruta imagen");
			password.focus();
		}
		if(ok && precio.value==""){
			ok=false;
			alert("Debe escribir una ruta imagen");
			password.focus();
		}
		if(ok && imagen.value==""){
			ok=false;
			alert("Debe escribir una ruta imagen");
			password.focus();
		}
		if(ok){ submit(); }
	}
}
