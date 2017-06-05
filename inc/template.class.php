<?php
class Template{

	private $id_temp;
        private $iddomaine;
	private $variable;
	private $objet;
	private $titre;
	private $texte;

//======== S E T T E R S ===================

	public function setId_temp($id_temp)
	{
		if(is_int($id_temp) || $id_temp == NULL)
		{
			$this->id_temp = $id_temp;
		} else {
			trigger_error('int required : ' . $id_temp . 'de type : ' . gettype($id_temp));
		}
	}
	public function setIddomaine($iddomaine)
	{
		if(is_int($iddomaine) || $iddomaine == NULL)
		{
			$this->iddomaine = $iddomaine;
		} else {
			trigger_error('int required : ' . $idpdomaine . 'de type : ' . gettype($idpdomaine));
		}
	}
	public function setVariable($variable)
	{
		if(is_string($variable))
		{
			$this->variable = $variable;
		} else {
			trigger_error('string required : ' . $variable . 'de type : ' . gettype($variable));
		}
	}
	
	public function setObjet($objet)
	{
		if(is_string($objet))
		{
			$this->objet = $objet;
		} else {
			trigger_error('string required : ' . $objet . 'de type : ' . gettype($objet));
		}
	}
        
        
        public function setTitre($titre)
	{
		if(is_string($titre))
		{
			$this->titre = $titre;
		} else {
			trigger_error('string required : ' . $titre . 'de type : ' . gettype($titre));
		}
	}
	
	public function setTexte($texte)
	{
		if(is_string($texte))
		{
			$this->texte = $texte;
		} else {
			trigger_error('string required : ' . $texte . 'de type : ' . gettype($texte));
		}
	}

//======== G E T T E R S ===================

	public function getId_temp()
	{
		return $this->id_temp;
	}
	 public function getIddomaine()
	{
		return $this->iddomaine;
	}
	public function getVariable()
	{
		return $this->variable;
	}
	
	public function getObjet()
	{
		return $this->objet;
	}
       
       
	public function getTitre()
	{
		return $this->titre;
	}
	
	public function getTexte()
	{
		return $this->texte;
	}
//======== M E T H O D S ===================

	public function savetemp()
	{
		if($this->id_temp)
		{
			// $this->id_temp != NULL -----> UPDATE

			Global $pdo;
			
			$pdo->exec("UPDATE templatemail SET iddomaine = '".$this->iddomaine."', variable = '".$this->variable."', objet ='".$this->objet."', titre ='".$this->titre."', texte ='".$this->texte."' WHERE id_temp= '".$this->id_temp."'");
                          
		} else {
                    Global $pdo;
$verifvar = $pdo->query("SELECT * FROM templatemail WHERE variable='$this->variable' ");
		
                $nbrV=$verifvar->rowCount();
                
		if($nbrV>0){
			echo "<div class='alert alert-danger' role='alert'>Cette variable existe déjà</div>"; 
                }
			else
			{
			// $this->id_temp = NULL ----> INSERT

			Global $pdo;			
			$pdo->exec("INSERT INTO templatemail (iddomaine, variable, objet, titre, texte)
				VALUES
				('".$this->iddomaine."', '".$this->variable."', '".$this->objet."', '".$this->titre."', '".$this->texte."')");
			$lid=$pdo->lastInsertid();
                      	$resultatLt = execute_requete("SELECT fichiermail FROM templatemail, domaine, cv WHERE templatemail.id_temp='$lid' AND templatemail.iddomaine = domaine.id_dom AND domaine.idcv = cv.id_cv");
		$resultLt = $resultatLt->fetch(PDO::FETCH_ASSOC);
                $lapage=$resultLt['fichiermail'];
		echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."emailJOB/".$lapage."?etn=$lid\";";
        echo"</script>";	
			}
				
		}
	}

	public function laTemplate($id_temp)
	{
		
		Global $pdo;
		$resultatT = $pdo->query("SELECT * FROM templatemail, domaine, cv WHERE id_temp='$id_temp' AND templatemail.iddomaine = domaine.id_dom AND domaine.idcv = cv.id_cv");
		$resultT = $resultatT->fetch(PDO::FETCH_ASSOC);
			
			
		
		return $resultT;
	
	}
        public function versionweb($variable)
	{
		
		Global $pdo;
		$resultatT = $pdo->query("SELECT * FROM templatemail, domaine, cv WHERE variable='$variable' AND templatemail.iddomaine = domaine.id_dom AND domaine.idcv = cv.id_cv");
		$resultT = $resultatT->fetch(PDO::FETCH_ASSOC);
			
			
		
		return $resultT;
	
	}
	public function recupid_temp($id_temp)
	{
		
		Global $pdo;
		$resultatT2 = $pdo->query("SELECT * FROM templatemail WHERE id_temp='$id_temp' ");
		$resultT2 = $resultatT2->fetch(PDO::FETCH_ASSOC);
			
			
		
		return $resultT2;
	
	}
	
}