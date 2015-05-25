<?php
namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function edit($id = null)
    {
        $article = Article::findOrNew($id);

        return view('article.edit', compact('article'));
    }

    public function save(Request $request)
    {
        dd($request->all());
        return view('article.edit');
    }
}
