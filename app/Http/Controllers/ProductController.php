<?php

namespace App\Http\Controllers;

use App\Charts\Product_quantity;
use App\Models\Participant;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\View\View as ViewView;

class ProductController extends Controller
{
    public function index(Request $request) {
        $p = Product::pluck('name','stock_quantity');
      //   return ;
      //   return ;
        $productsChart = new Product_quantity;
        $productsChart->labels($p->values());
        $productsChart->dataset('Quantity of Product', 'bar', $p->keys());
      return view('dashboard_products', compact('productsChart'));
          }
          public function index2() {
           
           
          
           $products = Product::all();
           $participants = Participant::all();
            return FacadesView::make('customer-products')->with(compact('products'))->with(compact('participants'));
          }
          public function show($id)
           {
             $product =  Product::find($id);
             
             $participant = Participant::find($product->participant_id);
             return FacadesView::make('product')->with(compact('product'))->with(compact('participant'));

          }
          public function booked(Request $request)
          {
$data=Product::find($request->id);
$data->stock_quantity -= $request->stock_quantity;

$participant = Participant::find($data->participant_id);

$returnMade = DB::table('bookings')
->where([['product_number','=',$data->product_number],
['user_id','=', auth()->user()->id]
])->count();

if($returnMade != 0)
{

     if($request->stock_quantity == 1){
      $participant->points += 2;  
     }elseif($request->stock_quantity > 1){
      $participant->points += 4;  

     }
}else {
  $participant->points += 1;  
}
$participant->save();
$data->save();
$customer = User::all();
DB::table('bookings')->insert(
['product_number'=> $data->product_number,
'user_id'=> auth()->user()->id,
'quantity'=> $request->input('stock_quantity')
]);
$data2=Product::find($request->id);
$participant2 = Participant::find($data2->participant_id);
$participant2->sales_percentage = ((($data2->quantity_published)-($data2->stock_quantity))/($data2->quantity_published))*100;
$participant2->save();


return redirect('customer-home');
          }
          
}
