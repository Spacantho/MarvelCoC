<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/uploadvideo.css" rel="stylesheet">
  <link rel="shortcut icon" href="/assets/favicon.ico">
    <title>Upload Video</title>
</head>
<body>
    <section id="uv_mainsection">

    <form action="assets/php/uploadtraitement.php" method="post" enctype="multipart/form-data">

    <section id="left_section">
      

  <div id="titre_et_inputtitre"> 
  <h2>TITRE</h2>
  <input class="textinput" type="text" name="videoname" placeholder="Entrez un titre ici...">
  </div>
    
    <div class="drop-zone" id="videodropfile">
    <span class="drop-zone__prompt">Glissez votre vidéo ou cliquez pour choisir</span>
    <input type="file" name="videofile" class="drop-zone__input">
    </div>

  <div id="videocopylink">
  <input class="textinput" type="text" name="videolink" placeholder="Copiez le lien ici...">
  </div>

  <script src="./src/main.js"></script>

  <div id="switch_container">
    <p>FICHIER</p>
    <label class="switch">
    <input type="checkbox" id="switchinput">
    <span class="slider round"></span>
    </label>
    <p>LIEN YOUTUBE</p>
  </div>

  <label for="cars">CATÉGORIE</label>

  <div class="sel-box" id="cars">
  <select reuired>
    <option value="Spiderman">Spiderman</option>
    <option value="Batman">Batman</option>
    <option value="cat">cat</option>
    <option value="rabbit">rabbit</option>
    <option value="hedgehog">hedgehog</option>
    <option id="newcategorie">Nouvelle Catégorie...</option>
  </select>
  

<input id="newcategoriename" class="textinput" type="text" name="newcategoriename" placeholder="Nom de la categorie...">
  </div>
  
    

  </section> 

  
  <section id="right_section">

  <main class="main_full">
	<div class="container">
      <h2 id="h2miniature">MINIATURE</h2>
	      	<div class="panel">
		        	<div class="button_outer">
			          	<div class="btn_upload">
				          	<input type="file" id="upload_file" name="miniature">
				      	Image Miniature +
			      	</div>
				<div class="processing_bar"></div>
				<div class="success_box"></div>
			</div>
		</div>
		<div class="error_msg"></div>
		<div class="uploaded_file_view" id="uploaded_view">
			<span class="file_remove">X</span>
		</div>
	</div>
</main>


<h2 id="h2desc">DESCRIPTION</h2>

<div class="wrapper">
  <div class="form-group">
    <textarea name="videodesc" rows='1' class='auto-expand' id="textarea1" placeholder="Résumé de la vidéo..."></textarea>
  </div>
  </div>
  
  <button type="submit" id="buttonuploadvideo">UPLOAD VIDEO</button>

  </section> 

  </form>

        </section>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="assets/js/uploadimg.js"></script>
        <script src="assets/js/draganddropjs.js"></script>
        <script src="assets/js/inputmultilines.js"></script>
        <script src="assets/js/switch_file_link.js"></script>

</body>
</html>