<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidationModel extends Model
{
	
	public function register(){
		$validation = [
            'fname' => [
                'rules'=> 'required|max_length[15]',
                'errors' => [
                    'required' => 'Please enter your first name',
                    'max_length' => 'Name must be at most 15 characters'
                ]
            ],
            'lname' => [
                'rules'=> 'required|max_length[15]',
                'errors' => [
                    'required' => 'Please enter your last name',
                    'max_length' => 'Name must be at most 15 characters'
                ]
            ],
            'email' => [
                'rules'=> 'required|is_unique[users.user_email]|valid_email',
                'errors' => [
                    'required' => 'Please enter your email',
                    'is_unique' => 'Email is already used',
                    'valid_email' => 'Please enter a valid email'
                ]
            ],
            'contact' => [
                'rules'=> 'required|min_length[11]|max_length[11]',
                'errors' => [
                    'required' => 'Please enter your contact number',
                    'min_length' => 'Contact number must be at least 11 digits.',
                    'max_length' => 'Contact number must be at least 11 digits.'
                ]
            ],
            'address' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter your name'
                ]
            ],
            'bday' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter your birthday'
                ]
            ],
             'gender' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please select your gender'
                ]
            ],
            'password' => [
                'rules'=> 'required|min_length[8]',
                'errors' => [
                    'required' => 'Please enter your password',
                    'min_length' => 'Password must be at least 8 digits.'
                ]
            ],
            'password1' => [
                'rules'=> 'required|matches[password]|min_length[8]',
                'errors' => [
                    'required' => 'Please enter your password',
                    'matches' => 'Password did not match',
                    'min_length' => 'Password must be at least 8 digits.'
                ]
            ]
        ];
		return $validation;
	}

	public function login(){
		$validation = [
                'email' => [
                    'rules'=> 'required|valid_email',
                    'errors' => [
                        'required' => 'Please enter your email address',
                        'valid_email' => 'Please enter a valid email'
                    ]
                ],
                'password' => [
                    'rules'=> 'required',
                    'errors' => [
                        'required' => 'Please enter your password'
                    ]
                ],
            ];
		return $validation;
	}

	public function motorcycle(){
		$validation = [
            'brand' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter motorcycle brand name'
                ]
            ],
            'model' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter motorcycle model'
                ]
            ],
            'year' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter year released'
                ]
            ],
            'type' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please select motorcycle type'
                ]
            ],
            'displacement' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter motorcycle displacement'
                ]
            ],
            'mileage' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter motorcycle mileage'
                ]
            ],
             'rate-type' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please select rate type'
                ]
            ],
            'rate' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter rate'
                ]
            ],
            'location' => [
                'rules'=> 'required',
                'errors' => [
                    'required' => 'Please enter motorcycle location'
                ]
            ]
        ];
		return $validation;
	}


	
}