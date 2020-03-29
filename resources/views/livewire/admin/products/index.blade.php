<div>
    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Products') }}</div>
                    <div class="card-body">
                        <a class="btn btn-primary float-right mb-3" href="{{ route('products.create') }}">{{ __('Add new product') }}</a>
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr class="row">
                                    <th class="col-sm-1" scope="col">ID</th>
                                    <th class="col-sm-6" scope="col">{{ __('Name') }}</th>
                                    <th class="col-sm-3" scope="col">{{ __('Price') }}</th>
                                    <th class="col-sm-2" scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            @forelse ($products as $product)
                            <tr class="row">
                                <th class="col-sm-1 text-center" scope="row">{{ $loop->iteration }}</th>
                                <td class="col-sm-6 text-justify">{{ $product->name }}</td>
                                <td class="col-sm-3 text-right"><span class="text-left"> R$</span> {{ $product->price }}
                                </td>
                                <td class="col-sm-2 text-center">
                                    <a class="btn btn-warning btn-sm" href="#" wire:click="edit({{ $product->id }})"><i class="far fa-edit"></i></i></a>
                                    <a class="btn btn-danger btn-sm" href="#" wire:click="delete({{ $product->id }})"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">{{ __('No products found.') }}</td>
                            </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
