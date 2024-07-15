<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Rack extends Seeder
{
    public function run()
    {
        $data = [];
        $racks = ['V', 'W', 'X', 'Y', 'Others'];

        // Jumlah lokasi dalam satu sub_lokasi
        $numLocations = 5;

        // Jumlah sub_lokasi
        $numSubLocations = 44;

        for ($sub_location = 1; $sub_location <= $numSubLocations; $sub_location++) {
            // Penghitung untuk nomor lokasi dalam satu sub_lokasi
            $locationCounter = 1;

            foreach ($racks as $rack) {
                // Looping untuk setiap lokasi dalam satu sub_lokasi
                for ($location_num = 1; $location_num <= $numLocations; $location_num++) {
                    $data[] = [
                        'sub_locations' => $sub_location,
                        'locations'     => $rack . $locationCounter,
                        'rack'          => $rack
                    ];

                    // Tingkatkan penghitung lokasi
                    $locationCounter++;
                }
            }
        }

        // Insert data into TItems table
        $this->db->table('TItems')->insertBatch($data);
    }
}
