<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JsonData;

class JsonController extends Controller
{
    public function index()
    {
        $jsonData = JsonData::startsWithA()->get();
        return response()->json($jsonData);
    }
    public function getData()
    {
        $data = JsonData::all();
        return response()->json($data);
    }

    public function postData(Request $request)
    {
        $data = new JsonData();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->save();
        return response()->json($data, 201);
    }

    public function updateData(Request $request, $id)
    {
        $data = JsonData::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->save();
        return response()->json($data);
    }

    public function deleteData($id)
    {
        $data = JsonData::find($id);
        if (!$data) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        $data->delete();
        return response()->json(['message' => 'Data deleted successfully']);
    }
}
