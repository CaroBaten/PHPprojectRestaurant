<?php

include_once('Connection.php');

class Menu
{

private $m_sItem;
private $m_dPrice;
private $m_sType;
private $m_iRestaurantId;

public function __set($p_sProperty, $p_vValue)
	{
		switch ($p_sProperty)
		{

			case 'Item':
			
			$this->m_sItem = $p_vValue;
			break;

			case 'Price':
			
				if(is_numeric($p_vValue)){
					$this->m_dPrice = $p_vValue;
				}else{
					throw new exception("Prijs moet een getal zijn!");
				}

			 				
			break;

			case 'Type':
			$this->m_sType = $p_vValue;
			break;

			case 'RestaurantId':
			$this->m_iRestaurantId = $p_vValue;
			break;
		
		}

	}

public function insertItem()
		
		{

		$db = new Db();
		$sql = "insert into phpdb.Menu (Item, Price, Type, Restaurant_id) values('"
		 . $db->conn->real_escape_string($this->m_sItem). "', " 
		 . $db->conn->real_escape_string($this->m_dPrice) . ", '" 
		 . $db->conn->real_escape_string($this->m_sType) . "', " 
		 . $db->conn->real_escape_string($this->m_iRestaurantId) . ");";

		$db->conn->query($sql);
	
		}


public function getMenu($p_RestaurantId)
	{

	$db = new Db();
		
	$sql = "select * from Menu where 
	Restaurant_id = " . $p_RestaurantId . " and type = '" . $db->conn->real_escape_string($this->m_sType) . "' ;";
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

	public function deleteItem($p_item)
		
		{

		$db = new Db();
		$sql = "delete from phpdb.Menu where Item ='".  $db->conn->real_escape_string($p_item) . "';"; 

		
		$db->conn->query($sql);
	
		}

}




?>