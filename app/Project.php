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
        $table->integer('tutor_id')->unsigned();
        $table->foreign('tutor_id')->references('id')->on('tutors');
        $table->integer('coordinator_id')->unsigned();
        $table->foreign('coordinator_id')->references('id')->on('coordinators');
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

    public function agreement()
    {
        return $this->belongsTo('App\Agreement');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function tutor()
    {
        return $this->hasOne('App\Tutor');
    }
    public function coordinator()
    {
        return $this->hasOne('App\Coordinator');
    }



}
