<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Image image
 */
class Paragraph extends Model
{
    protected $table = 'paragraphs';

    protected $fillable = [
        'headline',
        'content'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }

    public function image()
    {
        return $this->hasOne('App\Image');
    }
}
