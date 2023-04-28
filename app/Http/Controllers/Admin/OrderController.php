<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends BaseController
{
    public $model = 'App\Models\Order';

    public $viewBase = 'order';

    public $label = 'Siparişler';

    public $singularLabel = 'Sipariş';

    public $routeBase = 'order';

    public function store(Request $request)
    {
        $this->model::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'status' => $request->status ?? 0,
        ]);

        return $this->redirectTo('index');
    }

    public function update(Request $request, $id)
    {
        $model = $this->model::findOrFail($id);

        $model->update([
            'status' => $request->status
        ]);

        return $this->redirectTo('index', true);
    }

    public function done($id)
    {
        $model = $this->model::findOrFail($id);

        $model->update([
            'status' => 3
        ]);

        if ($model->site->netgsm_status == 1) {
            # sms gonder...
            $data = [
                'usercode' => env('NETGSM_USER'),
                'password' => env('NETGSM_PASS'),
                'gsmno' => $model->user->phone,
                'message' => $model->site->netgsm_message,
                'msgheader' => $model->site->netgsm_header,
                'dil' => 'TR'
            ];

            $string =  http_build_query($data);

            $res = file_get_contents('https://api.netgsm.com.tr/sms/send/get/?'.$string);
        }

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
