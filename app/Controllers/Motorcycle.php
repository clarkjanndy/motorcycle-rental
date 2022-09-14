<?php

namespace App\Controllers;

use App\Models\ValidationModel;
use App\Models\MotorcycleModel;

class Motorcycle extends BaseController{

	public function index(){
		$session = \Config\Services::session();
		$data['session'] = $session;

    $model = new MotorcycleModel();
   

    if(isset($_GET['search']) && !empty($_GET['search'])){
     $motorcycles = $model->search($_GET['search']);
    }else{
      $motorcycles = $model->getAllMotorcycles();
    }

    $data['motorcycles'] = $motorcycles;

    return view('template/header.php', $data).
    view('motorcycle/motorcycles.php', $data).
    view('template/footer.php');
  }

  public function create(){
    $session = \Config\Services::session();
    $data['session'] = $session;

    if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
      return redirect()->to(base_url());
    }

    $model = new MotorcycleModel();
    helper('form');

    if ($this->request->getMethod() === 'post'){

      $validationModel = new ValidationModel();
      $inputs = $this->validate($validationModel->motorcycle());

      if($inputs) {
        $motorcycle = array('brand' => $this->request->getPost('brand'),
          'model' => $this->request->getPost('model'),
          'year' => $this->request->getPost('year'),
          'type' => $this->request->getPost('type'),
          'displacement' => $this->request->getPost('displacement'),
          'mileage' => $this->request->getPost('mileage'),
          'rate-type' => $this->request->getPost('rate-type'),
          'rate' => $this->request->getPost('rate'),
          'location' => $this->request->getPost('location'),
        );
                //add success
        $model->create($motorcycle);

        $latest =  $model->getLatestCreate();

        return redirect()->to(base_url('motorcycles/'.$latest['motor_id']));

      }else{
                //add failed
        $data['validation'] = $this->validator;
      }

    }

    return view('template/header.php', $data).
    view('motorcycle/create.php',  $data).
    view('template/footer.php');
  }

  public function edit($id){
    $session = \Config\Services::session();
    $data['session'] = $session;

    if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
      return redirect()->to(base_url());
    }

    $model = new MotorcycleModel();
    helper('form');

    if ($this->request->getMethod() === 'post'){

      $validationModel = new ValidationModel();
      $inputs = $this->validate($validationModel->motorcycle());

      if($inputs) {
        $motorcycle = array('brand' => $this->request->getPost('brand'),
          'model' => $this->request->getPost('model'),
          'year' => $this->request->getPost('year'),
          'type' => $this->request->getPost('type'),
          'displacement' => $this->request->getPost('displacement'),
          'mileage' => $this->request->getPost('mileage'),
          'rate-type' => $this->request->getPost('rate-type'),
          'rate' => $this->request->getPost('rate'),
          'location' => $this->request->getPost('location'),
        );
                //add success
        $model->edit($motorcycle, $id);

        return redirect()->to(base_url('motorcycles/'.$id));

      }else{
                //add failed
        $data['validation'] = $this->validator;
      }

    }

    $data['motorcycle'] =  $model->getMotorcycle($id);
    return view('template/header.php', $data).
    view('motorcycle/edit.php',  $data).
    view('template/footer.php');
  }


  public function change_photo($id){
    $session = \Config\Services::session();
    $model = new MotorcycleModel();

    if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
      return redirect()->to(base_url());
    }

    helper('form', 'file');
    $inputs = TRUE;
    if($inputs){
      $img = $this->request->getFile('image');
      $newName = $id.'.'.$img->getClientExtension();
      $img->move('uploads', $newName, true);

      $model->changePhoto($newName, $id);

      echo 'motorcycles/'.$id;
      return redirect()->back();

    }else{
      echo ''. $this->validator->getError('image');
    }


  }

  public function view_motorcycle($id){

    $session = \Config\Services::session();
    $data['session'] = $session;


    $model = new MotorcycleModel();
    $motorcycle =  $model->getMotorcycle($id);

    $data['motorcycle'] =  $motorcycle;


    return view('template/header.php', $data).
    view('motorcycle/motorcycle-profile.php', $data).
    view('template/footer.php');

  }


}
