<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimpleViewController extends Controller
{
    // Method untuk route '/hello'
    public function hello()
    {
        return "Hello, World";
    }

    // Method untuk route '/user/{id}'
    public function showUserById($id)
    {
        return "User ID: " . $id;
    }

    // Method untuk route '/user/{name?}'
    public function showUserByName($name = 'Guest')
    {
        return "Hello, " . $name;
    }

    // Method untuk route '/dashboard'
    public function dashboard()
    {
        return view('dashboard');
    }
}