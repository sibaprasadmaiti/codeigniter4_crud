<?php
namespace App\Models;

use CodeIgniter\Model;
Class UsersModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['name','phone','email','address'];

    public function getRecords(){
        return $this->orderBy('id','DESC')->findAll();
    }

    public function getRow($id){
        return $this->where('id',$id)->first();
    }
}
?>