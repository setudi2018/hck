<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Department extends Model 
{
    use Sluggable;
    public function sluggable()
    {
        return [
        'slug' => [
        'source' => 'name',
        'onUpdate' => true
        ]
        ];
    }
    protected $fillable = ['name','slug'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function questions()
    {
        return $this->hasMany('App\Question');
    }
}