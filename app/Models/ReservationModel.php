<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
	
	public function create($reservation){
		$db = db_connect();

		$sql = 'INSERT INTO bookings (book_date, book_motor_id, book_mul, book_user_id, book_ticket) 
		VALUES (?,?,?,?,?)';

		$db->query($sql, [$reservation['date'], $reservation['motor_id'], $reservation['mul'],
			$reservation['user_id'], $reservation['ticket']]);
	}

	public function my_bookings($slug){
		$db = db_connect();

		$sql = 'SELECT * FROM bookings INNER JOIN  users ON book_user_id = user_id INNER JOIN motorcycles ON book_motor_id = motor_id WHERE user_slug = ? ORDER BY book_id DESC';
		$query = $db->query($sql,[$slug]);
		return $query->getResultArray();
	}

	public function getAllBooking(){
		$db = db_connect();

		$sql = 'SELECT * FROM bookings INNER JOIN  users ON book_user_id = user_id INNER JOIN motorcycles ON book_motor_id = motor_id ORDER BY book_id DESC';
		$query = $db->query($sql);
		return $query->getResultArray();
	}


	public function getCompletedBookings(){
		$db = db_connect();

		$sql = 'SELECT * FROM bookings INNER JOIN  users ON book_user_id = user_id INNER JOIN motorcycles ON book_motor_id = motor_id WHERE book_status = 2 ORDER BY book_id DESC';
		$query = $db->query($sql);
		return $query->getResultArray();
	}

	public function changeStatus($status, $id){
		$db = db_connect();

		$sql = 'UPDATE bookings SET book_status = ? WHERE book_id = ?';
		$query = $db->query($sql, [$status, $id]);
	}

	public function getEarnings(){
		$db = db_connect();

		$sql = 'SELECT SUM(motor_rate * book_mul) AS earnings FROM bookings INNER JOIN motorcycles ON
		book_motor_id = motor_id WHERE book_status = 2';
		$query = $db->query($sql);
		return $query->getRowArray()['earnings'];
	}



	
}