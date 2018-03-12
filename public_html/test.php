<?php
require('modele/dbParametres.php');
require('modele/Prescripteur.php');
require('modele/Passerelle.php');
require('vue/header.php');
?>
<div data-role="page">
    <div data-role="header">
        <h1>Répertoire des prescripteurs</h1>
    </div>
    <div data-role="content">
    
        <?php 
    Passerelle::connexion($MYSQL_HOTE,$MYSQL_DB,$MYSQL_USER,$MYSQL_PASS);
    if (isset ($_REQUEST['action'])){
            $action = $_REQUEST['action'];
    }
    else {
            $action = "";            
    }
    switch ($action) {
            case 'addnew' 	:   require('vue/addPrescripteur.php');
                                    break;
            case 'insert' 	:   $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $mail = $_REQUEST['mail'];
                                    Passerelle::addPrescripteur($nom, $tel, $description, $mail); 
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
            case 'details' 	:   $id = $_REQUEST['id'];
                                    $contact = Passerelle::getOnePrescripteur($id);
                                    require('vue/showOnePrescripteur.php');
                                    break;
            case 'update' 	:   $id = $_REQUEST['id'];
                                    $nom = $_REQUEST['nom'];
                                    $tel = $_REQUEST['tel'];
                                    $description = $_REQUEST['description'];
                                    $mail = $_REQUEST['mail'];
                                    Passerelle::update($id, $nom, $tel, $description,$mail);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
                                    break;
                                   
            case 'delete'	:   $id = $_REQUEST['id'];
 
                                    $contact = Passerelle::delete($id);
                                    $contacts = Passerelle::getPrescripteurs();
                                    require'vue/showPrescripteur.php';
                                    break;            
            default             :   $contacts = Passerelle::getPrescripteurs();
                                    require('vue/showPrescripteurs.php');
    }
    ?>
        
        
    </div>
    <div data-role="footer">
  Fièrement propulsé par wordpress
    </div>
</div>

<?php 
 require('vue/footer.php'); 
?>
</body>
</html>

