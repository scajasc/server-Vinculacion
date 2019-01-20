<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity_type extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * $table->increments('id');
        $table->integer('entity_id')->unsigned();
        $table->foreign('entity_id')->references('id')->on('entities');
        $table->string('name_type');
        $table->timestamps();
     */
    protected $fillable = [
        'name_type'
    ];

    public function entities()
    {
        return $this->hasMany('App\Entity');
    }

}
