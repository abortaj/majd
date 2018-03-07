<?php
namespace App\Repositories;


use App\Interfaces\UserInterface;
use App\User;

class UserRepository extends Repository implements UserInterface{

//    public $user;
    function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function findByEmail($email)
    {
        return $this->model->where('email',$email)->first();
    }

    public function findById($id)
    {
        return $this->model->where('id',$id)->first();
    }

    public function gridQuery()
    {
        return $this->model->select(['id','first_name','last_name','email','active'])->where('id','!=','1')->where('id','!=',auth()->user()->id);
    }

    public function toggleActive($id)
    {
        $model = $this->model->findOrFail($id);
        $data = ['active' => !$model->active];
        $model->update($data);
        return $model;
    }
    public function findByServiceId($serviceId)
    {
        return $this->model->where('id',$serviceId)->first();
    }
    public function verifyUser($email, $verifyToken)
    {
        $user = $this->model->where(['email'=>$email, 'verify_token'=>$verifyToken, 'status'=>false])->firstOrFail();
        $this->update($user->id,['status'=>true]);
        return $user;
    }
}