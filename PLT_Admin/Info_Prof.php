<?php
    $formationary=array("1"=>"MANAGEMENT DES ENTREPRISES (BAC+3)",
                        "2"=>"AUDIT ET CONTRÔLE DE GESTION (BAC+5)",
                        "3"=>"MARKETING STRATÉGIQUE ET OPÉRATIONNEL (BAC+5))",
                        "4"=>"MANAGEMENT DES SYSTÈMES ET TECHNOLOGIES DE L’INFORMATION ET DE COMMUNICATION (BAC+5",
                        "5"=>"MANAGEMENT INDUSTRIEL ET LOGISTIQUE (MIL, BAC+3)",
                        "6"=>"INGÉNIERIE INDUSTRIELLE ET LOGISTIQUE (IIL, BAC+5)",
                        "7"=>"INGÉNIERIE DES SYSTÈMES INFORMATIQUES (BAC+3)",
                        "8"=>"INGÉNIERIE DES SYSTÈMES D’INFORMATION (BAC+5)",
                        "9"=>"INGÉNIERIE DES SYSTÈMES RÉSEAUX ET TÉLÉCOMS (BAC+5)",
                        "10"=>"INGÉNIERIE DES SYSTÈMES EMBARQUÉS MOBILES (BAC+5)",
                        "11"=>"DEVELOPPEUR BLOCKCHAIN & SMART CONTRACTS",
                        "12"=>"FORMATION DATA SCIENCE",
                        "13"=>"FORMATION MARKETING DIGITAL",
                        "14"=>"FORMATION SECURITE INFORMATIQUE",
    );
    $userDB="root";
    $passwordDB="root";
    $database = new PDO("mysql:host=localhost; dbname=PFA; charset=utf8;",$userDB,$passwordDB);
    $check=$database->prepare("SELECT * FROM Profs" );
    $check->execute();
    if(isset($_REQUEST['Delet'])){
        $ID_Prof=$_REQUEST['Delet'];
        $removeEtu=$database->prepare("DELETE FROM Profs WHERE ID_Prof=:ID_Prof");
        $removeEtu->bindParam('ID_Prof',$ID_Prof);
        $removeEtu->execute();
    }elseif(isset($_REQUEST['Update1'])){
        session_start();
        $_SESSION['ID_Prof']=$_REQUEST['Update1'];
        header("refresh:1;url=UpdateProf.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informatin d'etudiants </title>
    <link rel="stylesheet" href="CSS/Dashboard.css">
    <link rel="stylesheet" href="CSS/Note.css">
    <link rel="stylesheet" href="CSS/infoEtu.css">
    <link rel="icon" href="../Capture d’écran 2022-07-17 à 03.37.57.png">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/0c6c59d6fe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="logo">
                <a href="Dashboard.php" class="logo"><i class="fab fa-accusoft"></i><span>DEAN</span></a>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <i class='bx bx-search icon'></i><input type="text" placeholder="Chercher...">
                </li>
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="Dashboard.php"><i class='bx bx-home-alt icon' ></i><span class="text nav-text">Tableau de bord</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="Profil.php"><i class="fa fa-users icon" aria-hidden="true"></i><span class="text nav-text">Profil</span></a>
                    </li>
                    <li class="nav-link">
                        <a href=""><i class="fa fa-comment icon" aria-hidden="true"></i>  <span class="text nav-text">Message</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="InscriptionProf.php"><i class="fa fa-sticky-note-o icon" aria-hidden="true"></i><span class="text nav-text">Inscription Profs</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="Info_Etu.php"><i class="fa fa-file-archive-o icon" aria-hidden="true"></i><span class="text nav-text">Info d'étudiants</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="Info_Prof.php"><i class="fa fa-file-archive-o icon" aria-hidden="true"></i><span class="text nav-text">Info des profs</span></a>
                    </li>
                    <li class="nav-link">
                        <a href=""><i class="fa fa-file-archive-o icon" aria-hidden="true"></i><span class="text nav-text">Contact des partenaire</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="AttestationRequis.php"><i class="fa fa-sticky-note-o icon" aria-hidden="true"></i><span class="text nav-text">Document Demandé</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="Modifier.php"><i class="fa fa-cogs icon" aria-hidden="true"></i><span class="text nav-text">Modifier</span></a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="Logout.php"><i class='bx bx-log-out icon' ></i><span class="text nav-text">Déconnecter</span></a>
                </li>
                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i><i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Mode sombre</span>
                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>  
            </div>
        </div>
    </nav>
    <section class="home home4"> 
        <div class="contant">
            <h3>Informatin des Profs : </h3>
                <table class="table">
                    <tr class="titleTable">
                    <th>ID</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>NationaliteID</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>SituationFam</th>
                    <th>Formation</th>
                    <th>Gender</th>
                    <th>Pays</th>
                    <th>Ville</th>
                    <th>status</th>
                    <th>Action</th>
                    </tr>
                    <?php  
                        foreach($check as $ch):
                    ?>
                        <?php 
                            if (array_key_exists($ch['Formation_Prof'], $formationary)) {
                                $for=$formationary[$ch['Formation_Prof']];
                            }
                            if($ch['statusProf'] == 'Active now'){
                                $class="statusActiv";
                            }elseif($ch['statusProf'] == 'Offline now'){
                                $class="statusOff";
                            }
                        ?>
                        <tr class="ValueTable">
                            <td><?php echo $ch['ID_Prof'];?></td>
                            <td><?php echo $ch['Prenom_Prof'];?></td>
                            <td><?php echo $ch['Nom_Prof'];?></td>
                            <td><?php echo $ch['NationaliteID_Prof'];?></td>
                            <td><?php echo $ch['NumPhone_Prof'];?></td>
                            <td><?php echo $ch['Email_Prof'];?></td>
                            <td><?php echo $ch['SituationFam_Prof'];?></td>
                            <td><?php echo $for;?></td>
                            <td><?php echo $ch['Gender_Prof'];?></td>
                            <td><?php echo $ch['Pays_Prof'];?></td>
                            <td><?php echo $ch['Ville_Prof'];?></td>
                            <td class="<?php echo $class;?>"><?php echo $ch['statusProf'];?></td>
                            <td>
                                 <form action="" class="input">
                                    <button type="submit" class="Update"  name="Update1" value="<?php echo $ch['ID_Prof'];?>">Update</button>
                                    <button type="submit" class="Delet"  name="Delet" value="<?php echo $ch['ID_Prof'];?>">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                        endforeach;?>
                </table>

        </div>
    </section>
<script src="JS/js.js"></script>    
</body>
</html>

