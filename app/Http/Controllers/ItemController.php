<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Get all items
     */
    public function viewItem()
    {
        $items = Item::all();

        return response()->json([
            'data' => $items,
        ]);
    }

    /**
     * Create item
     */
    public function createItem(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $item = Item::create($validated);

        return response()->json([
            'message' => 'Item created successfully.',
            'data' => $item,
        ], 201);
    }

    /**
     * Get single itmem by ID
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);

        return response()->json([
            'data' => $item,
        ]);
    }

    /**
     * Update item by ID
     */
    public function updateItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $item->update($validated);

        return response()->json([
            'message' => 'Item updated successfully.',
            'data' => $item,
        ]);
    }

    /**
     * Soft delete item by ID
     */
    public function deleteItem( $id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->json([
            'message' => 'Item deleted (soft) successfully.',
        ]);
    }
}
