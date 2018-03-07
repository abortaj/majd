<?php
namespace App\Interfaces;
interface SkillTypeInterface extends RepositoryInterface{
    public function findBySkillTypeId($typeId);
}