<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    function Show($id){
        $invoice = Invoice::findOrFail($id);
        return dd($invoice);
    }
}
