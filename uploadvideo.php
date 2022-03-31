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

    <h2>UPLOAD VIDEO</h2>

    
  <h2>TITRE</h2>
  <input type="text" id="youtubelink" placeholder="Entrez un titre ici...">
  <h2></h2>
    
    <div class="drop-zone">
    <span class="drop-zone__prompt">Glissez votre vidéo ou cliquez pour choisir</span>
    <input type="file" name="myFile" class="drop-zone__input">
  </div>

  
  <h2>OU</h2>
  <h2>UTILISER UN LIEN YOUTUBE</h2>
  <input type="text" id="youtubelink" placeholder="Copiez le lien ici">
  

  <script src="./src/main.js"></script> 

  <main class="main_full">
	<div class="container">
		<div class="panel">
			<div class="button_outer">
				<div class="btn_upload">
					<input type="file" id="upload_file" name="">
					Upload Image
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


<h2>DESCRIPTION</h2>

<div class="wrapper">
  <div class="form-group">
    <textarea rows='1' class='auto-expand' id="textarea1" placeholder="Résumé de la vidéo..."></textarea>
  </div>

  <button type="submit" class="link link--primary">UPLOAD VIDEO</a>
        </section>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="assets/js/uploadimg.js"></script>
        <script src="assets/js/draganddropjs.js"></script>
        <script src="assets/js/inputmultilines.js"></script>
</body>
</html>