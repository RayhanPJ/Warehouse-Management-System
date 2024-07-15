<?php

namespace App\Controllers;

use App\Models\TItems;
use App\Models\TOut;
use App\Models\TSisa;

class Home extends BaseController
{
    protected $tItems;
    protected $tOut;
    protected $tSisa;
    public function __construct()
    {
        $this->tItems = new TItems();
        $this->tOut = new TOut();
        $this->tSisa = new TSisa();
    }

    private function countRackV()
    {
        $item = ['item' => $this->tItems->getItem()];
        $itemReceh = ['item' => $this->tSisa->getItem()];
        $V = "V";
        $QTYRecehV = [];
        $uniqueRack = [];

        $locOnV1 = [];
        $countOnV1 = count($locOnV1);

        $locOnV2 = [];
        $countOnV2 = count($locOnV2);

        $locOnV3 = [];
        $countOnV3 = count($locOnV3);

        $locOnV4 = [];
        $countOnV4 = count($locOnV4);

        $locOnV5 = [];
        $countOnV5 = count($locOnV5);

        $locOffV1 = [];
        $countOffV1 = count($locOffV1);

        $locOffV2 = [];
        $countOffV2 = count($locOffV2);

        $locOffV3 = [];
        $countOffV3 = count($locOffV3);

        $locOffV4 = [];
        $countOffV4 = count($locOffV4);

        $locOffV5 = [];
        $countOffV5 = count($locOffV5);

        $QTYV = [];

        foreach ($item['item'] as $v) {
            $rack = $v['rack'];
            //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
            if (!in_array($rack, $uniqueRack)) {
                $uniqueRack[] = $rack; //tambahkan ke array uniqueSupplierNames
            } else {
                continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
            }
            // $count = count($uniqueRack); //untuk menghitung total Rack
        }

        foreach ($itemReceh['item'] as $v) {
            if ($v['rack_sisa'] === $V) {
                $qty = $v['qty_sisa'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya

                if ($v['id_sisa'] != NULL) {

                    $QTYRecehV[]  = $qty;

                    $countQTYRecehV = 0;
                    for ($i = 0; $i < count($QTYRecehV); $i++) {
                        $countQTYRecehV += $QTYRecehV[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTYRecehV)) {
            $countQTYRecehV = 0;
        }

        foreach ($item['item'] as $v) {
            if ($v['rack'] === $V) {
                $subLoc = $v['sub_locations'];
                $qty = $v['qty'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
                if ($v['locations'] == $v['rack'] . "5") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOnV1)) {
                            $locOnV1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOnV1 = count($locOnV1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOffV1)) {
                            $locOffV1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOffV1 = count($locOffV1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "4") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOnV2)) {
                            $locOnV2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOnV2 = count($locOnV2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOffV2)) {
                            $locOffV2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOffV2 = count($locOffV2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "3") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOnV3)) {
                            $locOnV3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOnV3 = count($locOnV3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOffV3)) {
                            $locOffV3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOffV3 = count($locOffV3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "2") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOnV4)) {
                            $locOnV4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOnV4 = count($locOnV4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOffV4)) {
                            $locOffV4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOffV4 = count($locOffV4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "1") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOnV5)) {
                            $locOnV5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOnV5 = count($locOnV5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOffV5)) {
                            $locOffV5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOffV5 = count($locOffV5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['code_qr'] != NULL) {

                    $QTYV[]  = $qty;

                    $countQTYV = 0;
                    for ($i = 0; $i < count($QTYV); $i++) {
                        $countQTYV += $QTYV[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTYV)) {
            $countQTYV = 0;
        }
        if (empty($locOnV1)) {
            $countOnV1 = 0;
        }
        if (empty($locOffV1)) {
            $countOffV1 = 0;
        }
        if (empty($locOnV2)) {
            $countOnV2 = 0;
        }
        if (empty($locOffV2)) {
            $countOffV2 = 0;
        }
        if (empty($locOnV3)) {
            $countOnV3 = 0;
        }
        if (empty($locOffV3)) {
            $countOffV3 = 0;
        }
        if (empty($locOnV4)) {
            $countOnV4 = 0;
        }
        if (empty($locOffV4)) {
            $countOffV4 = 0;
        }
        if (empty($locOnV5)) {
            $countOnV5 = 0;
        }
        if (empty($locOffV5)) {
            $countOffV5 = 0;
        }

        $totalCountOffV = ($countOffV1 + $countOffV2 + $countOffV3 + $countOffV4 + $countOffV5);
        $totalCountOnV = ($countOnV1 + $countOnV2 + $countOnV3 + $countOnV4 + $countOnV5);

        $rackV = [
            'totalOnV' => $totalCountOnV,
            'totalOffV' => $totalCountOffV,
            'totalQTYV' => ($countQTYV + $countQTYRecehV),
        ];

        return $rackV;
    }

    private function countRackW()
    {
        $item = ['item' => $this->tItems->getItem()];
        $itemReceh = ['item' => $this->tSisa->getItem()];
        $QTYRecehW = [];
        $uniqueRack = [];
        $W = "W";
        foreach ($itemReceh['item'] as $v) {
            if ($v['rack_sisa'] === $W) {
                $qty = $v['qty_sisa'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya

                if ($v['id_sisa'] != NULL) {

                    $QTYRecehW[]  = $qty;

                    $countQTYRecehW = 0;
                    for ($i = 0; $i < count($QTYRecehW); $i++) {
                        $countQTYRecehW += $QTYRecehW[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTYRecehW)) {
            $countQTYRecehW = 0;
        }

        foreach ($item['item'] as $v) {
            $rack = $v['rack'];
            //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
            if (!in_array($rack, $uniqueRack)) {
                $uniqueRack[] = $rack; //tambahkan ke array uniqueSupplierNames
            } else {
                continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
            }
            // $count = count($uniqueRack); //untuk menghitung total Rack
        }

        $locOn1 = [];
        $locOn2 = [];
        $locOn3 = [];
        $locOn4 = [];
        $locOn5 = [];
        $locOff1 = [];
        $locOff2 = [];
        $locOff3 = [];
        $locOff4 = [];
        $locOff5 = [];
        $QTY = [];
        foreach ($item['item'] as $v) {
            if ($v['rack'] === $W) {
                $subLoc = $v['sub_locations'];
                $qty = $v['qty'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
                if ($v['locations'] == $v['rack'] . "5") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn1)) {
                            $locOn1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn1 = count($locOn1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff1)) {
                            $locOff1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff1 = count($locOff1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "4") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn2)) {
                            $locOn2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn2 = count($locOn2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff2)) {
                            $locOff2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff2 = count($locOff2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "3") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn3)) {
                            $locOn3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn3 = count($locOn3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff3)) {
                            $locOff3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff3 = count($locOff3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "2") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn4)) {
                            $locOn4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn4 = count($locOn4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff4)) {
                            $locOff4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff4 = count($locOff4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "1") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn5)) {
                            $locOn5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn5 = count($locOn5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff5)) {
                            $locOff5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff5 = count($locOff5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['code_qr'] != NULL) {

                    $QTY[]  = $qty;

                    $countQTYW = 0;
                    for ($i = 0; $i < count($QTY); $i++) {
                        $countQTYW += $QTY[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTY)) {
            $countQTYW = 0;
        }
        if (empty($locOn1)) {
            $countOn1 = 0;
        }
        if (empty($locOff1)) {
            $countOff1 = 0;
        }
        if (empty($locOn2)) {
            $countOn2 = 0;
        }
        if (empty($locOff2)) {
            $countOff2 = 0;
        }
        if (empty($locOn3)) {
            $countOn3 = 0;
        }
        if (empty($locOff3)) {
            $countOff3 = 0;
        }
        if (empty($locOn4)) {
            $countOn4 = 0;
        }
        if (empty($locOff4)) {
            $countOff4 = 0;
        }
        if (empty($locOn5)) {
            $countOn5 = 0;
        }
        if (empty($locOff5)) {
            $countOff5 = 0;
        }
        $totalCountOffW = ($countOff1 + $countOff2 + $countOff3 + $countOff4 + $countOff5);
        $totalCountOnW = ($countOn1 + $countOn2 + $countOn3 + $countOn4 + $countOn5);

        $rackW = [
            'totalOnW' => $totalCountOnW,
            'totalOffW' => $totalCountOffW,
            'totalQTYW' => ($countQTYW + $countQTYRecehW),
        ];

        return $rackW;
    }

    private function countRackX()
    {
        $item = ['item' => $this->tItems->getItem()];
        $itemReceh = ['item' => $this->tSisa->getItem()];
        $uniqueRack = [];
        $QTYRecehX = [];
        $X = "X";
        foreach ($itemReceh['item'] as $v) {
            if ($v['rack_sisa'] === $X) {
                $qty = $v['qty_sisa'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya

                if ($v['id_sisa'] != NULL) {

                    $QTYRecehX[]  = $qty;

                    $countQTYRecehX = 0;
                    for ($i = 0; $i < count($QTYRecehX); $i++) {
                        $countQTYRecehX += $QTYRecehX[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTYRecehX)) {
            $countQTYRecehX = 0;
        }

        foreach ($item['item'] as $v) {
            $rack = $v['rack'];
            //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
            if (!in_array($rack, $uniqueRack)) {
                $uniqueRack[] = $rack; //tambahkan ke array uniqueSupplierNames
            } else {
                continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
            }
            // $count = count($uniqueRack); //untuk menghitung total Rack
        }

        $locOn1 = [];
        $locOn2 = [];
        $locOn3 = [];
        $locOn4 = [];
        $locOn5 = [];
        $locOff1 = [];
        $locOff2 = [];
        $locOff3 = [];
        $locOff4 = [];
        $locOff5 = [];
        $QTY = [];
        foreach ($item['item'] as $v) {
            if ($v['rack'] === $X) {
                $subLoc = $v['sub_locations'];
                $qty = $v['qty'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
                if ($v['locations'] == $v['rack'] . "5") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn1)) {
                            $locOn1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn1 = count($locOn1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff1)) {
                            $locOff1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff1 = count($locOff1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "4") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn2)) {
                            $locOn2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn2 = count($locOn2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff2)) {
                            $locOff2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff2 = count($locOff2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "3") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn3)) {
                            $locOn3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn3 = count($locOn3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff3)) {
                            $locOff3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff3 = count($locOff3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "2") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn4)) {
                            $locOn4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn4 = count($locOn4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff4)) {
                            $locOff4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff4 = count($locOff4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "1") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn5)) {
                            $locOn5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn5 = count($locOn5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff5)) {
                            $locOff5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff5 = count($locOff5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['code_qr'] != NULL) {

                    $QTY[]  = $qty;

                    $countQTYX = 0;
                    for ($i = 0; $i < count($QTY); $i++) {
                        $countQTYX += $QTY[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTY)) {
            $countQTYX = 0;
        }
        if (empty($locOn1)) {
            $countOn1 = 0;
        }
        if (empty($locOff1)) {
            $countOff1 = 0;
        }
        if (empty($locOn2)) {
            $countOn2 = 0;
        }
        if (empty($locOff2)) {
            $countOff2 = 0;
        }
        if (empty($locOn3)) {
            $countOn3 = 0;
        }
        if (empty($locOff3)) {
            $countOff3 = 0;
        }
        if (empty($locOn4)) {
            $countOn4 = 0;
        }
        if (empty($locOff4)) {
            $countOff4 = 0;
        }
        if (empty($locOn5)) {
            $countOn5 = 0;
        }
        if (empty($locOff5)) {
            $countOff5 = 0;
        }
        $totalCountOffX = ($countOff1 + $countOff2 + $countOff3 + $countOff4 + $countOff5);
        $totalCountOnX = ($countOn1 + $countOn2 + $countOn3 + $countOn4 + $countOn5);

        $rackX = [
            'totalOnX' => $totalCountOnX,
            'totalOffX' => $totalCountOffX,
            'totalQTYX' => ($countQTYX + $countQTYRecehX),
        ];

        return $rackX;
    }

    private function countRackY()
    {
        $item = ['item' => $this->tItems->getItem()];
        $itemReceh = ['item' => $this->tSisa->getItem()];
        $QTYRecehY = [];
        $Y = "Y";
        foreach ($itemReceh['item'] as $v) {
            if ($v['rack_sisa'] === $Y) {
                $qty = $v['qty_sisa'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya

                if ($v['id_sisa'] != NULL) {

                    $QTYRecehY[]  = $qty;

                    $countQTYRecehY = 0;
                    for ($i = 0; $i < count($QTYRecehY); $i++) {
                        $countQTYRecehY += $QTYRecehY[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTYRecehY)) {
            $countQTYRecehY = 0;
        }

        $uniqueRack = [];
        foreach ($item['item'] as $v) {
            $rack = $v['rack'];
            //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
            if (!in_array($rack, $uniqueRack)) {
                $uniqueRack[] = $rack; //tambahkan ke array uniqueSupplierNames
            } else {
                continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
            }
            // $count = count($uniqueRack); //untuk menghitung total Rack
        }

        $locOn1 = [];
        $locOn2 = [];
        $locOn3 = [];
        $locOn4 = [];
        $locOn5 = [];
        $locOff1 = [];
        $locOff2 = [];
        $locOff3 = [];
        $locOff4 = [];
        $locOff5 = [];
        $QTY = [];
        foreach ($item['item'] as $v) {
            if ($v['rack'] === $Y) {
                $subLoc = $v['sub_locations'];
                $qty = $v['qty'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
                if ($v['locations'] == $v['rack'] . "5") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn1)) {
                            $locOn1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn1 = count($locOn1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff1)) {
                            $locOff1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff1 = count($locOff1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "4") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn2)) {
                            $locOn2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn2 = count($locOn2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff2)) {
                            $locOff2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff2 = count($locOff2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "3") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn3)) {
                            $locOn3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn3 = count($locOn3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff3)) {
                            $locOff3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff3 = count($locOff3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "2") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn4)) {
                            $locOn4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn4 = count($locOn4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff4)) {
                            $locOff4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff4 = count($locOff4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . "1") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn5)) {
                            $locOn5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn5 = count($locOn5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff5)) {
                            $locOff5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff5 = count($locOff5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['code_qr'] != NULL) {

                    $QTY[]  = $qty;

                    $countQTYY = 0;
                    for ($i = 0; $i < count($QTY); $i++) {
                        $countQTYY += $QTY[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan

            }
        }
        if (empty($QTY)) {
            $countQTYY = 0;
        }
        if (empty($locOn1)) {
            $countOn1 = 0;
        }
        if (empty($locOff1)) {
            $countOff1 = 0;
        }
        if (empty($locOn2)) {
            $countOn2 = 0;
        }
        if (empty($locOff2)) {
            $countOff2 = 0;
        }
        if (empty($locOn3)) {
            $countOn3 = 0;
        }
        if (empty($locOff3)) {
            $countOff3 = 0;
        }
        if (empty($locOn4)) {
            $countOn4 = 0;
        }
        if (empty($locOff4)) {
            $countOff4 = 0;
        }
        if (empty($locOn5)) {
            $countOn5 = 0;
        }
        if (empty($locOff5)) {
            $countOff5 = 0;
        }
        $totalCountOffY = ($countOff1 + $countOff2 + $countOff3 + $countOff4 + $countOff5);
        $totalCountOnY = ($countOn1 + $countOn2 + $countOn3 + $countOn4 + $countOn5);

        $rackY = [
            'totalOnY' => $totalCountOnY,
            'totalOffY' => $totalCountOffY,
            'totalQTYY' => ($countQTYY + $countQTYRecehY),
        ];

        return $rackY;
    }

    private function countRackOthers()
    {
        $item = ['item' => $this->tItems->getItem()];
        $itemReceh = ['item' => $this->tSisa->getItem()];
        $QTYRecehOthers = [];
        $Others = "Others";
        foreach ($itemReceh['item'] as $v) {
            if ($v['rack_sisa'] === $Others) {
                $qty = $v['qty_sisa'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya

                if ($v['id_sisa'] != NULL) {

                    $QTYRecehOthers[]  = $qty;

                    $countQTYRecehOthers = 0;
                    for ($i = 0; $i < count($QTYRecehOthers); $i++) {
                        $countQTYRecehOthers += $QTYRecehOthers[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan
            }
        }
        if (empty($QTYRecehOthers)) {
            $countQTYRecehOthers = 0;
        }

        $uniqueRack = [];
        foreach ($item['item'] as $v) {
            $rack = $v['rack'];
            //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
            if (!in_array($rack, $uniqueRack)) {
                $uniqueRack[] = $rack; //tambahkan ke array uniqueSupplierNames
            } else {
                continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
            }
            // $count = count($uniqueRack); //untuk menghitung total Rack
        }

        $locOn1 = [];
        $locOn2 = [];
        $locOn3 = [];
        $locOn4 = [];
        $locOn5 = [];
        $locOn6 = [];
        $locOn7 = [];
        $locOn10 = [];
        $locOff1 = [];
        $locOff2 = [];
        $locOff3 = [];
        $locOff4 = [];
        $locOff5 = [];
        $locOff6 = [];
        $locOff7 = [];
        $locOff10 = [];
        $QTY = [];
        foreach ($item['item'] as $v) {
            if ($v['rack'] === $Others) {
                $subLoc = $v['sub_locations'];
                $qty = $v['qty'];
                //jika nama supplier belum ada di dalam array uniqueSupplierNames, maka masukkan ke dalamnya
                if ($v['locations'] == $v['rack'] . " Area Transit 7") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn1)) {
                            $locOn1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn1 = count($locOn1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff1)) {
                            $locOff1[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff1 = count($locOff1); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . " Area Transit 6") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn2)) {
                            $locOn2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn2 = count($locOn2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff2)) {
                            $locOff2[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff2 = count($locOff2); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . " Area Transit 5") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn3)) {
                            $locOn3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn3 = count($locOn3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff3)) {
                            $locOff3[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff3 = count($locOff3); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . " Area Transit 4") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn4)) {
                            $locOn4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn4 = count($locOn4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff4)) {
                            $locOff4[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff4 = count($locOff4); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . " Area Transit 3") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn5)) {
                            $locOn5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn5 = count($locOn5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff5)) {
                            $locOff5[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff5 = count($locOff5); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . " Area Transit 2") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn6)) {
                            $locOn6[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn6 = count($locOn6); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff6)) {
                            $locOff6[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff6 = count($locOff6); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['locations'] == $v['rack'] . " Area Transit 1") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn7)) {
                            $locOn7[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn7 = count($locOn7); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff7)) {
                            $locOff7[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff7 = count($locOff7); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                
                if ($v['locations'] == $v['rack'] . " Gedung D") {
                    if ($v['code_qr'] == NULL) {
                        if (!in_array($subLoc, $locOn10)) {
                            $locOn10[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOn10 = count($locOn10); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                    if ($v['code_qr'] != NULL) {
                        if (!in_array($subLoc, $locOff10)) {
                            $locOff10[] = $subLoc; //tambahkan ke array uniqueSupplierNames
                        } else {
                            continue; //jika nama supplier sudah ada di dalam array, maka lanjut ke iterasi selanjutnya
                        }
                        $countOff10 = count($locOff10); //untuk menghitung total Rack
                    } // jika item cocok dengan kriteria yang diinginkan
                }
                if ($v['code_qr'] != NULL) {

                    $QTY[]  = $qty;

                    $countQTYOthers = 0;
                    for ($i = 0; $i < count($QTY); $i++) {
                        $countQTYOthers += $QTY[$i];
                    }
                } // jika item cocok dengan kriteria yang diinginkan

            }
        }
        if (empty($QTY)) {
            $countQTYOthers = 0;
        }
        if (empty($locOn1)) {
            $countOn1 = 0;
        }
        if (empty($locOff1)) {
            $countOff1 = 0;
        }
        if (empty($locOn2)) {
            $countOn2 = 0;
        }
        if (empty($locOff2)) {
            $countOff2 = 0;
        }
        if (empty($locOn3)) {
            $countOn3 = 0;
        }
        if (empty($locOff3)) {
            $countOff3 = 0;
        }
        if (empty($locOn4)) {
            $countOn4 = 0;
        }
        if (empty($locOff4)) {
            $countOff4 = 0;
        }
        if (empty($locOn5)) {
            $countOn5 = 0;
        }
        if (empty($locOff5)) {
            $countOff5 = 0;
        }
        if (empty($locOn6)) {
            $countOn6 = 0;
        }
        if (empty($locOff6)) {
            $countOff6 = 0;
        }
        if (empty($locOn7)) {
            $countOn7 = 0;
        }
        if (empty($locOff7)) {
            $countOff7 = 0;
        }
        if (empty($locOn10)) {
            $countOn10 = 0;
        }
        if (empty($locOff10)) {
            $countOff10 = 0;
        }
        $totalCountOffOthers = ($countOff1 + $countOff2 + $countOff3 + $countOff4 + $countOff5 +$countOff6 + $countOff7 + $countOff10);
        $totalCountOnOthers = ($countOn1 + $countOn2 + $countOn3 + $countOn4 + $countOn5 + $countOn6 + $countOn7 + $countOn10);

        $rackOthers = [
            'totalOnOthers' => $totalCountOnOthers,
            'totalOffOthers' => $totalCountOffOthers,
            'totalQTYOthers' => ($countQTYOthers + $countQTYRecehOthers),
        ];

        return $rackOthers;
    }
    
    public function index()
    {
        $dataRackV = $this->countRackV();
        $rackV = [
            'totalOnV' => $dataRackV['totalOnV'],
            'totalOffV' => $dataRackV['totalOffV'],
            'totalQTYV' => $dataRackV['totalQTYV'],
        ];
        $dataRackW = $this->countRackW();
        $rackW = [
            'totalOnW' => $dataRackW['totalOnW'],
            'totalOffW' => $dataRackW['totalOffW'],
            'totalQTYW' => $dataRackW['totalQTYW'],
        ];
        $dataRackX = $this->countRackX();
        $rackX = [
            'totalOnX' => $dataRackX['totalOnX'],
            'totalOffX' => $dataRackX['totalOffX'],
            'totalQTYX' => $dataRackX['totalQTYX'],
        ];
        $dataRackY = $this->countRackY();
        $rackY = [
            'totalOnY' => $dataRackY['totalOnY'],
            'totalOffY' => $dataRackY['totalOffY'],
            'totalQTYY' => $dataRackY['totalQTYY'],
        ];

        $dataRackOthers = $this->countRackOthers();
        $rackOthers = [
            'totalOnOthers' => $dataRackOthers['totalOnOthers'],
            'totalOffOthers' => $dataRackOthers['totalOffOthers'],
            'totalQTYOthers' => $dataRackOthers['totalQTYOthers'],
        ];

        $allCountOff = ($rackV['totalOffV'] + $rackW['totalOffW'] + $rackX['totalOffX'] + $rackY['totalOffY'] + $rackOthers['totalOffOthers']);
        $allCountOn = ($rackV['totalOnV'] + $rackW['totalOnW'] + $rackX['totalOnX'] + $rackY['totalOnY'] + $rackOthers['totalOnOthers']);
        $allCountQTY = ($rackV['totalQTYV'] + $rackW['totalQTYW'] + $rackX['totalQTYX'] + $rackY['totalQTYY'] + $rackOthers['totalQTYOthers']);

        $total = [
            'allCountOff' => $allCountOff,
            'allCountOn' => $allCountOn,
            'allCountQTY' => $allCountQTY
        ];

        $data = [
            'title' => 'List Item',
            'rackCV' => $rackV,
            'rackCW' => $rackW,
            'rackCX' => $rackX,
            'rackCY' => $rackY,
            'rackCOthers' => $rackOthers,
            'total' => $total,
            'item' => $this->tItems->getItem(),
            'itemOut' => $this->tOut->getItem(),
            'itemReceh' => $this->tSisa->getItem(),
        ];

        return view('pages/index', $data);
    }

}
