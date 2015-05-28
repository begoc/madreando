<?php
namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveArticleRequest;
use App\Section;
use App\Services\SaveArticleService;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class ArticleController extends Controller
{

    public function __construct(Guard $auth)
    {
        $this->middleware('auth');

        $this->auth = $auth;
    }

    public function index(Request $request, $sectionId)
    {
        $info = $request->session()->get('info');

        $articles = Section::find($sectionId)->articles()->paginate(15);

        return view('article.list', compact('articles', 'info', 'sectionId'));
    }

    public function edit(Request $request, $sectionId, $id = null)
    {
        $info = $request->session()->get('info');

        $article = Article::findOrNew($id)->load(['paragraphs', 'metadata']);

        return view('article.edit', compact('article', 'info', 'sectionId'));
    }

    public function save(SaveArticleRequest $request, SaveArticleService $saveArticle)
    {
        $article = $saveArticle->save($request->all());

        $request->updateImages();

        return redirect(route('admin.article.edit', ['id' => $article->id, 'sectionId' => $article->section_id]))->with('info', 'Artículo guardado');
    }

    public function remove(Request $request, $id, $sectionId)
    {
        Article::destroy($id);

        return redirect(
            route('admin.article.list', ['page' => $request->get('page'), 'sectionId' => $sectionId])
        )->with('info', 'Artículo eliminado');
    }
}
