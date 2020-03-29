@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Invoice number {{ $invoice->invoice_number }}</div>

                <div class="card-body">
                    <div class="container">

                        <div class="row clearfix">
                            @if (config('invoices.logo_file') != '')
                                <div class="col-md-12 text-center">
                                    <img src="{{ config('invoices.logo_file') }}" />
                                </div>
                            @endif

                            <div class="col-md-4 offset-4 text-center">
                                <b>Invoice {{ $invoice->invoice_number }}</b>
                                <br />
                                {{ $invoice->invoice_date }}
                            </div>
                        </div>

                        <div class="row clearfix" style="margin-top:20px">
                            <div class="col-md-12">
                                <div class="float-left col-md-6">
                                    <b>To</b>:
                                    {{ $invoice->customer->name }}
                                    <br /><br />

                                    <b>Address</b>:
                                    {{ $invoice->customer->address }}
                                    @if ($invoice->customer->postcode != '')
                                        ,
                                        {{ $invoice->customer->postcode }}
                                    @endif
                                    , {{ $invoice->customer->city }}
                                    @if ($invoice->customer->state != '')
                                        ,
                                        {{ $invoice->customer->state }}
                                    @endif
                                    , {{ $invoice->customer->country->title }}

                                    @if ($invoice->customer->phone != '')
                                        <br /><br /><b>Phone</b>: {{ $invoice->customer->phone }}
                                    @endif
                                    @if ($invoice->customer->email != '')
                                        <br /><br /><b>Email</b>: {{ $invoice->customer->email }}
                                    @endif

                                    @if ($invoice->customer->customer_fields)
                                        @foreach ($invoice->customer->customer_fields as $field)
                                            <br /><br /><b>{{ $field->field_key }}</b>: {{ $field->field_value }}
                                        @endforeach
                                    @endif
                                </div>
                                <div class="float-right col-md-4">
                                    <b>From</b>: {{ config('invoices.seller.name') }}
                                    <br /><br />
                                    <b>Address</b>: {{ config('invoices.seller.address') }}
                                    @if (config('invoices.seller.email') != '')
                                        <br /><br />
                                        <b>Email</b>: {{ config('invoices.seller.email') }}
                                    @endif
                                    @if (is_array(config('invoices.seller.additional_info')))
                                        @foreach (config('invoices.seller.additional_info') as $key => $value)
                                            <br /><br />
                                            <b>{{ $key }}</b>: {{ $value }}
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix" style="margin-top:20px">
                            <div class="col-md-12">
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                    <tr>
                                        <th class="text-center"> # </th>
                                        <th class="text-center"> Product </th>
                                        <th class="text-center"> Qty </th>
                                        <th class="text-center"> Price ({{ config('invoices.currency') }}) </th>
                                        <th class="text-center"> Total ({{ config('invoices.currency') }}) </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($invoice->invoice_items as $item)
                                    <tr id='addr0'>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ number_format($item->quantity * $item->price, 2) }}</td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:20px">
                            <div class="col-md-12">
                                <div class="float-right col-md-5">
                                    <table class="table table-bordered table-hover" id="tab_logic_total">
                                        <tbody>
                                        <tr>
                                            <th class="text-center" width="60%">Sub Total ({{ config('invoices.currency') }})</th>
                                            <td class="text-center">{{ number_format($invoice->total_amount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Tax</th>
                                            <td class="text-center">{{ $invoice->tax_percent }}%</td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Tax Amount ({{ config('invoices.currency') }})</th>
                                            <td class="text-center">{{ number_format($invoice->total_amount * $invoice->tax_percent / 100, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Grand Total ({{ config('invoices.currency') }})</th>
                                            <td class="text-center">{{ number_format($invoice->total_amount + ($invoice->total_amount * $invoice->tax_percent / 100), 2) }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix" style="margin-top:20px">
                            <div class="col-md-12">
                                {{ config('invoices.footer_text') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

