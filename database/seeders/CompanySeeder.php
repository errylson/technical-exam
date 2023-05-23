<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];

        // URL of the JSON data
        $url = 'https://raw.githubusercontent.com/dariusk/corpora/master/data/corporations/fortune500.json';

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $response = curl_exec($curl);
        curl_close($curl);

        if ($response === false) {
            die('Error: ' . curl_error($curl));
        }
        $companies = json_decode($response, true);
        if ($companies !== null) {
            foreach ($companies['companies'] as $company) {
                $data[] = ['name' => $company];
            }
        } else {
            die('Error: Failed to import data from the external URL.');
        }

        DB::table('tbl_companies')->insert($data);
    }
}
