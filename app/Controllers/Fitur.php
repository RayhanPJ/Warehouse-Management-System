<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\TItems;
use App\Models\TSisa;
use App\Models\TOut;

class Fitur extends BaseController
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

    // Input Data Auto
    public function scanning()
    {
        // dd($this->request->getVar('id'));
        $location = $this->request->getVar('locations');
        $subLocation = $this->request->getVar('sub_locations');
        $this->tItems->save([
            'id_item' => $this->request->getVar('id'),
            'no_rfq' => ($this->request->getVar('no_rfq') == "") ? "Manual" : $this->request->getVar('no_rfq'),
            'no_wo' => ($this->request->getVar('no_wo') == "") ? "Manual" : $this->request->getVar('no_wo'),
            'name_cust' => $this->request->getVar('name_cust') ? "Anony" : $this->request->getVar('name_cust'),
            'code_qr' => ($this->request->getVar('code_qr') == "") ? "Manual" : $this->request->getVar('code_qr'),
            'qty' => $this->request->getVar('qty') == "" ? 0 : $this->request->getVar('qty'),
            'locations' => $this->request->getVar('locations'),
            'sub_locations' => $this->request->getVar('sub_locations'),
            'rack' => $this->request->getVar('rack'),
            'warehouse' => $this->request->getVar('warehouse'),
            'no_tag' => $this->request->getVar('no_tag'),
            'desc_pn' => $this->request->getVar('desc_pn'),
            'name_item' => $this->request->getVar('name_item'),
            'bpid' => $this->request->getVar('bpid'),
            'no_sdf' => $this->request->getVar('no_sdf'),
            'lot_del' => $this->request->getVar('lot_del'),
        ]);

        session()->setFlashdata('pesan', "Data Berhasil Di input di Rack {$location}.{$subLocation}");
        return redirect()->to('/inputAuto');
    }

    // Input Data
    public function update($id)
    {
        $rack = $this->request->getVar('rack');
        $this->tItems->save([
            'id_item' => $id,
            'no_rfq' => ($this->request->getVar('no_rfq') == "") ? "Manual" : $this->request->getVar('no_rfq'),
            'no_wo' => ($this->request->getVar('no_wo') == "") ? "Manual" : $this->request->getVar('no_wo'),
            'name_cust' => $this->request->getVar('name_cust'),
            'code_qr' => ($this->request->getVar('code_qr') == "") ? "Manual" : $this->request->getVar('code_qr'),
            'qty' => $this->request->getVar('qty'),
            'locations' => $this->request->getVar('locations'),
            'sub_locations' => $this->request->getVar('sub_locations'),
            'rack' => $this->request->getVar('rack'),
            'warehouse' => $this->request->getVar('warehouse'),
            'no_tag' => $this->request->getVar('no_tag'),
            'desc_pn' => $this->request->getVar('desc_pn'),
            'name_item' => $this->request->getVar('name_item'),
            'bpid' => $this->request->getVar('bpid'),
            'no_sdf' => $this->request->getVar('no_sdf'),
            'lot_del' => $this->request->getVar('lot_del'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/rack' . $rack);
    }

    // Tambah Data Sisa
    public function tambahDataSisa()
    {
        $idData = $this->request->getVar('id_item');
        $rack = $this->request->getVar('rack_sisa');
        $this->tSisa->save([
            'id_item' => $this->request->getVar('id_item'),
            'no_rfq_sisa' => $this->request->getVar('no_rfq_sisa'),
            'no_wo_sisa' => $this->request->getVar('no_wo_sisa'),
            'name_cust_sisa' => ($this->request->getVar('name_cust_sisa') == "") ? "Anony" : $this->request->getVar('name_cust_sisa'),
            'code_qr_sisa' => $this->request->getVar('code_qr_sisa'),
            'qty_sisa' => $this->request->getVar('qty_sisa'),
            'locations_sisa' => $this->request->getVar('locations_sisa'),
            'sub_locations_sisa' => $this->request->getVar('sub_locations_sisa'),
            'rack_sisa' => $this->request->getVar('rack_sisa'),
            'warehouse_sisa' => $this->request->getVar('warehouse_sisa'),
            'no_tag_sisa' => $this->request->getVar('no_tag_sisa'),
            'desc_pn_sisa' => $this->request->getVar('desc_pn_sisa'),
            'name_item_sisa' => $this->request->getVar('name_item_sisa'),
            'bpid_sisa' => $this->request->getVar('bpid_sisa'),
            'no_sdf_sisa' => $this->request->getVar('no_sdf_sisa'),
            'lot_del_sisa' => $this->request->getVar('lot_del_sisa'),
        ]);

        $this->tItems->update($idData, [
            'name_item_sisa' => $this->request->getVar('name_item_sisa'),
        ]);

        return redirect()->to('/rack' . $rack);
    }

    // Edit Data
    public function updateData($id)
    {
        $rack = $this->request->getVar('rack');
        $this->tItems->save([
            'id_item' => $id,
            'no_rfq' => ($this->request->getVar('no_rfq') == "") ? "Manual" : $this->request->getVar('no_rfq'),
            'no_wo' => ($this->request->getVar('no_wo') == "") ? "Manual" : $this->request->getVar('no_wo'),
            'name_cust' => $this->request->getVar('name_cust') ? "Anony" : $this->request->getVar('name_cust'),
            'code_qr' => ($this->request->getVar('code_qr') == "") ? "Manual" : $this->request->getVar('code_qr'),
            'qty' => $this->request->getVar('qty') == "" ? 0 : $this->request->getVar('qty'),
            'locations' => $this->request->getVar('locations'),
            'sub_locations' => $this->request->getVar('sub_locations'),
            'rack' => $this->request->getVar('rack'),
            'warehouse' => $this->request->getVar('warehouse'),
            'no_tag' => $this->request->getVar('no_tag'),
            'desc_pn' => $this->request->getVar('desc_pn'),
            'name_item' => $this->request->getVar('name_item'),
            'bpid' => $this->request->getVar('bpid'),
            'no_sdf' => $this->request->getVar('no_sdf'),
            'lot_del' => $this->request->getVar('lot_del'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah!');
        return redirect()->to('/rack' . $rack);
    }

    // Bypass
    public function bypass($id)
    {
        $rack = $this->request->getVar('rack');
        $this->tItems->save([
            'id_item' => $this->request->getVar('id_item'),
            'no_rfq' => ($this->request->getVar('no_rfq') == "") ? "Manual" : $this->request->getVar('no_rfq'),
            'no_wo' => ($this->request->getVar('no_wo') == "") ? "Manual" : $this->request->getVar('no_wo'),
            'name_cust' => $this->request->getVar('name_cust'),
            'code_qr' => ($this->request->getVar('code_qr') == "") ? "Manual" : $this->request->getVar('code_qr'),
            'qty' => $this->request->getVar('qty'),
            'locations' => $this->request->getVar('locations'),
            'sub_locations' => $this->request->getVar('sub_locations'),
            'rack' => $this->request->getVar('rack'),
            'warehouse' => $this->request->getVar('warehouse'),
            'no_tag' => $this->request->getVar('no_tag'),
            'desc_pn' => $this->request->getVar('desc_pn'),
            'name_item' => $this->request->getVar('name_item'),
            'bpid' => $this->request->getVar('bpid'),
            'no_sdf' => $this->request->getVar('no_sdf'),
            'lot_del' => $this->request->getVar('lot_del'),
        ]);

        $this->tItems->update($id, array(
            'no_rfq' => null,
            'no_sdf' => null,
            'lot_del' => null,
            'no_wo' => null,
            'name_cust' => null,
            'code_qr' => null,
            'qty' => 0,
            'warehouse' => null,
            'no_tag' => null,
            'name_item' => null,
            'desc_pn' => null,
            'bpid' => null
        ));
        session()->setFlashdata('pesan', 'Data Berhasil Di Pindahkan!');
        return redirect()->to('/rack' . $rack);
    }

    // Reset
    public function reset($id)
    {
        $data['item'] = $this->tItems->getItem($id);
        $datReceh = null;
        $receh['item'] = $this->tSisa->getItem();
        foreach($receh['item'] as $v) {

            $datReceh = isset($v['name_item_sisa']) ? $v['name_item_sisa'] : null;
        }

        $rack = $data['item']['rack'];
        $this->tOut->save([
            'id_item' => $id,
            'no_rfq_out' => $data['item']['no_rfq'],
            'no_wo_out' => $data['item']['no_wo'],
            'name_cust_out' => $data['item']['name_cust'],
            'code_qr_out' => $data['item']['code_qr'],
            'qty_out' => $data['item']['qty'],
            'locations_out' => $data['item']['locations'],
            'sub_locations_out' => $data['item']['sub_locations'],
            'rack_out' => $data['item']['rack'],
            'warehouse_out' => $data['item']['warehouse'],
            'no_tag_out' => $data['item']['no_tag'],
            'desc_pn_out' => $data['item']['desc_pn'],
            'name_item_out' => $data['item']['name_item'],
            'bpid_out' => $data['item']['bpid'],
            'no_sdf_out' => $data['item']['no_sdf'],
            'lot_del_out' => $data['item']['lot_del'],
        ]);


        if ($datReceh == !null) {
            $this->tItems->update($id, array('no_rfq' => null, 'no_sdf' => null, 'lot_del' => null, 'no_wo' => null, 'name_cust' => null, 'code_qr' => null, 'qty' => 0, 'warehouse' => null, 'no_tag' => null, 'name_item' => null, 'name_item_sisa' => $datReceh, 'desc_pn' => null, 'bpid' => null));
        } else {
            $this->tItems->update($id, array('no_rfq' => null, 'no_sdf' => null, 'lot_del' => null, 'no_wo' => null, 'name_cust' => null, 'code_qr' => null, 'qty' => 0, 'warehouse' => null, 'no_tag' => null, 'name_item' => null, 'name_item_sisa' => null, 'desc_pn' => null, 'bpid' => null));
        }
        return redirect()->to('/rack' . $rack);
    }

    // Edit Data Sisa
    public function updateDataSisa($id_sisa)
    {
        $idData = $this->request->getVar('id_item');
        $this->tSisa->save([
            'id_sisa' => $id_sisa,
            'id_item' => $this->request->getVar('id_item'),
            'no_rfq_sisa' => $this->request->getVar('no_rfq_sisa'),
            'no_wo_sisa' => $this->request->getVar('no_wo_sisa'),
            'name_cust_sisa' => $this->request->getVar('name_cust_sisa'),
            'code_qr_sisa' => $this->request->getVar('code_qr_sisa'),
            'qty_sisa' => $this->request->getVar('qty_sisa'),
            'locations_sisa' => $this->request->getVar('locations_sisa'),
            'sub_locations_sisa' => $this->request->getVar('sub_locations_sisa'),
            'rack_sisa' => $this->request->getVar('rack_sisa'),
            'warehouse_sisa' => $this->request->getVar('warehouse_sisa'),
            'no_tag_sisa' => $this->request->getVar('no_tag_sisa'),
            'desc_pn_sisa' => $this->request->getVar('desc_pn'),
            'name_item_sisa' => $this->request->getVar('name_item_sisa'),
            'bpid_sisa' => $this->request->getVar('bpid_sisa'),
            'no_sdf_sisa' => $this->request->getVar('no_sdf_sisa'),
            'lot_del_sisa' => $this->request->getVar('lot_del_sisa'),
        ]);

        return redirect()->to('/detail/' . $idData);
    }

    // Delete Data Sisa
    public function delSisa($id_sisa)
    {
        $datItems['item'] = $this->tItems->getItem($id_sisa);
        $datReceh['item'] = $this->tSisa->getItem($id_sisa);

        if (!empty($datItems['item'])) {
            $rack = $datItems['item']['rack'];
        } else {
            $rack = $datReceh['item']['rack_sisa'];
        }

        $this->tOut->save([
            'id_sisa' => $id_sisa,
            'no_rfq_out' => $datReceh['item']['no_rfq_sisa'],
            'no_wo_out' => $datReceh['item']['no_wo_sisa'],
            'name_cust_out' => $datReceh['item']['name_cust_sisa'],
            'code_qr_out' => $datReceh['item']['code_qr_sisa'],
            'qty_out' => $datReceh['item']['qty_sisa'],
            'locations_out' => $datReceh['item']['locations_sisa'],
            'sub_locations_out' => $datReceh['item']['sub_locations_sisa'],
            'rack_out' => $datReceh['item']['rack_sisa'],
            'warehouse_out' => $datReceh['item']['warehouse_sisa'],
            'no_tag_out' => $datReceh['item']['no_tag_sisa'],
            'desc_pn_out' => $datReceh['item']['desc_pn_sisa'],
            'name_item_out' => $datReceh['item']['name_item_sisa'],
            'bpid_out' => $datReceh['item']['bpid_sisa'],
            'no_sdf_out' => $datReceh['item']['no_sdf_sisa'],
            'lot_del_out' => $datReceh['item']['lot_del_sisa'],
        ]);
        $rack = $datReceh['item']['rack_sisa'];

        $this->tItems->update($datReceh['item']['id_item'], array('name_item_sisa' => null));

        $this->tSisa->delete($id_sisa);
        return redirect()->to('/rack' . $rack);
    }

    // Export Excel
    public function exportExcel()
    {
        $spreadsheet = new Spreadsheet();
        $data['item'] = $this->tItems->getItem();
        
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->getColumnDimension('A')->setWidth(34, 'px');
        $activeWorksheet->getColumnDimension('B')->setWidth(196, 'px');
        $activeWorksheet->getColumnDimension('C')->setWidth(74, 'px');
        $activeWorksheet->getColumnDimension('D')->setWidth(74, 'px');
        $activeWorksheet->getColumnDimension('E')->setWidth(202, 'px');
        $activeWorksheet->getColumnDimension('F')->setWidth(34, 'px');
        $activeWorksheet->getColumnDimension('G')->setWidth(84, 'px');
        $activeWorksheet->getColumnDimension('H')->setWidth(57, 'px');
        $activeWorksheet->getColumnDimension('I')->setWidth(95, 'px');
        $activeWorksheet->getColumnDimension('J')->setWidth(95, 'px');
        $activeWorksheet->getColumnDimension('K')->setWidth(95, 'px');
        $activeWorksheet->getColumnDimension('L')->setWidth(192, 'px');
        $activeWorksheet->getColumnDimension('M')->setWidth(84, 'px');

        $activeWorksheet->setCellValue('A1', 'NO');
        $activeWorksheet->setCellValue('B1', 'NAME CUSTOMER');
        $activeWorksheet->setCellValue('C1', 'NO RFQ');
        $activeWorksheet->setCellValue('D1', 'NO WO');
        $activeWorksheet->setCellValue('E1', 'NAME ITEM');
        $activeWorksheet->setCellValue('F1', 'QTY');
        $activeWorksheet->setCellValue('G1', 'WAREHOUSE');
        $activeWorksheet->setCellValue('H1', 'NO TAG');
        $activeWorksheet->setCellValue('I1', 'NO SDF');
        $activeWorksheet->setCellValue('J1', 'BPID');
        $activeWorksheet->setCellValue('K1', 'LOT DELIVERY');
        $activeWorksheet->setCellValue('L1', 'CODE QR');
        $activeWorksheet->setCellValue('M1', 'LOCATIONS');

        $row = 2;
        $no = 1;

        foreach ($data['item'] as $v) {
            if ($v['no_rfq'] != NULL) {
                $activeWorksheet->setCellValue('A' . $row, $no++);
                $activeWorksheet->setCellValue('B' . $row, $v['name_cust']);
                $activeWorksheet->setCellValue('C' . $row, $v['no_rfq']);
                $activeWorksheet->setCellValue('D' . $row, $v['no_wo']);
                $activeWorksheet->setCellValue('E' . $row, $v['name_item']);
                $activeWorksheet->setCellValue('F' . $row, $v['qty']);
                $activeWorksheet->setCellValue('G' . $row, $v['warehouse']);
                $activeWorksheet->setCellValue('H' . $row, $v['no_tag']);
                $activeWorksheet->setCellValue('I' . $row, $v['no_sdf']);
                $activeWorksheet->setCellValue('J' . $row, $v['bpid']);
                $activeWorksheet->setCellValue('K' . $row, $v['lot_del']);
                $activeWorksheet->setCellValue('L' . $row, $v['code_qr']);
                $activeWorksheet->setCellValue('M' . $row, ($v['locations'].".".$v['sub_locations']));
                $row++;
            }
        }
        // Set the header content type and attachment filename
        

        $filename = 'Warehouser-Report at - ' . date('Y-m-d') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
