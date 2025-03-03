<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
 
class DoctorsController extends Controller
{

    public function index() {
        $doctors = DB::table('doctors')->get();
        // var_dump($doctors);
        return response()->json($doctors);
    }
}
