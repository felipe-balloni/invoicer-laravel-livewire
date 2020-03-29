<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;

class Form extends Component
{
    public $fields, $field_id = null;

    public function mount($product = null)
    {
        if ( isset($product) ) {
            $this->fields = Product::findOrFail($product)->toArray();
            $this->field_id =  $this->fields['id'];
        };
    }

    public function update()
    {
        // Triggered on wire:click
        $this->validate([
            'fields.name'  => 'required|min:3',
            'fields.price' => 'required|numeric|max:999999.99',
        ]);

        // dd($this->fields, $this->field_id);

        Product::updateOrCreate(['id' => $this->field_id], $this->fields);

        session()->flash('message', 'Product successfully created or updated.');

        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.admin.products.form');
    }
}
