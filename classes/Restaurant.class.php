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



?>