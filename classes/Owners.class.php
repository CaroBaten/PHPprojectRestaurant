<?php

include_once('classes/Connection.php');

class Owner
{

private $m_sFirstName;
private $m_sLastName;
private $m_sEmail;
private $m_sPhoneNumber;
private $m_sPassword;
private $m_sCity;
private $m_sStreet;
private $m_sStreetNumber;
private $m_iPostalCode;

public function __set($p_sProperty, $p_vValue)
	{
		switch ($p_sProperty)
		{

			case 'FirstName':
			
			$this->m_sFirstName = $p_vValue;
			break;

			case 'LastName':

			$this->m_sLastName = $p_vValue;
			break;

			case 'Email':

			$this->m_sEmail = $p_vValue;
			break;

			case 'PhoneNumber':

			$this->m_sPhoneNumber = $p_vValue;
			break;

			case 'Password':

			$this->m_sPassword = $p_vValue;
			break;

			case 'City':

			$this->m_sCity = $p_vValue;
			break;

			case 'Street':

			$this->m_sStreet = $p_vValue;
			break;

			case 'StreetNumber':

			$this->m_sStreetNumber = $p_vValue;
			break;

			case 'PostalCode':

			$this->m_iPostalCode = $p_vValue;
			break;
		}

	}

public function register(){

		$db = new Db();
		$sql = "insert into Owners (FirstName, LastName, Email, PhoneNumber, Password, City, Street, StreetNumber, PostalCode) values('"
		 . $db->conn->real_escape_string($this->m_sFirstName). "', '" 
		 . $db->conn->real_escape_string($this->m_sLastName) ."', '" 
		 . $db->conn->real_escape_string($this->m_sEmail)	 . "', '"
		 . $db->conn->real_escape_string($this->m_sPhoneNumber)	 . "', '"
		 . $db->conn->real_escape_string($this->m_sPassword)	 . "', '"
		 . $db->conn->real_escape_string($this->m_sCity)	 . "', '"
		 . $db->conn->real_escape_string($this->m_sStreet)	 . "', '"
		 . $db->conn->real_escape_string($this->m_sStreetNumber)	 . "', "
		 . $db->conn->real_escape_string($this->m_iPostalCode)	 . ");";

		$db->conn->query($sql);

}

}


?>