<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if ( $action === 'create' )
                        {{ __('Create product') }}
                    @elseif ( $action === 'edit' )
                        {{ __('Edit product') }}
                    @endif
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="updateOrCreate">

                        <div class="form-group row">
                            <input id="fields.id" name="fields.id" type="hidden">
                            <label for="fields.name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}
                                *</label>
                            <div class="col-md-10">
                                <input class="form-control @error('fields.name') is-invalid @enderror"
                                       wire:model="fields.name" autofocus
                                       placeholder="{{ __('Product description') }}" name="fields.name" type="text"
                                       value="{{ old('fields.name') }}">
                                @error('fields.name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="fields.price" class="col-md-2 col-form-label text-md-right">{{ __('Price') }}
                            *</label>
                        <div class="col-md-10">
                            <input class="form-control @error('fields.price') is-invalid @enderror"
                                   wire:model="fields.price" step="0,01" placeholder="0,00" name="fields.price"
                                   type="number" value="{{ old('fields.price') }}">
                            @error('fields.price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="card-footer justify-content-between">
                    <button class="btn btn-primary" type="submit">{{ __('Save product') }}</button>
                    <a href="{{ route('products') }}" class=" btn btn-secondary float-right">{{ __('Close') }}</a>
{{--                    <a href="{{ route('products') }}" class=" btn btn-warning float-right">{{ __('test') }}</a>--}}
                </div>
                </form>

            </div>
        </div>
    </div>
</div>
