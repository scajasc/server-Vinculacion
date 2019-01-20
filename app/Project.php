<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * $table->increments('id');
        $table->integer('student_id')->unsigned();
        $table->foreign('student_id')->references('id')->on('students');
        $table->integer('entity_id')->unsigned();
        $table->foreign('entity_id')->references('id')->on('entities');
        $table->string('theme');
        $table->string('hours');
        $table->date('start_date');
        $table->date('end_date');
        $table->string('route_file');
        $table->timestamps();
     */
    protected $fillable = [
        'theme',
        'hours',
        'start_date',
        'end_date',
        'route_file'
    ];

    public function entity()
    {
        return $this->belongsTo('App\Entity');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }



}
