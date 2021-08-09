<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->paginate(10);
        return view('admin.invoice.index', compact('invoices'));
    }
    public function show($id)
    {
        $invoice =  Invoice::find($id);
        return view('admin.invoice.show', compact('invoice'));
    }
    public function delete($id)
    {
        $invoice = Invoice::find($id);
        $invoice->invoiceDetails()->delete($id);
        $invoice->delete($id);
        return redirect()->route('admin.invoices.index', compact('invoice'))->with('message', 'Xóa dữ liệu thành công!');
    }
}
