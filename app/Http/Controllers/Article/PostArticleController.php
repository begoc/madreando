<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Metadata;
use App\Section;

class PostArticleController extends Controller
{
    public function index($section, $uri)
    {
        $metadata = Metadata::findByUri($uri);

        $article = $metadata->article;

        $sections = Section::all();

        return view('article.post', compact('article', 'section', 'sections'));
    }
}
