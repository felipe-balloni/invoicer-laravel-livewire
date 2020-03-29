<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Product;
use App\Customer;
use App\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $customer = Customer::find($request->customer_id);
        $tax = 20;
        $products = Product::all();
        return view('admin.invoices.create', compact('tax', 'products', 'customer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Invoice = Invoice::create($request->Invoice);
        for ($i = 0; $i < count($request->product); $i++) {
            if (isset($request->qty[$i]) && isset($request->price[$i])) {
                InvoiceItem::create([
                    'Invoice_id' => $Invoice->id,
                    'name' => $request->product[$i],
                    'quantity' => $request->qty[$i],
                    'price' => $request->price[$i]
                ]);
            }
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $Invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $Invoice)
    {
        $Invoice = Invoice::findOrFail($Invoice);
        return view('admin.invoices.show', compact('Invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $Invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $Invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $Invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $Invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $Invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $Invoice)
    {
        //
    }

    public function download(Invoice $Invoice)
    {
        $Invoice = Invoice::findOrFail($Invoice);
        $pdf     = \PDF::loadView('admin.invoices.pdf', compact('Invoice'));

        return $pdf->stream('Invoice.pdf');
    }
}
