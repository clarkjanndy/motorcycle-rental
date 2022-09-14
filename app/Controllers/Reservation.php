<?php

namespace App\Controllers;

use App\Models\ValidationModel;
use App\Models\ReservationModel;
use App\Models\MotorcycleModel;

class Reservation extends BaseController{

	public function index(){

  }

  public function create(){
    $session = \Config\Services::session();

    if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
      return redirect()->to(base_url('login'));
    }

    $reservationModel = new ReservationModel();
    $motorcycleModel= new MotorcycleModel();
    helper('form');

    if ($this->request->getMethod() === 'post'){

      $reservation = array('date' => $this->request->getPost('date'),
        'motor_id' => $this->request->getPost('motor-id'),
        'mul' => $this->request->getPost('mul'),
        'user_id' => $session->get('user_id'),
        'ticket' => $this->newTicket(8)
      );
                //add success
      $reservationModel->create($reservation);
      $motorcycleModel->updateStatus($reservation['motor_id'], 0);

      $session->setFlashData('booked', 'Booked Successfully');

      $data['session'] = $session;
      return redirect()->to('booking/'.$session->get('user_slug'));

    }

    return view('template/header.php', $data).
    view('motorcycle/create.php',  $data).
    view('template/footer.php');
  }

  function newTicket($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function my_bookings($slug){
    $session = \Config\Services::session();
    $data['session'] = $session;

    if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
      return redirect()->to(base_url('login'));
    }

    $reservationModel = new ReservationModel();
    $bookings = $reservationModel->my_bookings($slug);

    $data['bookings'] = $bookings;

    return view('template/header.php', $data).
    view('reservation/my-bookings.php',  $data).
    view('template/footer.php');
  }

  public function change_status($status, $book_id, $motor_id){
    $session = \Config\Services::session();
    $data['session'] = $session;

    if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
      return redirect()->to(base_url('login'));
    }

    $reservationModel = new ReservationModel();
    $motorcycleModel = new MotorcycleModel();

    $reservationModel->changeStatus($status, $book_id);

    if($status == 2){
      $motorcycleModel->updateStatus($motor_id, 1);
    }

    if($status == 1){
      $session->setFlashData('approved','Booking has been Approved');
    }else{
      $session->setFlashData('complete','Booking is now complete');
    }

    return redirect()->back();
  }



}
