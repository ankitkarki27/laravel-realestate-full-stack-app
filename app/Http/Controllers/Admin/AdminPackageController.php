<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class AdminPackageController extends Controller
{
  public function index(){
    $packages = Package::orderBy('id','asc')->get();
    return view('admin.package.index', compact('packages'));
  }
}
