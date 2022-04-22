<header>
    <div id="hamburger">
        <a href="index.php"><img id="logo-navbar" src="assets/images/logo/logoMarvel.png" alt="logo MCOC"></a>
            <div id="hamburger-content">
                <nav>
                    <ul id="nav-list-choice">
                        <?php
                        if(isset($_SESSION['sess_user_id'])){
                            if(isset($_SESSION['sess_id_role'])){
                                if($_SESSION['sess_id_role'] == "1"){
                        ?>
                        <li class="nav-choice"><a href="crud.php">C.R.U.D</a></li>
                        <?php
                                }}}
                        ?>
                        <li class="nav-choice"><a href="uploadvideo.php">Upload</a></li>
                        <li class="nav-choice"><a href="categories.php">Catégories</a></li>
                        <li class="nav-choice"><a href="contact.php">Contact</a></li>
                        <li class="nav-choice"><a href="profil.php?id=<?php echo $_SESSION["sess_user_id"]; ?>">Profil</a></li>
                        <li class="nav-choice"><a href="assets/php/logout.php" id="nav-btn">Deconnexion</a></li>
                    </ul>
                </nav>
            </div>
            <button id="hamburger-button"><img src="assets/images/logo/burger.png" alt="burger"></button>
            <div id="hamburger-sidebar">
                <div id="hamburger-sidebar-header"><img id="logo-sidebar" src="assets/images/logo/logoMarvel.png" alt="logo MCOC"></div>
                <div id="hamburger-sidebar-body"></div>
            </div>
        <div id="hamburger-overlay"></div>
    </div>
</header>