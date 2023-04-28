<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends BaseController
{
    public $model = 'App\Models\Payment';

    public $viewBase = 'payment';

    public $label = 'Ödemeler';

    public $singularLabel = 'Ödeme';

    public $routeBase = 'payment';

    public function store(AdminRequest $request)
    {
        $this->model::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status ?? 0,
        ]);

        return $this->redirectTo('index');
    }

    public function update(AdminRequest $request, $id)
    {
        $model = $this->model::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'status' => $request->status ?? 0,
        ];

        if ($request->has('password')) {
            # change password if present...
            $data = Arr::add($data, 'password', bcrypt($request->password));
        }

        $model->update($data);

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
        return abort(403);
    }
}
