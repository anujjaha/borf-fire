<?php

namespace App\Models\Event;

use Illuminate\Database\Eloquent\Model;
use App\Models\event\Traits\Relationship\Relationship;

/**
 * Class History
 * package App.
 */
class Event extends Model {

    use Relationship;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_name',
        'event_admin',
        'event_title',
        'event_description',
        'event_start_datetime',
        'event_end_datetime',
        'event_status',
        'event_image',
        'created_by',
        'created_at',
        'updated_at'
    ];

}
