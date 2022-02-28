<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Tream;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->paginate(10);
        $invoices->load(['invoiceDetails']);
        return view('admin.invoice.index', compact('invoices'));
    }
    public function exportPDF($id)
    {
        $invoice =  Invoice::find($id);
        view()->share('invoice', $invoice);
        $invoice->load(['invoiceDetails']);
        $pdf = PDF::loadView('admin.invoice.pdf', $invoice);
        return $pdf->download("pdf_file.pdf");
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
    public function choduyet($invoice_id)
    {
        DB::table('invoices')->where('id', $invoice_id)->update(['status' => 1]);
        return redirect()->back();
    }
    public function dangxuly($invoice_id)
    {
        DB::table('invoices')->where('id', $invoice_id)->update(['status' => 2]);
        return redirect()->back();
    }
    public function danggiaohang($invoice_id)
    {
        DB::table('invoices')->where('id', $invoice_id)->update(['status' => 3]);
        return redirect()->back();
    }
    public function dagiaohang($invoice_id)
    {
        DB::table('invoices')->where('id', $invoice_id)->update(['status' => 4]);
        return redirect()->back();
    }
    public function dahuy($invoice_id)
    {
        DB::table('invoices')->where('id', $invoice_id)->update(['status' => 5]);
        return redirect()->back();
    }
    public function chuyenhoan($invoice_id)
    {
        DB::table('invoices')->where('id', $invoice_id)->update(['status' => 6]);
        return redirect()->back();
    }
}
