<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SiteRequest;
use App\Repositories\SiteCreatorRepository as SiteCreator;
use Illuminate\Http\Request;

class SiteController extends BaseController
{
    public $model = 'App\Models\Site';

    public $viewBase = 'site';

    public $label = 'Siteler';

    public $singularLabel = 'Site';

    public $routeBase = 'site';

    public function change($id)
    {
        $model = $this->model::findOrFail($id);

        session()->put('site', $model->id);

        return redirect(route('admin.site.product.index'))
            ->with('flash', [
                'title' => 'Aktif Site',
                'text' => "$model->fqdn olarak değiştirildi.",
            ]);
    }

    public function store(SiteRequest $request)
    {
        $creator = new SiteCreator($request->except(['_token']));
        $creator->run();

        return $this->redirectTo('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->model::findOrFail($id);
        $availableNetgsmHeaders = explode('<br>', file_get_contents('https://api.netgsm.com.tr/sms/header/?usercode=' . env('NETGSM_USER') . '&password=' . env('NETGSM_PASS')));
        $availableNetgsmHeaders = array_filter($availableNetgsmHeaders);

        $arr = [];
        foreach ($availableNetgsmHeaders as $val) {
            $arr[$val] = $val;
        }

        return view("admin.$this->viewBase.form", ['model' => $model, 'availableNetgsmHeaders' => $arr], $this->resource);
    }

    public function update(SiteRequest $request, $id)
    {
        $model = $this->model::findOrFail($id);

        $data = [
            'name' => $request->name,
            'fqdn' => $request->fqdn,
            'email' => $request->email,
            'phone' => $request->phone,

            'whatsapp' => $request->whatsapp,
            'skype' => $request->skype,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'address' => $request->address,

            'kampanya_line1' => $request->kampanya_line1,
            'kampanya_line2' => $request->kampanya_line2,
            'home_text' => $request->home_text,

            'heading_1' => $request->heading_1,
            'heading_2' => $request->heading_2,


            'lang' => $request->lang,
            'currency' => $request->currency,
            'theme' => $request->theme,
            'skin' => $request->skin,

            'out_of_stock' => $request->out_of_stock,

            'netgsm_status' => $request->netgsm_status,
            'netgsm_header' => $request->netgsm_header,
            'netgsm_message' => $request->netgsm_message,

            'paytr_merchant_id' => $request->paytr_merchant_id,
            'paytr_merchant_key' => $request->paytr_merchant_key,
            'paytr_merchant_salt' => $request->paytr_merchant_salt,
            'paytr_test_mode' => $request->paytr_test_mode,

            'tawk_to' => $request->tawk_to,
            'analytics_id' => $request->analytics_id,

            'status' => 1 //$request->status ?? 0,
        ];

        if ($request->hasFile('logo')) {
            $path = $request->logo->store('images', 'public');
            $data['logo'] = $path;
        }

        if ($request->hasFile('background')) {
            $path = $request->background->store('images', 'public');
            $data['background'] = $path;
        }

        if ($request->hasFile('image1')) {
            $path = $request->image1->store('images', 'public');
            $data['image1'] = $path;
        }

        $model->update($data);

        return $this->redirectTo('index', true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editAbout($id)
    {
        $model = $this->model::findOrFail($id);
        return view("admin.$this->viewBase.about.form", ['model' => $model], $this->resource);
    }

    public function updateAbout(Request $request, $id)
    {
        $model = $this->model::findOrFail($id);

        $model->update([
            'about' => $request->about,
        ]);

        $message = [
            'title' => 'Güncellendi!',
            'text' => "Hakkımızda sayfası başarıyla güncellendi."
        ];

        return redirect()->route('admin.site.about.edit', $id)->with('flash', $message);
    }
}
