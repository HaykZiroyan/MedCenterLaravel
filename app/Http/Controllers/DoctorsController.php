<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Doctors;
 
class DoctorsController extends Controller
{

    public function index() {
        // $doctors = DB::table('doctors')->get();
        $doctorData = Doctors::startsWithA()->get();
        return response()->json($doctorData);       
    }

    public function getData()
    {
        $data = Doctors::all();
        return response()->json($data);
    }

    public function postData(Request $request)
    {
        $data = new Doctors();
        $data->name = $request->input('name');
        $data->profession = $request->input('profession');
        $data->save();
        return response()->json($data, 201);
    }

    public function updateData(Request $request, $id)
    {
        $data = Doctors::find($id);
        $data->name = $request->input('name');
        $data->profession = $request->input('profession');
        $data->save();
        return response()->json($data);
    }

    public function deleteData($id)
    {
        $data = Doctors::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        $data->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
