<?php

namespace App\Http\Controllers\Admin\Site;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BaseController extends Controller
{
    protected $site;

    public $relation;
    
    public $viewBase;
    
    public $label;
    
    public $singularLabel;

    public $routeBase;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        
        $this->middleware(function ($request, $next) {
            if($request->session()->has('site')) {
                $this->site = Site::find($request->session()->get('site'));
            } 

            if (!$this->site) {
                $this->site = Site::first();
                $request->session()->put('site', $this->site->id);
            }

            return $next($request);
        });

        $this->resource = [
            'viewBase' => $this->viewBase,
            'label' => $this->label,
            'singularLabel' => $this->singularLabel,
            'routeBase' => $this->routeBase,
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function api()
    {
        return Datatables::eloquent($this->site->{"$this->relation"}())->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.$this->viewBase.index", $this->resource);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.$this->viewBase.form", $this->resource);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->site->{"$this->relation"}()->findOrFail($id);
        return view("admin.$this->viewBase.form", ['model' => $model], $this->resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->site->{"$this->relation"}()->findOrFail($id);
        $model->delete();
    }

    public function redirectTo($route, $update = false)
    {
        $message = [
            'title' => 'Eklendi!',
            'text' => "$this->singularLabel başarıyla eklendi."
        ];
        
        if ($update) {
            $message = [
                'title' => 'Güncellendi!',
                'text' => "$this->singularLabel başarıyla güncellendi."
            ];
        }

        return redirect()->route("admin.$this->routeBase.$route")->with('flash', $message);
    }
}
