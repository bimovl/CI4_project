<?php

namespace App\Controllers;
use App\Models\ManusiaModel;

class Manusia extends BaseController
{
    protected $manusiaModel;

    public function __construct()
    {
        $this->manusiaModel = new ManusiaModel();
    }

    public function index()
    {

        $data=[
            'title'=>'Manusia | App Crud',
            'manusia'=> $this->manusiaModel->getManusia()
        ];

        return view('manusia/index', $data);

    }

    public function detail($slug)
    { 

        $data=[
            'title'=>'Detail Manusia | App Crud',
            'manusia'=> $this->manusiaModel->getManusia($slug)
        ];
        
        if(empty($data['manusia'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Not Found');
        }

        return view('manusia/detail', $data);
    }

    public function create()
    {
        
        $data=[
            'title'=>'Add Manusia | App Crud',
            'validation'=> \Config\Services::validation()
        ];

        return view('manusia/create', $data);

    }
    public function save()
    {
        if(!$this->validate([
            'nama'=> 'required|is_unique[manusia.nama]',
            'alamat'=> 'required',
            'jeniskelamin'=> 'required',
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'uploaded'=> 'Choose foto first',
                    'max_size'=> 'File to large',
                    'is_image'=> 'File isnt image',
                    'mime_in'=> 'File isnt image',
                ]
            ],
            'no_telp'=> 'required',
        ])){
            return redirect()->to('/manusia/create')->withInput();
        }
        $filefoto= $this->request->getFile('foto');
        $filefoto->move('img');

        $namafoto=$filefoto->getName();

        $slug=url_title($this->request->getVar('nama'), '-', true);
        $this->manusiaModel->save([
            'nama'=> $this->request->getVar('nama'),
            'slug'=>$slug,
            'alamat'=> $this->request->getVar('alamat'),
            'jeniskelamin'=> $this->request->getVar('jeniskelamin'),
            'foto'=> $namafoto,
            'no_telp'=> $this->request->getVar('no_telp'),
        ]);
        session()->setFlashdata('message', 'Data Berhasil Ditambahkan');

        return redirect()->to('/manusia');

    }

    public function delete($id)
    {
        $this->manusiaModel->delete($id);
        session()->setFlashdata('delete', 'Data Berhasil Dihapus');
        return redirect()->to('/manusia');
    }

    public function edit($slug)
    {
        
        $data=[
            'title'=>'Edit Data Manusia | App Crud',
            'validation'=> \Config\Services::validation(),
            'manusia'=> $this->manusiaModel->getManusia($slug)
        ];

        return view('manusia/edit', $data);

    }
    public function update($id)
    {
        $oldmanusia=$this->manusiaModel->getManusia($this->request->getVar('slug'));
        if ($oldmanusia['nama']==$this->request->getVar('nama')){
            $rule_nama='required';
        }else{
            $rule_nama='required|is_unique[manusia.nama]';
        }

        if(!$this->validate([
            'nama'=> [
                'rules'=>$rule_nama,
                'errors'=>[
                    'required'=>'{field} nama harus diisi',
                    'is_unique'=>'{field} nama sudah terdaftar',
                ]
            ],
            'alamat'=> 'required',
            'jeniskelamin'=> 'required',
            'foto' => [
                'rules' => 'max_size[foto,4096]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors'=> [
                    'max_size'=> 'File to large',
                    'is_image'=> 'File isnt image',
                    'mime_in'=> 'File isnt image',
                ]
            ],
            'no_telp'=> 'required',
        ])){
            return redirect()->to('/manusia/edit/'. $this->request->getVar('slug'))->withInput();
        }

        $filefoto = $this->request->getFile('foto');

        if($filefoto->getError() == 4){
            $namafoto= $this->request->getVar('fotolama');
        }else{
            $namafoto=$filefoto->getName();
            $filefoto->move('img');
            unlink('img/'.$this->request->getVar('fotolama'));
        }

        $slug=url_title($this->request->getVar('nama'), '-', true);
        $this->manusiaModel->save([
            'id'=>$id,
            'nama'=> $this->request->getVar('nama'),
            'slug'=>$slug,
            'alamat'=> $this->request->getVar('alamat'),
            'jeniskelamin'=> $this->request->getVar('jeniskelamin'),
            'foto'=> $namafoto,
            'no_telp'=> $this->request->getVar('no_telp'),
        ]);
        session()->setFlashdata('message', 'Data Berhasil Diubah');

        return redirect()->to('/manusia');
    }
}