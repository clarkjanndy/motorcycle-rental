<?php

namespace App\Controllers;

use App\Models\MotorcycleModel;
use App\Models\UserModel;
use App\Models\ReservationModel;


class Admin extends BaseController{

	public function index(){
		$session = \Config\Services::session();
		$data['session'] = $session;

		
		if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
			return redirect()->to(base_url());
		}

		if($session->has('user_role') && $session->get('user_role') == 0){
			return redirect()->to(base_url());
		}


		$reservationModel = new ReservationModel();
		$motorcycleModel = new MotorcycleModel();
		$userModel = new UserModel();

		$motorCount = count($motorcycleModel->getAllMotorcycles());
		$userCount = count($userModel->getAllUser());
		$bookingCount = count($reservationModel->getAllBooking());
		$earnings = $reservationModel->getEarnings();

		$data['motorCount'] = $motorCount;
		$data['userCount'] = $userCount;
		$data['bookingCount'] = $bookingCount;
		$data['earnings'] = $earnings;

		return view('template/header.php', $data).
		view('admin/admin-panel.php', $data).
		view('template/footer.php');
	}

	public function motorcycles(){
		$session = \Config\Services::session();
		$data['session'] = $session;

			
		if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
			return redirect()->to(base_url());
		}

		if($session->has('user_role') && $session->get('user_role') == 0){
			return redirect()->to(base_url());
		}


		$model = new MotorcycleModel();
		$motorcycles = $model->getAllMotorcyclesAdmin();
		$data['motorcycles'] = $motorcycles;

		return view('template/header.php', $data).
		view('admin/motorcycles.php', $data).
		view('template/footer.php');
	}

	public function users(){
		$session = \Config\Services::session();
		$data['session'] = $session;

			
		if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
			return redirect()->to(base_url());
		}

		if($session->has('user_role') && $session->get('user_role') == 0){
			return redirect()->to(base_url());
		}


		$model = new UserModel();
		$users = $model->getAllUser();
		$data['users'] = $users;

		return view('template/header.php', $data).
		view('admin/users.php', $data).
		view('template/footer.php');
	}

	public function bookings(){
		$session = \Config\Services::session();
		$data['session'] = $session;

			
		if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
			return redirect()->to(base_url());
		}

		if($session->has('user_role') && $session->get('user_role') == 0){
			return redirect()->to(base_url());
		}


		$model = new ReservationModel();
		$bookings = $model->getAllBooking();
		$data['bookings'] = $bookings;

		return view('template/header.php', $data).
		view('admin/bookings.php', $data).
		view('template/footer.php');
	}

	public function earnings(){
		$session = \Config\Services::session();
		$data['session'] = $session;

			
		if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
			return redirect()->to(base_url());
		}

		if($session->has('user_role') && $session->get('user_role') == 0){
			return redirect()->to(base_url());
		}

		$model = new ReservationModel();
		$bookings = $model->getCompletedBookings();
		$data['bookings'] = $bookings;

		return view('template/header.php', $data).
		view('admin/earnings.php', $data).
		view('template/footer.php');
	}


}
