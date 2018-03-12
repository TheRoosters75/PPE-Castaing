<?php
class Prescripteur{
	private $id;
	private $nom;
	private $tel;
	private $descrip;
        private $mail;
	
	function __construct($id,$nom,$tel,$descrip,$mail){
		$this->id = $id;
		$this->nom = $nom;
		$this->tel = $tel;
		$this->descrip = $descrip;
                $this->mail = $mail;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function getNom(){
		return $this->nom;
	}
	
	public function getTel(){
		return $this->tel;
	}
	
	public function getDescription(){
		return $this->descrip;
	}
        
        public function getMail(){
            return $this->mail;
        }
}
?>