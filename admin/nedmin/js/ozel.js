$(document).ready(function() {

	if ($('h1:first').text()!='') {

		document.title=$('h1:first').text();

	} else if ($('h2:first').text()!='') {

		document.title=$('h2:first').text();
	}
}); 


//Dinamik başlık için javascript kodu yazılıp nedmin klasörürnün içinde js klasörüne
//bu kod eklendi ve böylece hangi sayfaya gidilirse o sayfanın başlığının
//görüntülenmesi sağlandı.