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

    <form id="form1" method="post" enctype="multipart/form-data">


    <section id="left_section">
      

  <div id="titre_et_inputtitre"> 
  <h2>TITRE</h2>
  <input id="videoname" class="textinput" type="text" name="videoname" placeholder="Entrez un titre ici...">
  </div>
    
    <div class="drop-zone" id="videodropfile">
    <span class="drop-zone__prompt">Glissez votre vidéo ou cliquez pour choisir</span>
    <input id="videofile" type="file" name="videofile" class="drop-zone__input">
    </div>

  <div id="videocopylink">
  <input id="videolink" class="textinput" type="text" name="videolink" placeholder="Copiez le lien ici...">
  </div>

  <script src="./src/main.js"></script>

  <div id="switch_container">
    <p>FICHIER</p>
    <label class="switch">
    <input type="checkbox" id="switchinput" name="switchinput">
    <span class="slider round" id="switchboule"></span>
    </label>
    <p>LIEN YOUTUBE</p>
  </div>

  <label for="cars">CATÉGORIE</label>

  <div id="sel-box" id="cars">
  <select reuired id="selectcategorie" name="selectcategorie">
    <?php
    include 'assets/php/db.php';
    $sql = "SELECT id_categorie, nom_categorie FROM categorie";
    $categories = $db->query($sql);
    foreach ($categories as $categorie) {
        echo "<option id=".$categorie['id_categorie']." value=".$categorie['nom_categorie'].">".$categorie['nom_categorie']."</option>";
    }
    ?>
    <option id="newcategorie">Nouvelle Catégorie...</option>
  </select>
  <input id="isNewCategorie" type="hidden" name="isNewCategorie">
  <input id="selectedCategorieID" type="hidden" name="selectedCategorieID">
  <input id="newcategoriename" class="textinput" type="text" name="newcategoriename" placeholder="Nom de la categorie...">
  </div>

  <div id="uploadimagecategorie" class="file-upload">
	<div class="file-upload-select">
		<div class="file-select-button" >Choisir Image Catégorie</div>
    <div class="file-select-name">Aucun fichier choisi...</div> 
    <input type="file" name="uploadimagecategorie" id="file-upload-input">
	</div>
  </div>
  
    

  </section> 

  
  <section id="right_section">

  <main class="main_full">
	<div class="container">
      <h2 id="h2miniature">MINIATURE</h2>
	      	<div class="panel">
		        	<div class="button_outer">
			          	<div class="btn_upload">
				          	<input id="miniature" type="file" id="upload_file" name="miniature">
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
    <textarea id="videodesc" name="videodesc" rows='1' class='auto-expand' id="textarea1" placeholder="Résumé de la vidéo..."></textarea>
  </div>
  </div>
  
  <button id="buttonuploadvideo" onclick="submitUploadVideo()">UPLOAD VIDEO</button>

  </section> 

  </form>

        </section>

        
  <div id="errors_container">
  <div id="errors">
  </div>
  <button id="btnerrors">Fermer</button>
  </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="assets/js/uploadimg.js"></script>
        <script src="assets/js/draganddropjs.js"></script>
        <script src="assets/js/inputmultilines.js"></script>
        <script src="assets/js/switch_file_link.js"></script>
        <script src="assets/js/uploadvideo.js"></script>
        <script>
        $("#form1").submit(function(e) {
            e.preventDefault();
        });

        function submitUploadVideo(){
                    // Get form
                  var form = $('#form1')[0];

          // Create an FormData object 
              var data = new FormData(form);

          // If you want to add an extra field for the FormData
              data.append("CustomField", "This is some extra data, testing");

          // disabled the submit button
              $("#btnSubmit").prop("disabled", true);

              $.ajax({
                  type: "POST",
                  enctype: 'multipart/form-data',
                  url: "assets/php/uploadtraitement.php",
                  data: data,
                  processData: false,
                  contentType: false,
                  cache: false,
                  timeout: 600000,
                  success: function (data) {

                      $("#result").text(data);
                      console.log("SUCCESS : ", data);
                      $("#btnSubmit").prop("disabled", false);
                      $("#errors").html(data);
                      $("#errors_container").css('display', 'flex')

                  },
                  error: function (e) {

                      $("#result").text(e.responseText);
                      console.log("ERROR : ", e);
                      $("#btnSubmit").prop("disabled", false);

                  }
              });
        }

        $("#btnerrors").click(function(){
                      $("#errors_container").css('display', 'none')
        })

        </script>

</body>

</html>