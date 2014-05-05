<?php 

class Db
	{
		private $m_sHost = "db4free.net";
		private $m_sUser = "antonwijns";
		private $m_sPassword = "ThomasMore";
		private $m_sDatabase = "phpdb";
		public $conn;


		public function __construct()
		{
			$this->conn = new mysqli($this->m_sHost, $this->m_sUser, $this->m_sPassword, $this->m_sDatabase);
		}
	}

?>