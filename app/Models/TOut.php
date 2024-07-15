<?php

namespace App\Models;

use CodeIgniter\Model;

class TOut extends Model
{

    protected $table            = 'TOut';
    protected $allowedFields    = [
        'id_sisa',
        'id_item',
        'no_rfq_out', 
        'no_wo_out', 
        'name_cust_out',
        'no_sdf_out',
        'lot_del_out', 
        'qty_out', 
        'code_qr_out', 
        'locations_out',
        'sub_locations_out', 
        'rack_out',
        'warehouse_out',
        'no_tag_out',
        'name_item_out',
        'desc_pn_out',
        'bpid_out'
    ];
    protected $useTimestamps = true;
    protected $primaryKey = 'id_out';

    public function getItem($id_out = false)
    {
        if($id_out == false){
            return $this->findAll();
        }

        return $this->where(['id_out' => $id_out])->first();
    }


}
