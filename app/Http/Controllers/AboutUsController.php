<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\AboutUs;


class AboutUsController extends Controller
{

    public function index(): JsonResponse
    {
        $aboutUsItems = AboutUs::startsWithA()->get();

        return response()->json($aboutUsItems);
    }

  
    public function getAllData(): JsonResponse
    {
        $aboutUsItems = AboutUs::all();

        return response()->json($aboutUsItems);
    }

    public function createData(Request $request): JsonResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
        ]);

        $aboutUsItem = AboutUs::create($request->only(['name', 'profession']));

        return response()->json($aboutUsItem, 201);
    }

    public function updateData(Request $request, int $id): JsonResponse
    {
        $aboutUsItem = AboutUs::find($id);

        if (!$aboutUsItem) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
        ]);

        $aboutUsItem->update($request->only(['name', 'profession']));

        return response()->json($aboutUsItem);
    }

    /**
     * Delete a AboutUs item.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function deleteData(int $id): JsonResponse
    {
        $aboutUsItem = AboutUs::find($id);

        if (!$aboutUsItem) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $aboutUsItem->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}