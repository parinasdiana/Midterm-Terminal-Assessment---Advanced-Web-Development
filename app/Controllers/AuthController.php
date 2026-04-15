<?php
namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('auth/login'); 
    }

    // COMPLETE THIS: The Login Logic [cite: 19, 20]
    public function login()
    {
        $session = session();
        $model = new UserModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Find the user by email [cite: 45, 47]
        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                
                // Set Session for Authorization [cite: 40, 42]
                $sessionData = [
                    'id'         => $user['id'],
                    'name'       => $user['name'],
                    'email'      => $user['email'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);
                
                return redirect()->to('/tasks');
            } else {
                return redirect()->back()->with('error', 'Invalid password.');
            }
        } else {
            return redirect()->back()->with('error', 'Email not found.');
        }
    }

    public function registerView()
    {
        return view('auth/register');
    }

    public function register()
    {
        $userModel = new UserModel();

        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Save with BCrypt Hashing (Satisfies Security Requirements) 
        $userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
        ]);

        return redirect()->to('/login')->with('success', 'Account created! You can now login.');
    }

    // ADD THIS: Logout functionality [cite: 88]
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}