<?php

include_once('classes/Connection.php');

class Reservation
{

private $m_sName;
private $m_iNumberOfPeople;
private $m_sDate;
private $m_iStartHour;
private $m_iEndHour;
private $m_iRestaurantId


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

			$this->m_sDate = $p_vValue;
			break;

			case 'StartHour':

			$this->m_iStartHour = $p_vValue;
			break;

			case 'EndHour':

			$this->m_iEndHour = $p_vValue;
			break;

			case 'RestaurantId':

			$this->m_iRestaurantId = $p_vValue;
			break;
			
		}

	}

public function makeReservation()
		
		{

		$db = new Db();
		$sql = "insert into Reservation (Name, NumberOfPeople, Date, StartHour, EndHour, Restaurant_id) values('"
		 . $db->conn->real_escape_string($this->m_sName). "', " 
		 . $db->conn->real_escape_string($this->m_iNumberOfPeople) .", '" 
		 . $db->conn->real_escape_string($this->m_sDate)	 . "', "
		 . $db->conn->real_escape_string($this->m_iStartHour) . 
		 . $db->conn->real_escape_string($this->m_iRestaurantId) . ");";

		$db->conn->query($sql);

		}

}


?>