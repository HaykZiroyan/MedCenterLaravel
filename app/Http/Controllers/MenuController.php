<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the menu items that start with 'A'.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $menuItems = Menu::startsWithA()->get();

        return response()->json($menuItems);
    }

    /**
     * Display a listing of all menu items.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllData()
    {
        $menuItems = Menu::all();

        return response()->json($menuItems);
    }

    /**
     * Create a new menu item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createData(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
        ]);

        $menuItem = new Menu();
        $menuItem->name = $request->input('name');
        $menuItem->profession = $request->input('profession');
        $menuItem->save();

        return response()->json($menuItem, 201);
    }

    /**
     * Update an existing menu item.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateData(Request $request, $id)
    {
        $menuItem = Menu::find($id);

        if (!$menuItem) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $this->validate($request, [
            'name' => 'required',
            'profession' => 'required',
        ]);

        $menuItem->name = $request->input('name');
        $menuItem->profession = $request->input('profession');
        $menuItem->save();

        return response()->json($menuItem);
    }

    /**
     * Delete a menu item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteData($id)
    {
        $menuItem = Menu::find($id);

        if (!$menuItem) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $menuItem->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
