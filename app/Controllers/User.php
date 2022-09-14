<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\ValidationModel;

class User extends BaseController{

    public function index(){
        $session = \Config\Services::session();
        $data['session'] = $session;

        if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
            return redirect()->to(base_url());
        }

        return view('template/header.php', $data).
        view('motorcycle/motorcycle.php').
        view('template/footer.php');
    }

    public function view_user($slug){
        $session = \Config\Services::session();
        $data['session'] = $session;

        if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
            return redirect()->to(base_url());
        }

        $model = new UserModel();
        $user = $model->getUser($slug);

        $data['user'] = $user;
        return view('template/header.php', $data).
        view('user/profile.php', $data).
        view('template/footer.php');
    }

    public function edit($slug){
        $session = \Config\Services::session();
        $data['session'] = $session;

        if(!($session->has('loggedIn') && $session->get('loggedIn') == true)){
            return redirect()->to(base_url());
        }

        $model = new UserModel();
        $user = $model->getUser($slug);
        $data['user'] = $user;

        helper('form');
        if ($this->request->getMethod() === 'post'){

            $validationModel = new ValidationModel();

            $validation = $validationModel->register();
            $validation['email'] = [];

            $inputs = $this->validate($validation);

            if($inputs) {
                $user = array('fname' => $this->request->getPost('fname'),
                    'fname' => $this->request->getPost('fname'),
                    'lname' => $this->request->getPost('lname'),
                    'email' => $this->request->getPost('email'),
                    'contact' => $this->request->getPost('contact'),
                    'address' => $this->request->getPost('address'),
                    'bday' => $this->request->getPost('bday'),
                    'gender' => $this->request->getPost('gender'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'slug' => strtolower($this->request->getPost('fname').'-'.$this->request->getPost('lname')),
                );
                //edit succesful 
                $model->edit($user, $slug);

                $session_data =  $model->getUser($user['slug']);
                $session_data['loggedIn'] = true;
                $session->set($session_data);

                
                return redirect()->to('/user/'.$user['slug']);

            }else{
                //add failed
                $data['validation'] = $this->validator;
            }

        }


        
        return view('template/header.php', $data).
        view('user/edit.php', $data).
        view('template/footer.php');
    }


}
