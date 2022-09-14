<?php

namespace App\Models;

use CodeIgniter\Model;

class MotorCycleModel extends Model
{

	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	
	public function create($motor){
		$db = db_connect();

		$sql = 'INSERT INTO motorcycles (motor_brand, motor_model, motor_year, motor_type, motor_displacement, motor_mileage, motor_rate_type, motor_rate,motor_location) 
		VALUES (?,?,?,?,?,?,?,?,?)';

		$db->query($sql, [$motor['brand'], $motor['model'], $motor['year'], $motor['type'], $motor['displacement'],
			$motor['mileage'],	$motor['rate-type'],$motor['rate'], $motor['location']]);
	}

	public function edit($motor, $id){
		$db = db_connect();

		$sql = 'UPDATE motorcycles SET motor_brand=?, motor_model=?, motor_year=?, motor_type=?, 
		motor_displacement=?, motor_mileage=?, motor_rate_type=?, motor_rate=?,motor_location=? WHERE motor_id = ?';

		$db->query($sql, [$motor['brand'], $motor['model'], $motor['year'], $motor['type'], $motor['displacement'],
			$motor['mileage'],	$motor['rate-type'],$motor['rate'], $motor['location'], $id]);
	}

	public function search($key){
		$db = db_connect();

		$key = '%'.$key.'%';

		$sql = 'SELECT * FROM motorcycles WHERE (concat(motor_brand, motor_model) 
		LIKE ? OR motor_location LIKE ?) AND motor_status = 1';
		$query = $db->query($sql,[$key, $key]);
		return $query->getResultArray();
	}


	public function getLatestCreate(){
		$db = db_connect();

		$sql = 'SELECT * FROM motorcycles WHERE motor_id = (SELECT LAST_INSERT_ID())';
		$query = $db->query($sql);
		return $query->getRowArray();
	}

	public function getMotorcycle($id){
		$db = db_connect();

		$sql = 'SELECT * FROM motorcycles WHERE motor_id = ?';
		$query = $db->query($sql,[$id]);

		return $query->getRowArray();
	}

	public function getAllMotorcycles(){
		$db = db_connect();

		$sql = 'SELECT * FROM motorcycles WHERE motor_status = 1';
		$query = $db->query($sql);
		
		return $query->getResultArray();
	}

	public function getAllMotorcyclesAdmin(){
		$db = db_connect();

		$sql = 'SELECT * FROM motorcycles';
		$query = $db->query($sql);
		
		return $query->getResultArray();
	}

	public function updateStatus($id, $status){
		$db = db_connect();

		$sql = 'UPDATE motorcycles SET motor_status = ? WHERE motor_id = ?';
		$query = $db->query($sql, [$status, $id]);
	}

	public function changePhoto($photo, $id){
		$db = db_connect();

		$sql = 'UPDATE motorcycles SET motor_pic = ? WHERE motor_id = ?';
		$query = $db->query($sql, [$photo, $id]);
	}





	
}