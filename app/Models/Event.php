<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    
    use HasFactory, Notifiable;


    protected $guarded = [ ];


    public function admin()
    {
        return $this->belongsTo(Admin::class , 'admin_id');
    }



}
