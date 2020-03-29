{{-- {{ dd($product)}} --}}

<div>
   <div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit product') }}</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }} *</label>
                            <div class="col-md-10">

                                {{ Form::text('name', old('name'), ['class' => 'form-control ' . ( $errors->has('name') ? ' is-invalid' : '' ),
                                                             'wire:model' => 'fields.name',
                                                             'autofocus',
                                                            //  'placeholder' => __('Product description'),
                                                             'required'
                                                             ]) }}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-2 col-form-label text-md-right">{{ __('Price') }} *</label>

                            <div class="col-md-10">
                                {{ Form::number('price', old('price'), ['class' => 'form-control ' . ( $errors->has('price') ? ' is-invalid' : '' ),
                                                                                             'wire:model' => 'fields.price',
                                                                                             'step' => '0,01',
                                                                                             'placeholder' => '0,00',
                                                                                             'required'
                                                                                            ]) }}
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="card-footer justify-content-between">
                        <input class="btn btn-primary" wire:click="update" type="submit" value="{{ __('Save product') }}">
                        <a href="{{ route('products') }}" class="btn btn-secondary float-right">{{ __('Close') }}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
