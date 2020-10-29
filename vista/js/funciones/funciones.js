/* obtener extencion del nombre de archivo */
function extencion() {
  console.log("hola");
  var nomArchivo = document.getElementById("nombreArchivo");
  var ext = nomArchivo.value
    .split(".")
    .pop(); /*  se divide el string por el caractér . y a partir del array generado, usaremos el ultimo item del array. */
  console.log(ext);
  var icono = document.getElementsByName("icono");
  var i = 0;
  var s;

  if (ext == "png" || ext == "jpg") {
    ext = "imagen";
  }
  while (i < icono.length) {
    console.log(icono[i].value);
    if (ext == icono[i].value) {
      s = i;
      break;
    } else {
      i++;
    }
  }
  console.log(icono[s].value);
  icono[s].checked = true;
  /* return ext; */
}


function esNumero(valor) {
  if (isNaN(valor)) {
    return false;
    // si no es numero retornar false
  }
  return true;
}
function esTexto(valor) {
  if (/[1-9]/gi.test(valor) != true) {
    /* si no hay numeros devuelve true */
    return true;
  }
  return false;
}
function tipoClave(clave) {
  var proteger = document.getElementById("proteger");
  /* var clave = document.getElementById("claveProteccion"); */
  if (proteger.checked) {
    verificarClave(clave);
  }
}
/* mostrar si la clave es débil (si son solo números o letras y longitud es menor a 6) o normal ( si contiene números y letras  y una longitud mayor a 6) o fuerte ( si tiene números, letras y símbolos y una longitud mayor a 6) */
function verificarClave(clave) { 
  var clave=clave.value;
  var longitud = clave.length;
  var respuesta=document.getElementById("tipoClave");
  if (esNumero(clave) || esTexto(clave) || longitud < 6) {
    respuesta.innerHTML="Su clave es debil";
    
  } else if (/[a-zA-Z0-9]/gi.test(clave) && longitud >= 6) {
    respuesta.innerHTML="Su clave es normal";
  } else if (/(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])/gi.test(clave)) {
    console.log("hola");
    respuesta.innerHTML="Su clave es fuerte";
  }
}


/* hash */
function stringToHash() {
  var hash = 0;
  var cantDias=document.getElementById("cantDias").value;
  var cantDescargas=document.getElementById("cantDescarga").value;
  var valor=cantDescargas+""+cantDias;
  if (cantDescargas.length == 0 || cantDias.length==0) hash=9007199254740991;

  for (i = 0; i < valor.length; i++) {
    char = valor.charCodeAt(i);
    hash = (hash << 5) - hash + char;
    hash = hash & hash;
  }
  document.getElementById("mostrarHash").innerHTML=hash;
 /*  return hash; */
}

function obtenerNombre() {
  //console.log("hola");
    document.getElementById('nombreArchivo').value = document.getElementById('miArchivo').files[0].name;
    extencion();
 
}