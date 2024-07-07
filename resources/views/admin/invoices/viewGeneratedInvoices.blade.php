<!-- resources/views/admin/invoices/viewGeneratedInvoices.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Generated Invoices</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Invoice ID</th>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->order->id }}</td>
                <td>{{ $invoice->user->name }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->status }}</td>
                <td>{{ $invoice->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="btn btn-primary">View</a>
                    <a href="{{ route('admin.invoices.download', $invoice->id) }}" class="btn btn-success">Download</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
