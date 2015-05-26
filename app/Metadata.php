<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    protected $table = 'metadata';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'uri',
        'description',
        'keywords'
    ];

    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
