<?php

namespace App\Models;

use CodeIgniter\Model;

class TItems extends Model
{

    protected $table            = 'TItems';
    protected $allowedFields    = [
        'no_rfq', 
        'no_wo', 
        'name_cust',
        'no_sdf',
        'lot_del', 
        'qty', 
        'code_qr', 
        'locations',
        'sub_locations', 
        'rack',
        'warehouse',
        'no_tag',
        'name_item',
        'desc_pn',
        'bpid',
        'name_item_sisa'];
    protected $useTimestamps = true;
    protected $primaryKey = 'id_item';

    public function getItem($id = false)
    {
        if($id == false) {
            return $this->orderBy('sub_locations', 'ASC')->findAll();
        }

        return $this->where(['id_item' => $id])->first();
    }

}