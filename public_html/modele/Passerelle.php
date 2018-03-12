<?php
class Passerelle{
        static private $mysql_link;
        
	static function connexion($mysql_hote,$mysql_db,$mysql_user,$mysql_pass){
		Passerelle::$mysql_link = new PDO("mysql:host=$mysql_hote;dbname=$mysql_db", "$mysql_user", "$mysql_pass");
	}
	static function addPrescripteur($nom,$tel,$description,$mail){
            //$description = addslashes($description);
            $sql = "insert prescripteurs(pres_id, pres_nom, pres_tel, pres_description ,pres_mail) values (NULL,'$nom','$tel','$description','$mail')";
            $result = Passerelle::$mysql_link->exec($sql);           
            if ($result == 1){
                    return "SUCCESS";
            }
            else{
                    return "ERREUR";
            }
        }
        static function getPrescripteurs(){
            $prescripteurs = array();
            $sql ="select * from prescripteurs order by pres_id DESC";
            $result = Passerelle::$mysql_link->query($sql);
            while ($row = $result->fetch()) {
                            $id = $row['pres_id'];
                            $nom = $row['pres_nom'];
                            $tel = $row['pres_tel'];
                            $description = $row['pres_description'];
                            $mail = $row['pres_mail'];
                            $prescripteur = new Prescripteur($id,$nom,$tel,$description,$mail);
                            $prescripteurs[] = $prescripteur;
            }		
            return $prescripteurs;
        }

        static function getOnePrescripteur($id){
            $prescripteur = null;
            if ($id != -1) {
                    $sql ="select * from prescripteurs where pres_id=".$id;
                    $result = Passerelle::$mysql_link->query($sql);
                    if ($result){
                            $row = $result->fetch();
                            $nom = $row['pres_nom'];
                            $tel = $row['pres_tel'];
                            $description = $row['pres_description'];
                            $mail = $row['pres_mail'];
                            $prescripteur = new Prescripteur($id,$nom,$tel,$description,$mail);			
                    }
            }
            return $prescripteur;
        }
        static function delete($id){
            if ($id !=1){
                $sql = "DELETE FROM prescripteurs WHERE pres_id=".$id;
                $result = Passerelle::$mysql_link->query($sql);
        }
        }
        
      static function update($id, $nom, $tel, $description, $mail){
           
           if ($id != -1) {
               $sql = "UPDATE `prescripteurs` SET `pres_nom`='".$nom."',`pres_tel`='".$tel."',`pres_description`='".$description."',`pres_mail`='".$mail."' WHERE pres_id=".$id;
               $result = Passerelle::$mysql_link->query($sql);
               
               
           }
           
           
       }

        
}
?>
