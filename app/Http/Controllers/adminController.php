<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //
    public function index ()
    {
    	return view("index");
    }

    public function loginPage()
    {
    	return view("loginPage.login");
    }
    public function doLogin(Request $formRequest)
    {
    	$formRequest->validate([
    		"email" => "required|email",
    		"password" => "required|password"
    	]);
    	return $formRequest;
    }
}
