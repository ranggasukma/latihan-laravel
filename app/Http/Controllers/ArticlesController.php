<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Category;

class ArticlesController extends Controller
{
    public function index()
    {
        // $guests = DB::table('guests')->get();
        // return view('addGuestForm',['guests'=>$guests]);
        $articles = Articles::with('category')->get();
        $category = Category::all();
        // print_r($articles);
        return view('addArticles',['articles'=>$articles],['category'=>$category]);
    }

    public function store(Request $request)
    {
        $article = new Articles;
        $article->title = $request->input('title');
        $article->article = $request->input('article');
        $article->category_id = $request->input('category_id');
        $article->save();
        return redirect('/')->with('Message','Sukses di upload');
    }

    public function destroy($id=0)
    {
        $article = Articles::find($id);
        $article ->delete();
        return redirect('/')->with('Message','Sukses di hapus');
    }


}
