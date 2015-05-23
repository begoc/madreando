<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'uri',
        'position'
    ];

    public function paragraph()
    {
        return $this->belongsTo('App\Paragraph');
    }
}
