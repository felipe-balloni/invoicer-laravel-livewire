<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;

class Edit extends Component
{
    public $fields;

    public function mount($product)
    {
        $this->fields = Product::findOrFail($product)->toArray();
    }

    public function update()
    {
        // Triggered on wire:click
        $this->validate([
            'fields.name'  => 'required|min:3',
            'fields.price' => 'required|numeric|max:999999.99',
        ]);

        Product::updateOrCreate(['id' => $this->fields['id']], $this->fields);

        session()->flash('message', 'Product successfully updated.');

        return redirect()->route('products');
    }

    public function render()
    {
        return view('livewire.admin.products.edit');
    }



}
