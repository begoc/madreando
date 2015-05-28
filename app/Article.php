<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property Paragraph[] paragraphs
 * @property Metadata metadata
 * @property string title
 * @property Carbon created_at
 * @property int section_id
 */
class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'published_at'
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

    public function section()
    {
        return $this->belongsTo('App\Section');
    }

    /*public function createdBy()
    {
        return $this->hasOne('App\User');
    }*/
}
