<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.products.index', compact('products'));
    }

    public function edit($id)
    {
        //temp
    }

    public function delete($id)
    {
        Product::find($id)->delete();

        session()->flash('message', 'Product successfully deleted.');
    }
}
