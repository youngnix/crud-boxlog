<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enums\OrderStatus;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = 10; // itens por página
        $query = Order::query();

        // Filtros opcionais
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->recipient) {
            $query->where('recipient', 'like', "%{$request->recipient}%");
        }

        $orders = $query->orderBy('id', 'asc')->paginate($perPage);

        return response()->json($orders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        if ($request->has('status') && $request->status == OrderStatus::Delivered->value
            && empty($order->address)) {
            abort(422, 'Malformed request');
        }

        $order->update($request->validate([
            'recipient' => ['sometimes', 'string'],
            'address' => ['sometimes', 'string'],
            'status' => ['sometimes', Rule::in(array_column(OrderStatus::cases(), 'value')), 'string'],
        ]));

        return $order;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
