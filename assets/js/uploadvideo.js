//options[selectedIndex].id
var mySelect = document.getElementById('selectcategorie');
 mySelect.onchange = () => {
	var options = mySelect.options;
	var id = options[options.selectedIndex].id;
	if (id == "newcategorie"){
		document.getElementById('sel-box').style.marginLeft = "7%";
		document.getElementById('newcategoriename').style.display = "flex"
		document.getElementById('isNewCategorie').value = "true";
	}else{
		document.getElementById('sel-box').style.marginLeft = "28%";
		document.getElementById('newcategoriename').style.display = "none"
		document.getElementById('isNewCategorie').value = "false";
	}
 }
 
 if (mySelect.options.length == 1) {
	document.getElementById('sel-box').style.marginLeft = "7%";
	document.getElementById('newcategoriename').style.display = "flex"
	document.getElementById('isNewCategorie').value = "true";
 }else{
	document.getElementById('isNewCategorie').value = "false";
 }