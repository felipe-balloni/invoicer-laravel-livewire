@extends('layouts.pdf')

@section('content')
    <div class="clearfix">
        @if (config('invoices.logo_file') != '')
            <div class="text-center">
                <img src="{{ asset(config('invoices.logo_file')) }}" />
            </div>
        @endif

        <div class="text-center">
            <b>Invoice {{ $invoice->invoice_number }}</b>
            <br>
            {{ $invoice->invoice_date }}
        </div>
    </div>

    <div class="clearfix mt-3">
        <div class="float-left">
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

        <div class="float-right">
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

    <div class="clearfix mt-3">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="text-center"> # </th>
                <th> Product </th>
                <th class="text-center"> Qty </th>
                <th class="text-center"> Price ({{ config('invoices.currency') }}) </th>
                <th class="text-center"> Total ({{ config('invoices.currency') }}) </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($invoice->invoice_items as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-center">{{ $item->price }}</td>
                    <td class="text-center">{{ number_format($item->total, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="clearfix mt-3">
        <table class="float-right table tbl-total">
            <tbody>
            @if ($invoice->tax_percent > 0)
                <tr>
                    <th class="text-right">Sub Total ({{ config('invoices.currency') }}):</th>
                    <td class="text-left">
                        {{ number_format($invoice->total, 2) }}
                    </td>
                </tr>
                <tr>
                    <th class="text-right">Tax:</th>
                    <td class="text-left">
                        {{ $invoice->tax_percent }}%
                </tr>
                <tr>
                    <th class="text-right">Tax Amount ({{ config('invoices.currency') }}):</th>
                    <td class="text-left">
                        {{ number_format($invoice->total * $invoice->tax_percent / 100, 2) }}
                    </td>
                </tr>
            @endif
            <tr>
                <th class="text-right">Grand Total ({{ config('invoices.currency') }}):</th>
                <td class="text-left">
                    @if ($invoice->tax_percent > 0)
                        {{ number_format($invoice->total * (1 + $invoice->tax_percent / 100), 2) }}
                    @else
                        {{ number_format($invoice->total, 2) }}
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="clearfix mt-3">
        {{ config('invoices.footer_text') }}
    </div>
@endsection
