<?php
namespace App\Repositories;
use App\Interfaces\SkillTypeInterface;
use App\SkillType;
use Illuminate\Database\Eloquent\Model;

class SkillTypeRepository extends Repository implements SkillTypeInterface{

    public function __construct(SkillType $model)
    {
        parent::__construct($model);
    }

    public function findBySkillTypeId($typeId)
    {
        // TODO: Implement findBySkillTypeId() method.
    }
}