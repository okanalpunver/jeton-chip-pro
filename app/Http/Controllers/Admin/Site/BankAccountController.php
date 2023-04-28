<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Requests\Admin\Site\BankAccountRequest;

class BankAccountController extends BaseController
{
    public $relation = 'bankAccounts';

    public $viewBase = 'site.bank-account';

    public $label = 'Banka Hesapları';

    public $singularLabel = 'Banka Hesabı';

    public $routeBase = 'site.bank-account';

    public function store(BankAccountRequest $request)
    {
        $data = [
            'name' => $request->name,
            'account_holder' => $request->account_holder,
            'branch_number' => $request->branch_number,
            'account_number' => $request->account_number,
            'iban' => $request->iban,
            'description' => $request->description,
            'is_free_atm' => $request->is_free_atm,
        ];

        if ($request->hasFile('logo')) {
            $path = $request->logo->store('images', 'public');
            $data['logo'] = $path;
        }

        $this->site->{"$this->relation"}()->create($data);

        return $this->redirectTo('index');
    }

    public function update(BankAccountRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'account_holder' => $request->account_holder,
            'branch_number' => $request->branch_number,
            'account_number' => $request->account_number,
            'iban' => $request->iban,
            'description' => $request->description,
            'is_free_atm' => $request->is_free_atm,
        ];

        if ($request->hasFile('logo')) {
            $path = $request->logo->store('images', 'public');
            $data['logo'] = $path;
        }

        $this->site->{"$this->relation"}()->findOrFail($id)->update($data);

        return $this->redirectTo('index');
    }
}
