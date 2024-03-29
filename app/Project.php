<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Project extends Model
{
    use RecordsActivity;


    protected $guarded = [];

    /**
     * @return string
     */
    public function path(){
        return "/projects/{$this->id}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    /**
     * @param $body
     * @return Model
     */
    public function addTask($body){
        return $this->tasks()->create(compact('body'));
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function activity(){

        return $this->hasMany(Activity::class)->latest();
    }

    /**
     * Method to invite other users for participation
     */
    public function invite(User $user){

        return $this->members()->attach($user);
    }

    /**
     *
     */
    public function members(){

        return $this->belongsToMany(User::class, 'project_members');
    }

}
