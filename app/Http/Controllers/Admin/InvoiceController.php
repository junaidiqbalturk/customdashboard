<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
//use barryvdh\dompdf\Facade\Pdf;
use Illuminate\Support\Facades\Notification;
use App\Models\Invoice;
use App\Notifications\InvoiceGenerated;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    //Defining GenerateInvoice Function as mentioned in Routes 

    public function Index()
    {
        $order = Order::all();//with('user', 'status')->get();

        return view('admin.invoices.index', compact('order'));
    }

    public function create($orderId)
    {
        $order = Order::with('user', 'status')->findOrFail($orderId);
        return view('admin.invoices.create', compact('order'));
    }


    public function storeInvoice(Request $request, $orderId)
    {
        $request->validate([
            'amount' => 'required|numeric',
        ]);

        $order = Order::with('user')->findOrFail($orderId);

        $invoice = Invoice::create([
            'user_id' => $order->user_id,
            'order_id' => $order->id,
            'amount' => $request->amount,
        ]);

        // Generate PDF
        $pdf = Pdf::loadView('admin.invoices.template', compact('invoice', 'order'));
          // Save the PDF file
          $pdfPath = storage_path('app/public/invoices/invoice-' . $invoice->id . '.pdf');
          $pdf->save($pdfPath);
         //$pdf->download('invoice-' . $invoice->id . '.pdf');

        // Send notification to the user
        $user = $order->user;
        Notification::send($user, new InvoiceGenerated($invoice));

        return redirect()->route('admin.dashboard')->with('success', 'Invoice generated and notification sent to the client.');
    }

   
}
