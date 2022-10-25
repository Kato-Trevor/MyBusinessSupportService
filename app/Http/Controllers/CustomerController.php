<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Participant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;


class CustomerController extends Controller
{
    public function index(){

        $customers = Customer::all();
        return view('MyPages/products',compact('customers'));
            }
            public function index2() {
                $customers = Customer::all();
                return view('customer_tables', compact('customers'));
            }
            public function home() {
                $products = Product::all();
                $participants = Participant::all();
                $posts = DB::table('participants')->orderBy('points','desc')->limit(1)->get();
                return FacadesView::make('customer-home')->with(compact('products'))->with(compact('posts'));

            
            }
        
           
}
