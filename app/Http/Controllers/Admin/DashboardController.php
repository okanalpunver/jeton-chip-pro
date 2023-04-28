<?php

namespace App\Http\Controllers\Admin;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    protected $site;
    
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
    }

    public function index()
    {
        return view('admin.dashboard.index');
    }
}
