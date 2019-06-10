<?php
	//Classe responsável pela conexão com o banco de dados
	class Connection{
		var $server, $user, $pwd, $bd, $link;

		//Construtor
		public function __construct($serverv, $userv, $pwdv, $bdv){
			$this->server = $serverv;
			$this->user = $userv;
			$this->pwd = $pwdv;
			$this->bd = $bdv;
		}

		//Função de conexão com o banco de dados
		public function conectar(){
			$this->link = mysqli_connect($this->server, $this->user,
										$this->pwd, $this->bd);
			if (!$this->link){
				die ("Não foi possível realizar a conexão".mysqli_error());
			}
		}
		
		public function getLink(){
			return $this->link;
		}
	}

?>
