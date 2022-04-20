//options[selectedIndex].id
var mySelect = document.getElementById('selectcategorie');
var options = mySelect.options;
 mySelect.onchange = () => {
	var id = options[options.selectedIndex].id;
	if (id == "newcategorie"){
		document.getElementById('sel-box').style.marginLeft = "7%";
		document.getElementById('newcategoriename').style.display = "flex"
		document.getElementById('uploadimagecategorie').style.display = "block"
		document.getElementById('isNewCategorie').value = "true";
	}else{
		document.getElementById('sel-box').style.marginLeft = "28%";
		document.getElementById('newcategoriename').style.display = "none"
		document.getElementById('uploadimagecategorie').style.display = "none"
		document.getElementById('isNewCategorie').value = "false";
		document.getElementById('selectedCategorieID').value = options[options.selectedIndex].id
	}
 }
 
 if (options.length == 1) {
	document.getElementById('sel-box').style.marginLeft = "7%";
	document.getElementById('newcategoriename').style.display = "flex"
	document.getElementById('uploadimagecategorie').style.display = "block"
	document.getElementById('isNewCategorie').value = "true";
	document.getElementById('selectedCategorieID').value = options[options.selectedIndex].id
 }else{
	document.getElementById('isNewCategorie').value = "false";
	document.getElementById('selectedCategorieID').value = options[options.selectedIndex].id
 }

 let fileInput = document.getElementById("file-upload-input");
let fileSelect = document.getElementsByClassName("file-upload-select")[0];
fileSelect.onclick = function() {
	fileInput.click();
}
fileInput.onchange = function() {
	let filename = fileInput.files[0].name;
	let selectName = document.getElementsByClassName("file-select-name")[0];
	selectName.innerText = filename;
}
