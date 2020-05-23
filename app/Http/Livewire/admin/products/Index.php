<?php

namespace App\Http\Livewire\Admin\Products;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        $products = Product::paginate(10);
        return view('livewire.admin.products.index', compact('products'));
    }

    public function edit($id)
    {
        //temp
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        session()->flash('danger', __('Product successfully deleted.'));
    }
}
