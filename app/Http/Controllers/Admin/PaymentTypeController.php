<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    public function index()
    {
        $paymentTypes = PaymentType::all();
        return view('admin.payment-types.index', compact('paymentTypes'));
    }

    public function create()
    {
        return view('admin.payment-types.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:payment_types,name'
        ]);

        PaymentType::create($request->only('name'));

        return redirect()->route('admin.payment-types.index')
            ->with('success', 'Tipe pembayaran berhasil ditambahkan');
    }

    public function edit(PaymentType $paymentType)
    {
        return view('admin.payment-types.edit', compact('paymentType'));
    }

    public function update(Request $request, PaymentType $paymentType)
    {
        $request->validate([
            'name' => 'required|unique:payment_types,name,' . $paymentType->id
        ]);

        $paymentType->update($request->only('name'));

        return redirect()->route('admin.payment-types.index')
            ->with('success', 'Tipe pembayaran berhasil diperbarui');
    }

    public function destroy(PaymentType $paymentType)
    {
        $paymentType->delete();

        return back()->with('success', 'Tipe pembayaran berhasil dihapus');
    }
}
