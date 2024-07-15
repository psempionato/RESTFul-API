<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\JsonResponse;


/**
 * @OA\Info(
 *     title="RESTFul API",
 *     version="1.0",
 *     description="API to manage items and authentication"
 * )
 */
class ItemController extends Controller
{
    
    /**
     * @OA\Get(
     *     path="/api/items",
     *     summary="List all items",
     *     @OA\Response(
     *         response=200,
     *         description="List of items"
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $items = Item::all();
        return response()->json($items);
    }

    /**
     * @OA\Get(
     *     path="/api/items/{id}",
     *     summary="Buscar um item pelo ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item Details"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Item not found"
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($item);
    }
}
