<?php
class Domaine{

	private $id_dom;
        private $idcv;
        private $slogan1;
        private $slogan2;
        private $slogan3;
	

//======== S E T T E R S ===================

	public function setId_dom($id_dom)
	{
		if(is_int($id_dom) || $id_dom == NULL)
		{
			$this->id_dom = $id_dom;
		} else {
			trigger_error('int required : ' . $id_dom . 'de type : ' . gettype($id_dom));
		}
	}
	public function setIdcv($idcv)
	{
		if(is_int($idcv) || $idcv == NULL)
		{
			$this->idcv = $idcv;
		} else {
			trigger_error('int required : ' . $idcv . 'de type : ' . gettype($idcv));
		}
	}
	
        public function setSlogan1($slogan1)
	{
		if(is_string($slogan1))
		{
			$this->slogan1 = $slogan1;
		} else {
			trigger_error('string required : ' . $slogan1 . 'de type : ' . gettype($slogan1));
		}
	}
        public function setSlogan2($slogan2)
	{
		if(is_string($slogan2))
		{
			$this->slogan2 = $slogan2;
		} else {
			trigger_error('string required : ' . $slogan2 . 'de type : ' . gettype($slogan2));
		}
	}
	public function setSlogan3($slogan3)
	{
		if(is_string($slogan3))
		{
			$this->slogan3 = $slogan3;
		} else {
			trigger_error('string required : ' . $slogan3 . 'de type : ' . gettype($slogan3));
		}
	}
	

//======== G E T T E R S ===================

	public function getId_dom()
	{
		return $this->id_dom;
	}
	public function getIdcv()
	{
		return $this->idcv;
	}
	
        public function getSlogan1()
	{
		return $this->slogan1;
	}
        public function getSlogan2()
	{
		return $this->slogan2;
	}
	public function getSlogan3()
	{
		return $this->slogan3;
	}
	
//======== M E T H O D S ===================

	public function savedom()
	{
		if($this->id_dom)
		{
			// $this->id != NULL -----> UPDATE

			Global $pdo;
			
			$pdo->exec("UPDATE domaine SET idcv = '".$this->idcv."', slogan1 ='".$this->slogan1."', slogan2 ='".$this->slogan2."', slogan3 ='".$this->slogan3."' WHERE id_dom= '".$this->id_dom."'");
                           
                        echo"<script language=\"JavaScript\" type=\"text/javascript\">";
                        echo"document.location=\"".URL."emailJOB/\";";
                        echo"</script>";
		} else {

			// $this->id = NULL ----> INSERT

			Global $pdo;			
			$pdo->exec("
				INSERT INTO domaine (idcv, slogan1, slogan2, slogan3)
				VALUES
				('".$this->idcv."', '".$this->slogan1."', '".$this->slogan2."', '".$this->slogan3."')");
			
			echo"<script language=\"JavaScript\" type=\"text/javascript\">";
                        echo"document.location=\"".URL."emailJOB/\";";
                        echo"</script>";	
		}
	}

	public function listDomaine()
	{
		
		Global $pdo;
		$resultatT = $pdo->query("SELECT * FROM domaine");
		$resultT = $resultatT->fetchALL(PDO::FETCH_ASSOC);
			
		return $resultT;
	
	}
        
        public function findomaine($id_dom)
	{
		
		Global $pdo;
		$resultatT = $pdo->query("SELECT * FROM domaine WHERE id_dom ='$id_dom'");
		$resultT = $resultatT->fetch(PDO::FETCH_ASSOC);
			
		return $resultT;
	
	}
	
}