<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $participants = Participant::all();
        $posts = DB::table('participants')->orderBy('points','desc')->limit(1)->get();
        // return FacadesView::make('customer-home')->with(compact('customers'))->with(compact('posts'));
        // $product = Product::find($posts->product);
        // return FacadesView::make('customer-home')->with(compact('posts'))->with(compact('product'));
        $products = Product::all();
        

        return FacadesView::make('customer-home')->with(compact('posts'))->with(compact('products'));
    }
    public function adminHome()
    {
        return view('admin');
    }
}
