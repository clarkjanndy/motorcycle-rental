<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ValidationModel;


class Home extends BaseController{

    public function index(){
        $session = \Config\Services::session();
        $data['session'] = $session;

        return view('template/header.php',$data).
        view('home.php').
        view('template/footer.php');
    }

    public function contact(){
        $session = \Config\Services::session();
        $data['session'] = $session;

        return view('template/header.php',$data).
        view('contact.php').
        view('template/footer.php');    
    }

    public function about(){
        $session = \Config\Services::session();
        $data['session'] = $session;

        return view('template/header.php',$data).
        view('about.php').
        view('template/footer.php');
    }

    public function login(){  
        $session = \Config\Services::session();

        $data = [];
        

        if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){

         helper('form');
         if ($this->request->getMethod() === 'post'){

             $validationModel = new ValidationModel();
             $inputs = $this->validate($validationModel->login());
             if($inputs){
                $model = new UserModel();
                $user = $model->login($this->request->getPost('email'), 
                    $this->request->getPost('password'));
                if(!empty($user)){
                    $session_data =  $user;
                    $session_data['loggedIn'] = true;
                    $session_data['password'] =  $this->request->getPost('password');
                    $session->set($session_data);

                    return redirect()->to('login');
                }else{
                    $session->setFlashData('failed', 'Invalid email and/or passwprd.');
                }
            }else{
                $data['validation'] = $this->validator;
            }
        }

            $data['session'] = $session;

        return view('template/header.php',$data).
        view('login.php',$data).
        view('template/footer.php');

    }else{
        return redirect()->to(base_url('motorcycles'));
    }  
}

public function logout(){   
    $session = \Config\Services::session();

    $session->destroy();
    return redirect()->to('login');
}

public function register(){
    $session = \Config\Services::session();

    $data = [];
    $model = new UserModel();
    helper('form');

    if($session->has('loggedIn') && $session->get('loggedIn') == true){
        return redirect()->to(base_url());
    }

    if ($this->request->getMethod() === 'post'){
        $checked = $this->request->getPost('check');

        $validationModel = new ValidationModel();
        $inputs = $this->validate($validationModel->register());

        if($inputs) {
            $user = array('fname' => $this->request->getPost('fname'),
                'lname' => $this->request->getPost('lname'),
                'email' => $this->request->getPost('email'),
                'contact' => $this->request->getPost('contact'),
                'address' => $this->request->getPost('address'),
                'bday' => $this->request->getPost('bday'),
                'gender' => $this->request->getPost('gender'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'slug' => strtolower($this->request->getPost('fname').'-'.$this->request->getPost('lname')),
            );
            //add succesful 
            if(isset($checked)){
             $model->register($user);

             $session_data =  $model->getLatestReg();
             $session_data['loggedIn'] = true;
             $session->set($session_data);

             return redirect()->to('login');

         }else{
            $data['accept_terms'] = 0;
        }

    }else{
        //add failed
        $data['validation'] = $this->validator;
    }

}
return view('register.php', $data);
}
}
