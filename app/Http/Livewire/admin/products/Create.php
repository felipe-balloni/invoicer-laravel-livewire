<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;

class Create extends Component
{
    public $name = '';
    public $price = '';

    public function render()
    {
        return view('livewire.admin.products.create');
    }

    public function save()
    {
        $this->validate([
            'name'  => 'required|min:3',
            'price' => 'required|numeric|max:999999.99',
        ]);

        Product::create([
            'name'  => $this->name,
            'price' => $this->price
        ]);

        session()->flash('message', 'Product successfully created.');

        return redirect()->route('products');
    }
}
