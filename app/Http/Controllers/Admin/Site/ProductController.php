<?php

namespace App\Http\Controllers\Admin\Site;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\Site\ProductRequest;
use App\Models\Product;

class ProductController extends BaseController
{
    public $relation = 'products';

    public $viewBase = 'site.product';

    public $label = 'Ürünler';

    public $singularLabel = 'Ürün';

    public $routeBase = 'site.product';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        $products = Product::whereIn('category_id', $this->site->categories()->pluck('id'));
        return Datatables::eloquent($products)->toJson();
    }

    public function store(ProductRequest $request)
    {
        $this->site->categories()
                   ->find($request->category_id)
                   ->{"$this->relation"}()->create([
                        'price' => $request->price,
                        'qty' => $request->qty,
                        'status' => $request->status ?? 0,
                    ]);

        return $this->redirectTo('index');
    }

    public function update(ProductRequest $request, $id)
    {
        $this->site->{"$this->relation"}()->findOrFail($id)->update([
            'category_id' => $request->category_id,
            'price' => $request->price,
            'qty' => $request->qty,
            'status' => $request->status ?? 0,
        ]);

        return $this->redirectTo('index');
    }
}
