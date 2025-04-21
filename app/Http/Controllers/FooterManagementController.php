<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterManagementController extends Controller
{
    public function manageNews(){
        // Logic to manage news
        return view('footer_management.news');
    }
}
