<?php
    $ID1="P".rand(1,100);
    $unique_id=$ID1;
    $Prenom=$_REQUEST['Prenom'];
    $Nom=$_REQUEST['Nom'];
    $ID_NT=$_REQUEST['ID'];
    $Email=$_REQUEST['mail'];
    $pays=$_REQUEST['pays'];
    $ville=$_REQUEST['ville'];
    $Numero=$_REQUEST['Numero'];
    $SituationFam_Prof=$_REQUEST['SituationFam_Prof'];
    $formation=$_REQUEST['formation'];
    $dateEmb=$_REQUEST['dateEmb'];
    $Password=$_REQUEST['Nom'].'.'.$_REQUEST['Prenom'].rand(1,100);
    $date=date("l d M Y h:i:sa");
    $Gender=$_REQUEST['Gender'];
    session_start();
    $_SESSION['Email']=$Email;
    $_SESSION['Password']=$Password;
    if(isset($_REQUEST['submit'])){
        $userDB="root";
        $passwordDB="root";
        $database = new PDO("mysql:host=localhost; dbname=PFA; charset=utf8;",$userDB,$passwordDB);
        $add_user=$database->prepare("INSERT INTO Profs(ID_Prof,Prenom_Prof,Nom_Prof,NationaliteID_Prof,Email_Prof,Pays_Prof,Ville_Prof,NumPhone_Prof,SituationFam_Prof,Formation_Prof,PremierDateEmbauche,Gender_Prof,Password_Prof,PremierAccesAuSite,statusProf) 
        VALUES('$unique_id','$Prenom','$Nom','$ID_NT','$Email','$pays','$ville','$Numero','$SituationFam_Prof','$formation','$dateEmb','$Gender','$Password','$date','Active now')");
        if($add_user->execute()){
            header("refresh:1;url=FelicitationsProf.php");
        }else{header("refresh:1;url=InscriptionProf.php");}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <link rel="stylesheet" href="CSS/1.css">
    <link rel="stylesheet" href="CSS/InscriptionProf.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/0c6c59d6fe.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <link rel="icon" href="../Capture d???e??cran 2022-07-17 a?? 03.37.57.png">
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
                        <a href="Info_Etu.php"><i class="fa fa-file-archive-o icon" aria-hidden="true"></i><span class="text nav-text">Info d'??tudiants</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="Info_Prof.php"><i class="fa fa-file-archive-o icon" aria-hidden="true"></i><span class="text nav-text">Info des profs</span></a>
                    </li>
                    <li class="nav-link">
                        <a href=""><i class="fa fa-file-archive-o icon" aria-hidden="true"></i><span class="text nav-text">Contact des partenaire</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="AttestationRequis.php"><i class="fa fa-sticky-note-o icon" aria-hidden="true"></i><span class="text nav-text">Document Demand??</span></a>
                    </li>
                    <li class="nav-link">
                        <a href="Modifier.php"><i class="fa fa-cogs icon" aria-hidden="true"></i><span class="text nav-text">Modifier</span></a>
                    </li>
                </ul>
            </div>
            <div class="bottom-content">
                <li class="">
                    <a href="Logout.php"><i class='bx bx-log-out icon' ></i><span class="text nav-text">D??connecter</span></a>
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
    <section class="home home1">  
        <div class="container1">
            <div class="title1">
                <h3>Inscription Profs</h3>
                <hr>
            </div>
            <form action="" method="post" enctype="multipart/form-data" >
                <div class="name box ">
                    <div class="a">
                        <label> Prenom <span>*</span></label>
                        <input type="text" name="Prenom" >
                    </div>
                    <div class="a">
                        <label>Nom<span>*</span></label>
                        <input type="text" name="Nom" >
                    </div>
                </div>
                <div class="Iden box ">
                    <div class="a">
                        <label >ID nationalit?? <span>*</span></label>
                        <input type="text" name="ID" >
                    </div>
                    <div class="a">
                        <label >Adresse mail</label>
                        <input type="text" name="mail" >
                    </div>
                </div>
                <div class="box1">
                    <div class="b1">
                        <label >Pays de r??sidence <span>*</span></label>
                        <select  name="pays" id="pays"  tabindex="-1" aria-hidden="true">                    
                            <option value="" selected="" class="selected">-None-</option>
                            <option value="Afrique du Sud">Afrique du Sud</option>
                            <option value="Alg??rie">Alg??rie</option>
                            <option value="Angola">Angola</option>
                            <option value="B??nin">B??nin</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cameroun">Cameroun</option>
                            <option value="Cap Vert">Cap Vert</option>
                            <option value="Comores">Comores</option>
                            <option value="C??te d???Ivoire">C??te d???Ivoire</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="??gypte">??gypte</option>
                            <option value="??rythr??e">??rythr??e</option>
                            <option value="??thiopie">??thiopie</option>
                            <option value="Gabon-libreville">Gabon-libreville</option>
                            <option value="Gabon-port gentil">Gabon-port gentil</option>
                            <option value="Gambie">Gambie</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Guin??e">Guin??e</option>
                            <option value="Guin??e ??quatoriale">Guin??e ??quatoriale</option>
                            <option value="Guin??e-Bissau">Guin??e-Bissau</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Lib??ria">Lib??ria</option>
                            <option value="Libye">Libye</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Mali">Mali</option>
                            <option value="Maroc">Maroc</option>
                            <option value="Mauritanie">Mauritanie</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Ouganda">Ouganda</option>
                            <option value="R??publique Centrafricaine">R??publique Centrafricaine</option>
                            <option value="R??publique d??mocratique du Congo">R??publique d??mocratique du Congo</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Sao Tom??-et-Principe">Sao Tom??-et-Principe</option>
                            <option value="S??n??gal">S??n??gal</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Somalie">Somalie</option>
                            <option value="Soudan">Soudan</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Tanzanie">Tanzanie</option>
                            <option value="Tchad">Tchad</option>
                            <option value="Togo">Togo</option>
                            <option value="Tunisie">Tunisie</option>
                        </select>
                    </div>
                    <div class="b1">
                        <label >Ville</label>
                        <select  name="ville" tabindex="-1" aria-hidden="true">
                            <option value="" selected="" class="selected">-None-</option>
                            <option value="Agadir">Agadir</option>
                            <option value="A??t Melloul">A??t Melloul</option>
                            <option value="Al Hoceima">Al Hoceima</option>
                            <option value="Beni Mellal">Beni Mellal</option>
                            <option value="Berkane">Berkane</option>
                            <option value="Berrechid">Berrechid</option>
                            <option value="Bouskoura">Bouskoura</option>
                            <option value="Casablanca">Casablanca</option>
                            <option value="Dar Bouazza">Dar Bouazza</option>
                            <option value="Dcheira El Jihadia">Dcheira El Jihadia</option>
                            <option value="El Jadida<">El Jadida</option>
                            <option value="Errachidia">Errachidia</option>
                            <option value="Essaouira">Essaouira</option>
                            <option value="Fez">Fez</option>
                            <option value="Fquih Ben Salah">Fquih Ben Salah</option>
                            <option value="Guelmim">Guelmim</option>
                            <option value="Guercif">Guercif</option>
                            <option value="Inezgane">Inezgane</option>
                            <option value="Kelaa Des Sraghna">Kelaa Des Sraghna</option>
                            <option value="Kenitra">Kenitra</option>
                            <option value="Khemisset">Khemisset</option>
                            <option value="Khenifra">Khenifra</option>
                            <option value="Khouribga">Khouribga</option>
                            <option value="Ksar El Kebir">Ksar El Kebir</option>
                            <option value="Lahraouyine">Lahraouyine</option>
                            <option value="Larache">Larache</option>
                            <option value="Marrakesh">Marrakesh</option>
                            <option value="Meknes">Meknes</option>
                            <option value="Mohammedia">Mohammedia</option>
                            <option value="Nador">Nador</option>
                            <option value="Ouarzazate">Ouarzazate</option>
                            <option value="Ouazzane">Ouazzane</option>
                            <option value="Oued Zem">Oued Zem</option>
                            <option value="Oujda">Oujda</option>
                            <option value="Oulad Teima">Oulad Teima</option>
                            <option value="Rabat">Rabat</option>
                            <option value="Safi">Safi</option>
                            <option value="Sal??">Sal??</option>
                            <option value="Sefrou">Sefrou</option>
                            <option value="Settat">Settat</option>
                            <option value="Sidi Kacem">Sidi Kacem</option>
                            <option value="Sidi Slimane">Sidi Slimane</option>
                            <option value="Skhirat">Skhirat</option>
                            <option value="Souk El Arbaa">Souk El Arbaa</option>
                            <option value="Tan-Tan">Tan-Tan</option>
                            <option value="Tangier">Tangier</option>
                            <option value="Taourirt">Taourirt</option>
                            <option value="Taroudant">Taroudant</option>
                            <option value="Taza">Taza</option>
                            <option value="Temara">Temara</option>
                            <option value="Tetouan">Tetouan</option>
                            <option value="Tifelt">Tifelt</option>
                            <option value="Tiznit">Tiznit</option>
                            <option value="Youssoufia">Youssoufia</option>									
                        </select>
                    </div> 
                </div>
                <div class="box2">
                    <div>
                        <label>Numero de T??l??phone <span>*</span></label>
                        <input type="text" name="Numero" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="20">
                    </div>
                    <div>
                        <label>Situation familiale</label>
                        <select name="SituationFam_Prof"  tabindex="-1"  aria-hidden="true">
                            <option value="" selected="">-None-</option>
                            <option value="C??libataire">C??libataire</option>
                            <option value="li??">li??</option>
                            <option value="mari??">mari??</option>
                            <option value="Veuf">Veuf (veuve) </option>
                        </select>
                    </div>
                </div>
                <div class="box3">
                    <div>
                        <label >Formation  <span>*</span></label>
                        <select name="formation"  tabindex="-1"  aria-hidden="true">
                            <option value="" selected="">-None-</option>
                            <option value="" class="op-disabled" disabled="">MANAGEMENT ET FINANCE </option>
                            <option value="1">MANAGEMENT DES ENTREPRISES</option>
                            <option value="2">AUDIT ET CONTR??LE DE GESTION </option>
                            <option value="3">MARKETING STRAT??GIQUE ET OP??RATIONNEL</option>
                            <option value="4">MANAGEMENT DES SYS ET TECH DE INFO ET DE COMMUNICATION</option>
                            <option value="5">MANAGEMENT INDUSTRIEL ET LOGISTIQUE </option>
                            <option value="6">ING??NIERIE INDUSTRIELLE ET LOGISTIQUE </option>
                            <option value="7">ING??NIERIE DES SYST??MES INFORMATIQUES </option>
                            <option value="8">ING??NIERIE DES SYST??MES D???INFORMATION </option>
                            <option value="9">ING??NIERIE DES SYST??MES R??SEAUX ET T??L??COMS </option>
                            <option value="10">ING??NIERIE DES SYST??MES EMBARQU??S MOBILES </option>
                            <option value="11">DEVELOPPEUR BLOCKCHAIN & SMART CONTRACTS</option>
                            <option value="12" >FORMATION DATA SCIENCE </option>
                            <option value="13">FORMATION MARKETING DIGITAL </option>
                            <option value="14">FORMATION SECURITE INFORMATIQUE </option>
                        </select>
                    </div>
                    <div>
                        <label>1er Date embauche</label>
                        <input type="date" name="dateEmb" id="">
                    </div>
                </div>
                <label class="label">Gender : <span>*</span></label>
                <div class="check">
                    <div class="radio1">
                        <input type="radio" name="Gender" value="Male" >
                        <label>Male</label>
                    </div>
                    <div class="radio1">
                        <input type="radio" name="Gender" value="Femal" >
                        <label>Femal</label>
                    </div>
                    <div class="radio1">
                        <input type="radio" name="Gender" value="Autre" >
                        <label>Autre</label>
                    </div>
                </div>
                <div class="box3">
                    <input type="submit" name="submit" value="submit">
                    <input type="reset" value="reset">
                </div>
            </form>
        </div>
        <div></div>
    </section>
    <script src="JS/js.js"></script>    
</body>
</html>



    