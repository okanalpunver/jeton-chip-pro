<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerController extends BaseController
{
    public $model = 'App\Models\Seller';

    public $viewBase = 'seller';

    public $label = 'Satıcılar';

    public $singularLabel = 'Satıcı';

    public $routeBase = 'seller';

    public function store(Request $request)
    {
        $this->model::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'qty' => $request->qty,
            'amount' => $request->amount,
            'status' => $request->status ?? 0,
        ]);

        return $this->redirectTo('index');
    }

    public function update(Request $request, $id)
    {
        $model = $this->model::findOrFail($id);

        $model->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'qty' => $request->qty,
            'amount' => $request->amount,
            'status' => $request->status
        ]);

        return $this->redirectTo('index', true);
    }

    public function done($id)
    {
        $model = $this->model::findOrFail($id);

        $model->update([
            'status' => 1
        ]);

        return $this->redirectTo('index', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->model::findOrFail($id);
        
        if ($model->status != 1) {
            $model->delete();
        } else {
            return abort(403);
        }

    }

    public function buy()
    {
        $model = Setting::where('key', 'buy')->first();
        return view('admin.seller.buy', compact('model'));
    }

    public function buyUpdate(Request $request, $id) {
        $model = Setting::findOrFail($id);

        if ($model) {
            $model->update([
                'value' => $request->value
            ]);
        }

        return back();
    }
}
