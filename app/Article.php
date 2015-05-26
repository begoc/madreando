<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property Paragraph[] paragraphs
 * @property Metadata metadata
 */
class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title'
    ];

    protected $dates = [
        'published_at'
    ];

    public function paragraphs()
    {
        return $this->hasMany('App\Paragraph');
    }

    public function metadata()
    {
        return $this->hasOne('App\Metadata');
    }

    /*public function createdBy()
    {
        return $this->hasOne('App\User');
    }*/
}
