@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!

                    <div class="row">
                        <a href="{{ route('invoices.create') }}" class="btn btn-primary rounded-lg m-3">Add Invoice</a>
                        <table class="table table-bordered table-striped table-hover m-3">
                            <tr>
                                <th>#</th>
                                <th>Invoice Date</th>
                                <th>Invoice Number</th>
                                <th>Customer</th>
                                <th>Total Amount</th>
                                <th></th>
                            </tr>
                            @forelse ($invoices as $invoice)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $invoice->invoice_date }}</td>
                                <td>{{ $invoice->invoice_number }}</td>
                                <td>{{ $invoice->customer->name }}</td>
                                <td>{{ number_format($invoice->total_amount, 2) }}</td>
                                <td>
                                    <a href="{{ route('invoices.show', $invoice->id) }}"
                                        class="btn btn-sm btn-info">View invoice</a>
                                    <a href="{{ route('invoices.download', $invoice->id) }}"
                                        class="btn btn-sm btn-warning">Download PDF</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%">No invoices found.</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
