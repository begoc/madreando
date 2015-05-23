<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Paragraph extends Model
{
    protected $table = 'paragraphs';

    protected $fillable = [
        'text'
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
