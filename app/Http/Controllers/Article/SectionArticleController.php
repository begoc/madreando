<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Metadata;
use App\Section;

class SectionArticleController extends Controller
{
    protected $sections = [
        'embarazo' => 1,
        'lactancia' => 2,
        'alimentación' => 3,
        'ocio' => 4,
        'lecturas+interesantes' => 5,
    ];

    public function index($section)
    {
        $sections = Section::all();

        $section = Section::find($this->sections[$section]);

        $articles = $section->articles;

        return view('article.section', compact('section', 'articles', 'sections'));
    }
}
