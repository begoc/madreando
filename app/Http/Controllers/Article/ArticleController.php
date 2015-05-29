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
    /**
     * @var Guard
     */
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->middleware('auth');

        $this->auth = $auth;
    }

    public function index(Request $request, $sectionId = 1)
    {
        $info = $request->session()->get('info');

        $section = Section::find($sectionId);

        $articles = $section->articles()->paginate(15);

        $sectionName = $section->name;

        return view('article.list', compact('articles', 'info', 'sectionId', 'sectionName'));
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
