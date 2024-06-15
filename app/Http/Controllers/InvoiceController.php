<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function preview($id)
    {
        $invoice = Invoice::find($id);
        return view('invoice.index', compact('invoice'));
    }
}
