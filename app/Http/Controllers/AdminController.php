<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    
    public function showLoginForm()
    {
        return view('admin.login');
    }

    
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       
        $admin = Admin::where('email', $request->email)->first();

       
        if ($admin && Hash::check($request->password, $admin->password)) {
           
            session(['admin_authenticated' => true, 'admin_email' => $admin->email]);

          
            return redirect()->route('admin.dashboard');
        }

       
        return redirect()->route('admin.login')->withErrors(['message' => 'Email ou mot de passe incorrect.']);
    }

   
    public function dashboard()
    {
        
        if (!session('admin_authenticated')) {
            return redirect()->route('admin.login')->withErrors(['message' => 'Vous devez être connecté pour accéder à cette page.']);
        }

       
        return view('admin.dashboard');
    }

   
    public function logout()
    {
        session()->forget('admin_authenticated');
        return redirect()->route('admin.login');
    }
}
