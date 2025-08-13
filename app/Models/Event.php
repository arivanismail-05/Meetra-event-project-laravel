<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    
    use HasFactory, Notifiable, SoftDeletes;


    protected $guarded = [ ];


    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'event_users', 'event_id', 'user_id')
        ->withTimestamps();
    }

    protected $appends = ['full_path_image', 'created_at_readable', 'deleted_at_readable'];


    public function getFullPathImageAttribute()
    {
        return env('APP_URL').'event_image/'.$this->image;
    }

    public function getCreatedAtReadableAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    public function getDeletedAtReadableAttribute()
    {

        if($this->deleted_at == null)
            return 'Not Deleted';
        else
            return $this->deleted_at->diffForHumans();
    }

}
