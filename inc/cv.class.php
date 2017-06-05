<?php
class Cv{

	private $id_cv ;
        private $nom ;
        private $fichiercv ;
        private $fichiermail ;
        private $fichierpdf ;
        private $fichierweb;
        private $titrecv ;
        private $competences ;
	

//======== S E T T E R S ===================

	public function setId_cv($id_cv)
	{
		if(is_int($id_cv) || $id_cv == NULL)
		{
			$this->id_cv = $id_cv;
		} else {
			trigger_error('int required : ' . $id_cv . 'de type : ' . gettype($id_cv));
		}
	}
	
	
        public function setNom($nom)
	{
		if(is_string($nom))
		{
			$this->nom = $nom;
		} else {
			trigger_error('string required : ' . $nom . 'de type : ' . gettype($nom));
		}
	}
        public function setFichiercv($fichiercv)
	{
		if(is_string($fichiercv))
		{
			$this->fichiercv = $fichiercv;
		} else {
			trigger_error('string required : ' . $fichiercv . 'de type : ' . gettype($fichiercv));
		}
	}
	public function setFichiermail($fichiermail)
	{
		if(is_string($fichiermail))
		{
			$this->fichiermail = $fichiermail;
		} else {
			trigger_error('string required : ' . $fichiermail . 'de type : ' . gettype($fichiermail));
		}
	}
        public function setFichierpdf($fichierpdf)
	{
		if(is_string($fichierpdf))
		{
			$this->fichierpdf = $fichierpdf;
		} else {
			trigger_error('string required : ' . $fichierpdf . 'de type : ' . gettype($fichierpdf));
		}
	}
        public function setFichierweb($fichierweb)
	{
		if(is_string($fichierweb))
		{
			$this->fichierweb = $fichierweb;
		} else {
			trigger_error('string required : ' . $fichierweb . 'de type : ' . gettype($fichierweb));
		}
	}
        public function setTitrecv($titrecv)
	{
		if(is_string($titrecv))
		{
			$this->titrecv = $titrecv;
		} else {
			trigger_error('string required : ' . $titrecv . 'de type : ' . gettype($titrecv));
		}
	}
	public function setCompetences ($competences )
	{
		if(is_string($competences ))
		{
			$this->competences = $competences ;
		} else {
			trigger_error('string required : ' . $competences  . 'de type : ' . gettype($competences ));
		}
	}

//======== G E T T E R S ===================

	public function getId_cv()
	{
		return $this->id_cv;
	}
	
        public function getNom()
	{
		return $this->nom;
	}
        public function getFichiercv()
	{
		return $this->fichiercv;
	}
	public function getFichiermail()
	{
		return $this->fichiermail;
	}
        public function getFichierpdf()
	{
		return $this->fichierpdf;
	}
         public function getFichierweb()
	{
		return $this->fichierweb;
	}
        public function getTitrecv()
	{
		return $this->titrecv;
	}
	public function getCompetences ()
	{
		return $this->competences;
	}
//======== M E T H O D S ===================

	public function savecv()
	{
		if($this->id_cv)
		{
			// $this->id_cv != NULL -----> UPDATE

			Global $pdo;
			
			$pdo->exec("UPDATE cv SET  nom ='".$this->nom."', fichiercv ='".$this->fichiercv."', fichiermail ='".$this->fichiermail."', fichierpdf ='".$this->fichierpdf."', fichierweb ='".$this->fichierweb."', titrecv ='".$this->titrecv."', competences ='".$this->competences."' WHERE id_cv= '".$this->id_cv."'");
                           
                        echo"<script language=\"JavaScript\" type=\"text/javascript\">";
                        echo"document.location=\"".URL."emailJOB/\";";
                        echo"</script>";
		} else {

			// $this->id_cv = NULL ----> INSERT

			Global $pdo;			
			$pdo->exec("
				INSERT INTO cv (nom, fichiercv, fichiermail, fichierpdf, fichierweb, titrecv, competences)
				VALUES
				( '".$this->nom."', '".$this->fichiercv."', '".$this->fichiermail."', '".$this->fichierpdf."', '".$this->fichierweb."', '".$this->titrecv."', '".$this->competences."')");
				echo"<script language=\"JavaScript\" type=\"text/javascript\">";
                                echo"document.location=\"".URL."emailJOB/\";";
                                echo"</script>";	
		}
	}

	public function listCV()
	{
		
		Global $pdo;
		$resultatT = $pdo->query("SELECT * FROM cv");
		$resultT = $resultatT->fetchALL(PDO::FETCH_ASSOC);
			
		return $resultT;
	
	}
        public function findcv($id_cv)
	{
		
		Global $pdo;
		$resultatT = $pdo->query("SELECT * FROM cv WHERE id_cv='$id_cv'");
		$resultT = $resultatT->fetch(PDO::FETCH_ASSOC);
			
		return $resultT;
	
	}
	
}