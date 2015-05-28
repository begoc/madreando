<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
