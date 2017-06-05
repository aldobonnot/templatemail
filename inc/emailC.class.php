<?php
class Contact{

	private $id_lemail;
	private $emailcontact;
	private $nomcontact;
	private $entreprise;
        private $url;
	private $activite;
        private $envoi;

//======== S E T T E R S ===================

	public function setId_lemail($id_lemail)
	{
		if(is_int($id_lemail) || $id_lemail == NULL)
		{
			$this->id_lemail = $id_lemail;
		} else {
			trigger_error('int required : ' . $id_lemail . 'de type : ' . gettype($id_lemail));
		}
	}
	
	public function setEmailcontact ($emailcontact)
	{
		if(is_string($emailcontact))
		{
			$this->emailcontact = $emailcontact;
		} else {
			trigger_error('string required : ' . $emailcontact . 'de type : ' . gettype($emailcontact));
		}
	}
	
	public function setNomcontact($nomcontact)
	{
		if(is_string($nomcontact))
		{
			$this->nomcontact = $nomcontact;
		} else {
			trigger_error('string required : ' . $nomcontact . 'de type : ' . gettype($nomcontact));
		}
	}
	
	public function setEntreprise($entreprise)
	{
		if(is_string($entreprise))
		{
			$this->entreprise = $entreprise;
		} else {
			trigger_error('string required : ' . $entreprise . 'de type : ' . gettype($entreprise));
		}
	}
        public function setUrl($url)
	{
		if(is_string($url))
		{
			$this->url = $url;
		} else {
			trigger_error('string required : ' . $url . 'de type : ' . gettype($url));
		}
	}
	
	public function setActivite ($activite )
	{
		if(is_string($activite ))
		{
			$this->activite  = $activite ;
		} else {
			trigger_error('string required : ' . $activite  . 'de type : ' . gettype($activite ));
		}
	}
        
        public function  setEnvoi ($envoi )
	{
		if(is_string($envoi ))
		{
			$this->envoi  = $envoi ;
		} else {
			trigger_error('string required : ' . $envoi  . 'de type : ' . gettype($activite ));
		}
	}

//======== G E T T E R S ===================

	public function getId_lemail()
	{
		return $this->id_lemail;
	}
	
	public function getEmailcontact ()
	{
		return $this->emailcontact;
	}
	
	public function getNomcontact()
	{
		return $this->nomcontact;
	}
	
	public function getEntreprise()
	{
		return $this->entreprise;
	}
	public function getUrl()
	{
		return $this->url;
	}
	public function getActivite ()
	{
		return $this->activite ;
	}
        
        public function getEnvoi ()
	{
		return $this->envoi ;
	}
//======== M E T H O D S ===================

	public function savelemail()
	{
		if($this->id_lemail)
		{
			// $this->id != NULL -----> UPDATE

			Global $pdo;
			
			$pdo->exec("UPDATE lmjob SET emailcontact = '".$this->emailcontact. "', nomcontact ='".$this->nomcontact."', entreprise ='".$this->entreprise."', url ='".$this->url."', activite  ='".$this->activite ."', envoi  ='".$this->envoi ."' WHERE id_lemail= '".$this->id_lemail."'");

		} else {

			// $this->id = NULL ----> INSERT

			Global $pdo;			
			$pdo->exec("
				INSERT INTO lmjob (emailcontact, nomcontact, entreprise, url, activite, envoi )
				VALUES
				('".$this->emailcontact."', '".$this->nomcontact."', '".$this->entreprise."', '".$this->url."', '".$this->activite ."', '".$this->envoi ."')");
			
			echo"<script language=\"JavaScript\" type=\"text/javascript\">";
	echo"document.location=\"".URL."emailJOB/\";";
        echo"</script>";	
		}
	}

	public function listmail()
	{
		
		Global $pdo;
		$resultatT = $pdo->query("SELECT * FROM lmjob ORDER BY id_lemail DESC");
		$resultT = $resultatT->fetchALL(PDO::FETCH_ASSOC);
			
		return $resultT;
	
	}
        
        public function findmail($id_lemail)
        {
        Global $pdo;
        $resultFc = $pdo->query("SELECT * FROM lmjob WHERE id_lemail='$id_lemail'");
            $resultFcd = $resultFc->fetch(PDO::FETCH_ASSOC);
            return $resultFcd;
        }
	
}