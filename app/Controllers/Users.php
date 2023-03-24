<?php
namespace App\Controllers;
use App\Models\UsersModel;

class Users extends BaseController
{
    public function index(){
        $session = \Config\Services::session();
        $data['session'] = $session;

        $model = new UsersModel();
        $userData = $model->getRecords();
        $data['user_data'] = $userData;
        return view('/users/list',$data);
    }

    public function create(){
        $session = \Config\Services::session();
        helper('form');
        $data=[];
        if ($this->request->getMethod() == 'post') {
           $input = $this->validate([
            'name' => 'required|min_length[5]',
            'email' => 'required|valid_email|trim',
            'phone' => 'required|min_length[10]'
           ]);
           if ($input == true) {
              //form validated successfully
              $model = new UsersModel();
              $model->save([
                  'name' => $this->request->getPost('name'),
                  'email' => $this->request->getPost('email'),
                  'phone' => $this->request->getPost('phone'),
                  'address' => $this->request->getPost('address')
                //   'create_date' => $this->request->getPost('name'),
                //   'create_date' => $this->request->getPost('name'),
              ]);
              $session->setFlashdata('success','Record added successfully.');
              return redirect()->to('/users');
           }else{
               //form not validated successfully
            $data['validation'] = $this->validator;
           }
        }
        return view('/users/create',$data);
    }

    public function edit($id){
        $session = \Config\Services::session();
        helper('form');
        $data=[];
        $model = new UsersModel();
        $userData = $model->getRow($id);
        $data['user'] = $userData;
        if (empty($userData)) {
            $session->setFlashdata('error','Record not found.');
           return redirect()->to('/users');
        }
        if ($this->request->getMethod() == 'post') {
           $input = $this->validate([
            'name' => 'required|min_length[5]',
            'email' => 'required|valid_email|trim',
            'phone' => 'required|min_length[10]'
           ]);
           if ($input == true) {
              //form validated successfully
              $model->update($id,[
                  'name' => $this->request->getPost('name'),
                  'email' => $this->request->getPost('email'),
                  'phone' => $this->request->getPost('phone'),
                  'address' => $this->request->getPost('address'),
                  'update_date' => date('Y-m-d H:i:s')
                //   'create_date' => $this->request->getPost('name'),
              ]);
              $session->setFlashdata('success','Record update successfully.');
              return redirect()->to('/users');
           }else{
               //form not validated successfully
            $data['validation'] = $this->validator;
           }
        }
        return view('/users/edit',$data);
    }

    public function delete($id){
        $session = \Config\Services::session();
        $model = new UsersModel();
        $userData = $model->getRow($id);
        if (empty($userData)) {
            $session->setFlashdata('error','Record not found.');
            return redirect()->to('/users');
        }
        $model->delete($id);
        $session->setFlashdata('success','Record deleted successfully.');
        return redirect()->to('/users');
    }
}

?>