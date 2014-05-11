<?php

include_once('classes/Connection.php');

class Reservation
{

private $m_sName;
private $m_iNumberOfPeople;
private $m_sDate;
private $m_iStartHour;
private $m_iEndHour;
private $m_iRestaurantId;
private $m_sPhoneNumber;


public function __set($p_sProperty, $p_vValue)
	{
		switch ($p_sProperty)
		{

			case 'Name':
			
			$this->m_sName = $p_vValue;
			break;

			case 'NumberOfPeople':

			$this->m_iNumberOfPeople = $p_vValue;
			break;

			case 'Date':
			if ($p_vValue < $this->getDateNow()){
				throw new exception("Datum mag niet in het verleden liggen");
			}
			$this->m_sDate = $p_vValue;
			break;

			case 'StartHour':

			$this->m_iStartHour = $p_vValue;
			break;

			case 'EndHour':

			if( $p_vValue<= $this->m_iStartHour ){
				throw new exception("Het einduur moet na het startuur liggen!");
			}
			$this->m_iEndHour = $p_vValue;
			break;

			case 'RestaurantId':

			$this->m_iRestaurantId = $p_vValue;
			break;
			
			case 'PhoneNumber':

			$this->m_sPhoneNumber = $p_vValue;
			break;
			
		}

	}

public function makeReservation()
		
		{

		$db = new Db();
		$sql = "insert into Reservation (Name, NumberOfPeople, Date, StartHour, EndHour, PhoneNumber, Restaurant_id) values('"
		 . $db->conn->real_escape_string($this->m_sName). "', " 
		 . $db->conn->real_escape_string($this->m_iNumberOfPeople) . ", '" 
		 . $db->conn->real_escape_string($this->m_sDate)	 . "', '"
		 . $db->conn->real_escape_string($this->m_iStartHour) . "', '"
		 . $db->conn->real_escape_string($this->m_iEndHour) . "', '"
		 . $db->conn->real_escape_string($this->m_sPhoneNumber) . "', "
		 . $db->conn->real_escape_string($this->m_iRestaurantId) . ");";

		$db->conn->query($sql);
		echo $sql;
		}

public function getDateNow()
{

$dtz = new DateTimeZone("Europe/Brussels"); 
$now = new DateTime(date("Y-m-d"), $dtz);

return $now->format("Y-m-d");

}

}




?>