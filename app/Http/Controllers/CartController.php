<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // 🔸 Lihat isi keranjang
    public function viewCart()
    {
        $items = CartItem::with('item') // eager load item
                        ->where('user_id', Auth::id())
                        ->get();

        return response()->json([
            'data' => $items,
            'message' => 'Cart items retrieved successfully'
        ]);
    }

    // 🔸 Tambah item ke keranjang
    public function addItem(Request $request)
    {
        $item = $request->validate([
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();

        $existingItem = CartItem::where('user_id', $userId)
            ->where('item_id', $item['item_id'])
            ->first();

        if ($existingItem) {
            // Kalau sudah ada, update jumlah
            $existingItem->quantity += $item['quantity'];
            $existingItem->save();
            $cartItem = $existingItem;
        } else {
            // Kalau belum ada, langsung buat
            $cartItem = CartItem::create([
                'user_id' => $userId,
                'item_id' => $item['item_id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return response()->json([
            'message' => 'Item added to cart',
            'data' => $cartItem->load('item')
        ], 201);
    }

    // 🔸 Update jumlah item di keranjang
    // public function updateItem(Request $request, $id)
    // {
    //     $validated = $request->validate([
    //         'quantity' => 'required|integer|min:1',
    //     ]);

    //     $item = CartItem::where('id', $id)
    //                     ->where('user_id', Auth::id())
    //                     ->firstOrFail();

    //     $item->update(['quantity' => $validated['quantity']]);

    //     return response()->json([
    //         'message' => 'Item quantity updated',
    //         'data' => $item->load('item')
    //     ]);
    // }

    // 🔸 Hapus item dari keranjang (soft delete)
    public function removeItem($id)
    {
        $item = CartItem::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $item->delete();

        return response()->json([
            'message' => 'Item removed from cart'
        ]);
    }
}
