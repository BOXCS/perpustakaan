<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleViewController extends Controller
{
    // public function hello()
    // {
    //     return "Hello, World";
    // }

   
    // public function showUserById($id)
    // {
    //     return "User ID: " . $id;
    // }

    // public function showUserByName($name = 'Guest')
    // {
    //     return "Hello, " . $name;
    // }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function adminDashboard()
    {
        return "Admin Dashboard";
    }

    public function adminUsers()
    {
        return "Admin Users";
    }

    public function notFound() {
        return view('404');
    }

    // Method untuk route '/dashboard Admin'
    // public
}