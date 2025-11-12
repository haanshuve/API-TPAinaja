<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
   {
       return view('admin.dashboard');
   }

   public function manageUsers()
   {
       return view('admin.manage_users');
   }

   public function settings()
   {
       return view('admin.settings');
   }

   public function reports()
   {
       return view('admin.reports');
   }

   public function analytics()
   {
       return view('admin.analytics');
   }
   
}
