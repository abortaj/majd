<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'first_name','last_name', 'email','avatar','reference_id','invitation_token','job_title','bio','status','verify-email',
        'verify_token','active',
        'city_id','mobile_no','hourly_rate','balance','personal_website','avg_response_time','security_question_id',
        'security_custom_question','security_answer', 'password',
    ];
    protected $appends = [
        'invitation_url'
    ];
    public function getInvitationUrlAttribute(){
        return url('/#/register?invitation='.$this->getAttribute('invitation_token'));
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills(){
        return $this->belongsTo('App\Skill');
    }

    public function findForPassport($identifier)
    {
        return User::orWhere('email', $identifier)->where('status', 1)->where('active',1)->first();
    }
//    public function byUser()
//    {
//        return $this->belongsTo(User::class,'reference_id');
//    }
//
//    public function usersByMe()
//    {
//        return $this->hasMany(User::class,'invitation_from');
//    }

    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }

}
