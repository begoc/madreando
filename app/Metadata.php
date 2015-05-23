<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $table = 'metadata';

    protected $fillable = [
        'title',
        'uri',
        'description',
        'keywords'
    ];

    public function Article()
    {
        return $this->belongsTo('App\Article');
    }
}
