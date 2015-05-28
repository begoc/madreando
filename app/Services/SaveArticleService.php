<?php

namespace App\Services;

use App\Article;
use App\Image;
use App\Metadata;
use App\Paragraph;

use App\Section;
use Illuminate\Support\Str;

class SaveArticleService
{
    public function save(array $data)
    {
        /** @var Article $article */
        $article = Article::findOrNew(array_get($data, 'id'))->load(['paragraphs', 'metadata']);
        $article->paragraphs->keyBy('id');

        $article->fill($data);

        if (!$article->exists) {
            /** @var Section $section */
            $section = Section::find($data['section_id']);

            $article->section()->associate($section);

            $article->save();
        }

        if ($article->metadata) {
            $article->metadata->fill(array_get($data, 'metadata', []));
        } else {
            $metadata = new Metadata(array_get($data, 'metadata', []));

            if (!array_get($data, 'metadata.uri')) {
                $uri = $article->created_at->format('Y/m/d') . Str::slug($article->title);
                $metadata->uri = $uri;
            }

            $metadata->article()->associate($article);

            $metadata->save();
        }

        $paragraphsData = array_get($data, 'paragraphs', []);

        foreach ($paragraphsData as $paragraphData) {
            /** @var Paragraph $paragraph */
            $paragraph = $article->paragraphs()->findOrNew($paragraphData['id']);

            $paragraph->fill($paragraphData);

            if (!$paragraph->exists) {
                $paragraph->article()->associate($article);

                $paragraph->save();
            }

            if (array_get($paragraphData, 'image')) {
                if (array_get($paragraphData, 'image.uri')) {
                    if ($paragraph->image) {
                        $paragraph->image->fill(array_get($paragraphData, 'image'));
                    } else {
                        /** @var Image $image */
                        $image = new Image(array_get($paragraphData, 'image'));
                        $image->paragraph()->associate($paragraph);

                        $image->save();
                    }
                }
            }
        }

        $article->push();

        $paragraphsToRemove = $article->paragraphs->except(array_pluck($paragraphsData, 'id'));
        foreach ($paragraphsToRemove as $paragraph) {
            $paragraph->delete();
        }

        return $article;
    }
}
