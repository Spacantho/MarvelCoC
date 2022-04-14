<?php
    require_once "assets/php/db.php";
    // session_start();
    // if(isset($_SESSION['sess_user_id'])){
    //     if(isset($_SESSION['sess_id_role'])){
    //         if($_SESSION['sess_id_role'] == "1"){
    $user = ("SELECT * FROM users");
    $user = $db->prepare($user);
    $user->execute();
    $user = $user ->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/crud-index.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <title>Crud</title>
</head>
<body>
    <?php require_once "assets/include/navbar.php"; ?>
    <div class="box-body">
        <div class="box-crud">
            <div class="box-user">
                <div class="box_table_id">
                    <table id="table_id" class="display">
                        <thead>
                            <tr>
                                <th>ID USER</th>
                                <th>USERNAME</th>
                                <th>MAIL</th>
                                <th>PHOTO</th>
                                <th>VERIFIE</th>
                                <th>ROLE</th>
                                <th>ACTION 1</th>
                                <th>ACTION 2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user as $value){ ?>
                                <tr>
                                    <td><?php echo $value["id_users"] ?></td>
                                    <td><?php echo $value["username_users"] ?></td>
                                    <td><?php echo $value["mail_users"] ?></td>
                                    <td><?php echo $value["photo_users"] ?></td>
                                    <td><?php echo $value["verified"] ?></td>
                                    <td><?php echo $value["id_role"] ?></td>
                                    <td><a href="crud-moduser.php?id=<?php echo $value["id_users"]?>&role=<?php echo $value["id_role"]?>">modifier</a></td>
                                    <?php if($value['verified'] == 1){ ?>
                                    <td><a href="assets/php/blockuser.php?id=<?php echo $value["id_users"]?>">bloqué</a></td>
                                    <?php }else{ ?>
                                    <td><a href="assets/php/deblockuser.php?id=<?php echo $value["id_users"]?>">débloqué</a></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable( {
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: 'none',
                        target: ''
                    }
                }
            } );
        } );
    </script>
</body>
</html>
<?php 
    //     }
    // else{session_destroy();
    //      header("Location: index.php");}

    // }}
    // else{header("Location: index.php");}
?>
