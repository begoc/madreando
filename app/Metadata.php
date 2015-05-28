<?php namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string uri
 */
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

    public static function findByUri($uri)
    {
        return static::firstByAttributes([
            'uri' => $uri
        ]);
    }
}
