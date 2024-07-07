<!-- resources/views/admin/invoices/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Invoice Details</h1>
    <table class="table table-striped">
        <tr>
            <th>Invoice ID</th>
            <td>{{ $invoice->id }}</td>
        </tr>
        <tr>
            <th>Order ID</th>
            <td>{{ $invoice->order->id }}</td>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td>{{ $invoice->user->name }}</td>
        </tr>
        <tr>
            <th>Amount</th>
            <td>{{ $invoice->amount }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $invoice->status }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $invoice->created_at->format('Y-m-d H:i:s') }}</td>
        </tr>
    </table>
    <a href="{{ route('admin.invoices.download', $invoice->id) }}" class="btn btn-success">Download PDF</a>
</div>
@endsection
