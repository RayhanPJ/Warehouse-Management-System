<?php

namespace App\Controllers;

use App\Models\TItems;
use App\Models\TSisa;
use App\Models\TOut;

class View extends BaseController
{
    protected $tItems;
    protected $tSisa;
    protected $tOut;

    public function __construct()
    {
        $this->tItems = new TItems();
        $this->tSisa = new TSisa();
        $this->tOut = new TOut();
    }

    public function listData()
    {
        $data = [
            'title' => 'List Item',
            'item' => $this->tItems->getItem(),
        ];
        return view('pages/listData', $data);
    }
    
    public function rackOthers()
    {
        $data = [
            'title' => 'List Item',
            'item' => $this->tItems->getItem(),
        ];
        return view('pages/rack/rackOthers', $data);
    }

    public function rackV()
    {
        $data = [
            'title' => 'List Item',
            'item' => $this->tItems->getItem(),
        ];
        return view('pages/rack/rackV', $data);
    }

    public function rackW()
    {
        $data = [
            'title' => 'List Item',
            'item' => $this->tItems->getItem(),
        ];
        return view('pages/rack/rackW', $data);
    }

    public function rackX()
    {
        $data = [
            'title' => 'List Item',
            'item' => $this->tItems->getItem(),
        ];
        return view('pages/rack/rackX', $data);
    }

    public function rackY()
    {
        $data = [
            'title' => 'List Item',
            'item' => $this->tItems->getItem(),
        ];
        return view('pages/rack/rackY', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Item',
            'item' => $this->tItems->getItem($id),
            'item2' => $this->tSisa->getItem(),
        ];
        return view('pages/detail', $data);
    }

    public function inputAuto()
    {
        $data = [
            'title' => 'Form Scan Data Item',
            'validation' => \Config\Services::validation(),
            'item' => $this->tItems->getItem()

        ];

        return view('pages/form/formInputAuto', $data);
    }

    public function input($id)
    {
        $data = [
            'title' => 'Form Ubah Data Item',
            'validation' => \Config\Services::validation(),
            'item' => $this->tItems->getItem($id)

        ];

        return view('pages/form/formInput', $data);
    }

    public function tambahForm($id)
    {
        session();
        $data = [
            'title' => 'Form Tambah Data Sisa',
            'item' => $this->tItems->getItem($id),
            'validation' => \Config\Services::validation()
        ];

        return view('pages/form/formTambahDataSisa', $data);
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Item',
            'validation' => \Config\Services::validation(),
            'item' => $this->tItems->getItem($id)

        ];

        return view('pages/form/formEditData', $data);
    }

    public function editSisa($id_Sisa)
    {
        $data = [
            'title' => 'Form Edit Data Sisa',
            'validation' => \Config\Services::validation(),
            'item' => $this->tSisa->getItem($id_Sisa)

        ];

        return view('pages/form/formEditSisa', $data);
    }
 
}
