$(document).ready(function (e) {
	
});


//Ejemplo Fecth Api Rest 
function ApiRestExample(){
	var url = "";

	fetch(url, {
		method: "GET"
	  }).then(function (response) {
		if (response.ok) {
		  return response.json();
		} else {
		  console.log('Respuesta de red OK pero respuesta HTTP no OK');
		  return response.json();
		}
	  }).then(function (data) {
		console.log(data)
	  }).catch(function (error) {
		console.log('Hubo un problema con la petición Fetch:' + error.message);
	  });
}