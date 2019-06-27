<?php


namespace App;


use Illuminate\Support\Arr;

trait RecordsActivity
{

    public $oldAttributes = [];

    // BOOT METHOD
    public static function bootRecordsActivity(){

        foreach(self::recordableEvents() as $event){
            static::$event(function ($model) use ($event){
                $model->recordActivity($model->activityDescription($event));
            });

            if ($event === 'updated'){
                static::updating(function ($model){
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }

    }

    protected function activityDescription($description){

        return "{$description}_" . strtolower(class_basename($this)); // created_task
    }

    /**
     * @return array
     */
    public static function recordableEvents()
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }

        return ['created', 'updated'];
    }

    /**
     * @param $description
     */
    public function recordActivity($description){

        $this->activity()->create([
            'user_id' => ($this->project ?? $this)->owner->id,
            'description' => $description,
            'changes' => $this->activityChanges(),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project_id
        ]);
    }

    /**
     * @return mixed
     */
    public function activity(){

        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * @param $description
     * @return array
     */
    protected function activityChanges(){

        if ($this->wasChanged()) {
            return [
                'before' => Arr::except(array_diff($this->oldAttributes, $this->getAttributes()), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at')
            ];
        }
    }

}
