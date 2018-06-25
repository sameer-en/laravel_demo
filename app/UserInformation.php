<?php

namespace App;

// use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    //
    // use Notifiable;
    protected $table = 'users_infos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'birthdate', 'gender','address'
    ];

    

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }

}
