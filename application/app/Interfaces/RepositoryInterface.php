<?php
namespace App\Interfaces;
interface RepositoryInterface{


    public function create($data);
    public function find($id , $with=[]);
    public function delete($id);
    public function update($id, $data);
    public function count();
    public function pluck($name="name", $key="id");

}