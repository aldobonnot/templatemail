<?php
class Jointab{

	private $id_joint;
	private $idMail;
	private $idTemplate;
	

//======== S E T T E R S ===================

	public function setId_joint($id_joint)
	{
		if(is_int($id_joint) || $id_joint == NULL)
		{
			$this->id_joint = $id_joint;
		} else {
			trigger_error('int required : ' . $id_joint . 'de type : ' . gettype($id_joint));
		}
	}
	
	public function setIdMail ($idMail)
	{
		if(is_int($idMail))
		{
			$this->idMail = $idMail;
		} else {
			trigger_error('int required : ' . $idMail . 'de type : ' . gettype($idMail));
		}
	}
	
	public function setIdtemplate($idTemplate)
	{
		if(is_int($idTemplate))
		{
			$this->idTemplate = $idTemplate;
		} else {
			trigger_error('int required : ' . $idTemplate . 'de type : ' . gettype($idTemplate));
		}
	}
	

//======== G E T T E R S ===================

	public function getId_joint()
	{
		return $this->id_joint;
	}
	
	public function getIdMail ()
	{
		return $this->idMail;
	}
	
	public function getIdtemplate()
	{
		return $this->idTemplate;
	}
	
	
//======== M E T H O D S ===================

	public function savejt()
	{
		

			// $this->id = NULL ----> INSERT

			Global $pdo;			
			$pdo->exec("
				INSERT INTO jointemailing (id_lmjob , id_template , dateT)
				VALUES
				('".$this->idMail."', '".$this->idTemplate."', NOW())");
			
				
		
	}

	public function listenvoi()
	{
		
		Global $pdo;
                $email="thierry.navas@neuf.fr";
		$resultLtemp = $pdo->query("SELECT * FROM templatemail, lmjob, jointemailing ,domaine, cv
		WHERE jointemailing.id_lmjob=lmjob.id_lemail
               	AND jointemailing.id_template=templatemail.id_temp
                AND templatemail.iddomaine=domaine.id_dom
                AND domaine.idcv=cv.id_cv
                AND lmjob.emailcontact !='$email' 
		ORDER BY jointemailing.id_joint DESC");
		$nbrLtemp=$resultLtemp->rowCount();
		if($nbrLtemp>0){
			$resultEnv = $resultLtemp->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultEnv ="";	
			}
		
		return $resultEnv;
	
	}
        public function listenvoimail()
	{
		
		Global $pdo;
                $email="thierry.navas@neuf.fr";
		$resultLtemp = $pdo->query("SELECT * FROM templatemail, lmjob, jointemailing ,domaine, cv
		WHERE jointemailing.id_lmjob=lmjob.id_lemail
               	AND jointemailing.id_template=templatemail.id_temp
                AND templatemail.iddomaine=domaine.id_dom
                AND domaine.idcv=cv.id_cv
                AND lmjob.emailcontact !='$email' 
		ORDER BY lmjob.emailcontact DESC");
		$nbrLtemp=$resultLtemp->rowCount();
		if($nbrLtemp>0){
			$resultEnv = $resultLtemp->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultEnv ="";	
			}
		
		return $resultEnv;
	
	}
        public function listenvoimail2()
	{
		
		Global $pdo;
                $email="thierry.navas@neuf.fr";
		$resultLtemp = $pdo->query("SELECT * FROM templatemail, lmjob, jointemailing ,domaine, cv
		WHERE jointemailing.id_lmjob=lmjob.id_lemail
               	AND jointemailing.id_template=templatemail.id_temp
                AND templatemail.iddomaine=domaine.id_dom
                AND domaine.idcv=cv.id_cv
                AND lmjob.emailcontact !='$email' 
		ORDER BY lmjob.emailcontact ASC");
		$nbrLtemp=$resultLtemp->rowCount();
		if($nbrLtemp>0){
			$resultEnv = $resultLtemp->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultEnv ="";	
			}
		
		return $resultEnv;
	
	}
        public function listenvoimail3()
	{
		
		Global $pdo;
                $email="thierry.navas@neuf.fr";
		$resultLtemp = $pdo->query("SELECT * FROM templatemail, lmjob, jointemailing ,domaine, cv
		WHERE jointemailing.id_lmjob=lmjob.id_lemail
               	AND jointemailing.id_template=templatemail.id_temp
                AND templatemail.iddomaine=domaine.id_dom
                AND domaine.idcv=cv.id_cv
                AND lmjob.emailcontact !='$email' 
		ORDER BY templatemail.objet ASC");
		$nbrLtemp=$resultLtemp->rowCount();
		if($nbrLtemp>0){
			$resultEnv = $resultLtemp->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultEnv ="";	
			}
		
		return $resultEnv;
	
	}
          public function listenvoimail4()
	{
		
		Global $pdo;
                $email="thierry.navas@neuf.fr";
		$resultLtemp = $pdo->query("SELECT * FROM templatemail, lmjob, jointemailing ,domaine, cv
		WHERE jointemailing.id_lmjob=lmjob.id_lemail
               	AND jointemailing.id_template=templatemail.id_temp
                AND templatemail.iddomaine=domaine.id_dom
                AND domaine.idcv=cv.id_cv
                AND lmjob.emailcontact !='$email' 
		ORDER BY templatemail.objet DESC");
		$nbrLtemp=$resultLtemp->rowCount();
		if($nbrLtemp>0){
			$resultEnv = $resultLtemp->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultEnv ="";	
			}
		
		return $resultEnv;
	
	}
	public function listdescontact()
        {
           Global $pdo; 
           $resultLcontact = $pdo->query("SELECT * FROM  lmjob	ORDER BY id_lemail DESC");
		$nbrLcontact=$resultLcontact->rowCount();
		if($nbrLcontact>0){
			$resultEnvc = $resultLcontact->fetchAll(PDO::FETCH_ASSOC);}
			else
			{
			$resultEnvc ="";	
			}
		
		return $resultEnvc;
        }
        public function nbrmail($idMail)
        {
           Global $pdo; 
           $resultNbrmail = $pdo->query("SELECT * FROM  jointemailing WHERE id_lmjob='$idMail'");
		$nbrdemail=$resultNbrmail->rowCount();
		echo $nbrdemail;
        }
        
         public function nbrfoisTused($idTemplate)
        {
           Global $pdo; 
           $resultNbrfoist = $pdo->query("SELECT * FROM  jointemailing WHERE id_template='$idTemplate'");
		$nbrfoisTused=$resultNbrfoist->rowCount();
		echo $nbrfoisTused;
        }
}