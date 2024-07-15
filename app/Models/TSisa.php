<?php

namespace App\Models;

use CodeIgniter\Model;

class TSisa extends Model
{

    protected $table            = 'TSisa';
    protected $allowedFields    = [
        'id_item',
        'no_rfq_sisa', 
        'no_wo_sisa', 
        'name_cust_sisa',
        'no_sdf_sisa',
        'lot_del_sisa', 
        'qty_sisa', 
        'code_qr_sisa', 
        'locations_sisa',
        'sub_locations_sisa', 
        'rack_sisa',
        'warehouse_sisa',
        'no_tag_sisa',
        'name_item_sisa',
        'desc_pn_sisa',
        'bpid_sisa'
    ];
    protected $useTimestamps = true;
    protected $primaryKey = 'id_sisa';

    public function getItem($id_sisa = false)
    {
        if($id_sisa == false){
            return $this->findAll();
        }

        return $this->where(['id_sisa' => $id_sisa])->first();
    }


}
