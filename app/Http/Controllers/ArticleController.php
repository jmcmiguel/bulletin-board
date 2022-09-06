<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function all(Request $request){
        $articles = Flight::where('active', 1)
        ->orderBy('name')
        ->take(10)
        ->get();
        return response()->json();
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'title' => 'required',
            'content' => 'required',
        ]);
 
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => Auth::id(),
            'upvotes' => 0,
            'downvotes' =>0,
        ]);

        session()->flash('flash.bannerStyle', 'success');
        return redirect()->route('dashboard');
    }
}
