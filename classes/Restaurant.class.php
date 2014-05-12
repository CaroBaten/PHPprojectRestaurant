<?php

include_once('classes/Connection.php');


class Restaurant
{

private $m_sName;
private $m_sCity;
private $m_sStreet;
private $m_sStreetNumber;
private $m_sPhoneNumber;
private $m_iPostalCode;
private $m_iOwnerId;

public function __set($p_sProperty, $p_vValue)
	{
		switch ($p_sProperty)
		{

			case 'Name':
			
			$this->m_sName = $p_vValue;
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

			case 'PhoneNumber':

			$this->m_sPhoneNumber = $p_vValue;
			break;

			case 'PostalCode':

				if( strlen($p_vValue) != 4 ){
				throw new exception("Geef een correcte postcode");
			}

			$this->m_iPostalCode = $p_vValue;
			break;

			case 'OwnerId':

			$this->m_iOwnerId = $p_vValue;
			break;
		}

	}
public function insert()
{


$db = new Db();
		
		$sql = "insert into Restaurant (Name, City, Street, Streetnumber, Phonenumber, PostalCode, Owner_Id) values('"
		 . $db->conn->real_escape_string($this->m_sName). "', '" 
		 . $db->conn->real_escape_string($this->m_sCity) ."', '" 
		 . $db->conn->real_escape_string($this->m_sStreet)	 . "', '"
		 . $db->conn->real_escape_string($this->m_sStreetNumber)	 . "', '"
		 . $db->conn->real_escape_string($this->m_sPhoneNumber)	 . "', "
		 . $db->conn->real_escape_string($this->m_iPostalCode)	 . ", "
		 . $db->conn->real_escape_string($this->m_iOwnerId)	 . ");";

		$db->conn->query($sql);

}

public function getRestaurants($pOwnerId)
	{

	$db = new Db();
		
	$sql = "select * from Restaurant where 
	Owner_Id = '" . $pOwnerId . "';";
	$result = $db->conn->query($sql);

	$result_array=array();

	// LOOP OVER ALL RECORDS AND PUT THEM IN AN ARRAY
	while($row = $result->fetch_array())
		{
			$result_array[] = $row;
		}

	// RETURN RESULTS AS AN ARRAY
			
	return($result_array);
	}

public function getRestaurantName($p_restaurantId)
	{

	$db = new Db();
			$sql = "select Name from Restaurant where 
			RestaurantId = '" .  $db->conn->real_escape_string($p_restaurantId) ."';";
			
			$result = $db->conn->query($sql);
			$row = mysqli_fetch_row($result);
			
			return $row[0];
	}
}


?>