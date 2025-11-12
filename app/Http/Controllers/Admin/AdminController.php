<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


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
