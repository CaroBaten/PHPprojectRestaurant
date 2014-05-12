<?php

include_once('Connection.php');

class Table
{

private $m_sName;
private $m_iNumberOfSeats;
private $m_iRestaurantId;
private $m_iReservationId;


public function __set($p_sProperty, $p_vValue)
	{
		switch ($p_sProperty)
		{

			case 'Name':
			
			$this->m_sName = $p_vValue;
			break;

			case 'NumberOfSeats':

			$this->m_iNumberOfSeats = $p_vValue;
			break;

			case 'RestaurantId':

			$this->m_iRestaurantId = $p_vValue;
			break;

			case 'ReservationId':

			$this->m_iReservationId = $p_vValue;
			break;


		}

	}
public function AddTable()
{


		$db = new Db();
		
		$sql = "insert into phpdb.Table (Name, NumberOfSeats, RestaurantId) values('"
		 . $db->conn->real_escape_string($this->m_sName). "', " 
		 . $db->conn->real_escape_string($this->m_iNumberOfSeats) .", " 
		 . $db->conn->real_escape_string($this->m_iRestaurantId). ");";
	
		$db->conn->query($sql);

}

public function getTables($pTableId)
	{

	$db = new Db();
		
	$sql = "select * from phpdb.Table where 
	TableId = '" . $pTableId . "';";
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

}

?>