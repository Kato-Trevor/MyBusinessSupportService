<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use App\Charts\Participant_points;
use Illuminate\Support\Facades\DB;

class ParticipantController extends Controller
{
    public function index(Request $request) {
  $p = Participant::pluck('name','points');
//   return ;
//   return ;
  $chart = new Participant_points;
  $chart->labels($p->values());
  $chart->dataset('Points earned by Participant', 'bar', $p->keys());
return view('dashboard', compact('chart'));
    }
public function index2() {
    $participants = Participant::all();
    $posts = DB::table('participants')->orderBy('points','desc')->get();

    return view('participant_tables', compact('posts'));
}
public function index3() {

$posts = DB::table('participants')->orderBy('points','desc')->get();
dd($posts);
}
public function show($id){
$participant = Participant::find($id);
$product = $participant->product;
dd($product);

}
}
