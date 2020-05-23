<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;
use SebastianBergmann\Environment\Console;

class Form extends Component
{
    public $fields, $field_id = null, $action;

    private $validations = [
        'fields.name'  => 'required|min:3',
        'fields.price' => 'required|numeric|max:999999.99',
    ];

    public function mount($product = null, $action = null)
    {
        if ( isset($product) ) {
            $this->fields = Product::findOrFail($product)->toArray();
            $this->field_id =  $this->fields['id'];
        };
        $this->action=request('action', $action);
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->validations);
    }

    public function updateOrCreate()
    {
        // Triggered on wire:click
        $this->validate($this->validations);

        // dd($this->fields, $this->field_id);

        Product::updateOrCreate(['id' => $this->field_id], $this->fields);

        if ( $this->action === 'create' ) {
            session()->flash('success', __('Product successfully created.'));
        } elseif ($this->action === 'edit' ){
            session()->flash('success', __('Product successfully edited.'));
        }

        return $this->redirectRoute('products', true);
    }

    public function render()
    {
        return view('livewire.admin.products.form');
    }
}
