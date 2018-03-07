<?php
namespace App\Interfaces;
use App\User;

interface ProfileInterface extends RepositoryInterface {
    /**
     * @param $email
     * @return User
     */
    public function findByEmail($email);
    public function findById($id);
    public function gridQuery();
    public function toggleActive($id);
    public function findByServiceId($id);

}