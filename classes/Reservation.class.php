<?php

include_once('Connection.php');

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
			if(is_numeric($p_vValue)){
			$this->m_iNumberOfPeople = $p_vValue;
			}else{
				throw new exception("Aantal personen moet een getal zijn!");
			}
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

public function getReservations($p_date)
	{
		
		$db = new Db();
		$query = "select * from Reservation where Date = '" . $db->conn->real_escape_string($p_date) . "';";
				
		$result = $db->conn->query($query);
		$result_array=array();

		// LOOP OVER ALL RECORDS AND PUT THEM IN AN ARRAY
		while($row = $result->fetch_array())
		{
			$result_array[] = $row;
		}

		// RETURN RESULTS AS AN ARRAY

		return($result_array);
	}

}




?>