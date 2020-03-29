@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Add new customer</div>

                    <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="POST">
                            @csrf
                            Name*: <input type="text" name='name' class="form-control" required />
                            Address*: <input type="text" name='address' class="form-control" required />
                            Postcode/ZIP: <input type="text" name='postcode' class="form-control" />
                            City*: <input type="text" name='city' class="form-control" required />
                            State: <input type="text" name='state' class="form-control" />
                            Country*:
                            <select class="form-control" required name="country_id">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->title }} ({{ $country->shortcode }})</option>
                                @endforeach
                            </select>
                            Phone: <input type="text" name='phone' class="form-control" />
                            Email: <input type="email" name='email' class="form-control" />
                            <br />
                            <b>Additional fields</b> (optional):
                            <br />
                            <table class="table table-bordered table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-center" width="50%">Field</th>
                                    <th class="text-center">Value</th>
                                </tr>
                                @for ($i = 0; $i <= 2; $i++)
                                    <tr>
                                        <td class="text-center">
                                            <input type="text" name='customer_fields[{{ $i }}][field_key]' class="form-control" />
                                        </td>
                                        <td class="text-center">
                                            <input type="text" name='customer_fields[{{ $i }}][field_value]' class="form-control" />
                                        </td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
                            <input type="submit" value="Save customer" class="btn btn-primary" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
