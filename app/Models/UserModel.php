<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	
	public function register($user){
		$db = db_connect();

		$sql = 'INSERT INTO users (user_fname, user_lname, user_gender, user_email, user_contact, user_address, user_bday, user_password, user_slug) VALUES (?,?,?,?,?,?,?,?,?)';

		$db->query($sql, [$user['fname'], $user['lname'], $user['gender'], $user['email'], $user['contact'],
			$user['address'],	$user['bday'],$user['password'], $user['slug']]);
	}

	public function edit($user, $slug){
		$db = db_connect();

		$sql = 'UPDATE users SET user_fname = ?, user_lname = ? , user_gender = ?, 
		user_contact = ? , user_address = ?, user_bday = ?, user_password = ?, user_slug = ?
		WHERE user_slug = ?';

		$db->query($sql, [$user['fname'], $user['lname'], $user['gender'], 
			$user['contact'], $user['address'],	$user['bday'],$user['password'], $user['slug'], 
			$slug]);
	}

	public function login($email, $password){
		$db = db_connect();
		
		$sql = 'SELECT * FROM users WHERE user_email = ?';
		$query = $db->query($sql,[$email]);

		$user = $query->getRowArray();
		
		if(!empty($user)){
			$verify = password_verify($password, $user['user_password']);

			if($verify){
				return $user;
			}
		}
	}

	public function getUser($slug){
		$db = db_connect();

		$sql = 'SELECT * FROM users WHERE user_slug = ?';
		$query = $db->query($sql, [$slug]);
		return $query->getRowArray();
	}

	public function getAllUser(){
		$db = db_connect();

		$sql = 'SELECT * FROM users';
		$query = $db->query($sql);
		return $query->getResultArray();
	}


	public function getLatestReg(){
		$db = db_connect();

		$sql = 'SELECT * FROM users WHERE user_id = (SELECT LAST_INSERT_ID())';
		$query = $db->query($sql);
		return $query->getRowArray();
	}

	
	
}