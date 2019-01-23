<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * $table->increments('id');
        $table->string('name');
        $table->string('address');
        $table->string('email');
        $table->string('telephone');
        $table->timestamps();
     */
    protected $fillable = [
        'name',
        'address',
        'email',
        'telephone'
    ];

    public function entities_type()
    {
        return $this->hasMany('App\Entity_type');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
