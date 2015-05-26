<?php
namespace App\Http\Controllers\Article;

use App\Article;
use App\Http\Controllers\Controller;
use App\Image;
use App\Metadata;
use App\Paragraph;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $info = $request->session()->get('info');

        $articles = Article::paginate(15);

        return view('article.list', compact('articles', 'info'));
    }

    public function edit(Request $request, $id = null)
    {
        $info = $request->session()->get('info');

        $article = Article::findOrNew($id);

        return view('article.edit', compact('article', 'info'));
    }

    public function save(Request $request)
    {
        /** @var Article $article */
        $article = Article::findOrNew($request->get('id'));

        $article->fill($request->all());

        if (!$article->exists) {
            $article->save();
        }

        $inputParagraphs = $request->get('paragraphs', []);

        if (!empty($inputParagraphs)) {
            foreach ($inputParagraphs as $inputParagraph) {
                /** @var Paragraph $paragraph */
                $paragraph = $article->paragraphs()->findOrNew($inputParagraph['id']);

                $paragraph->fill($inputParagraph);

                if (!$paragraph->exists) {
                    $paragraph->article()->associate($article);

                    $paragraph->save();
                }

                if (isset($inputParagraph['image']) && !isset($inputParagraph['image']['uri'])) {
                    if ($paragraph->image) {
                        $paragraph->image->fill($inputParagraph['image']);
                    } else {
                        /** @var Image $image */
                        $image = new Image($inputParagraph['image']);
                        $image->paragraph()->associate($paragraph);

                        $image->save();
                    }
                }
            }
        }

        if ($article->metadata) {
            $article->metadata->fill($request->get('metadata', []));
        } else {
            $metadata = new Metadata($request->get('metadata', []));

            $metadata->article()->associate($article);

            $metadata->save();
        }

        $article->push();

        return redirect(route('admin.article.edit', ['id' => $article->id]))->with('info', 'Artículo guardado');
    }

    public function remove(Request $request, $id)
    {
        Article::destroy($id);

        return redirect(
            route('admin.article.list', ['page' => $request->get('page')])
        )->with('info', 'Artículo eliminado');
    }
}
