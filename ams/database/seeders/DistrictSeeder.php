<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            ['name' => 'Batu Pahat', 'state_id' => 1],
            ['name' => 'Johor Bahru', 'state_id' => 1],
            ['name' => 'Kluang', 'state_id' => 1],
            ['name' => 'Kota Tinggi', 'state_id' => 1],
            ['name' => 'Kulaijaya', 'state_id' => 1],
            ['name' => 'Mersing', 'state_id' => 1],
            ['name' => 'Muar', 'state_id' => 1],
            ['name' => 'Pontian', 'state_id' => 1],
            ['name' => 'Segamat', 'state_id' => 1],
            ['name' => 'Tangkak', 'state_id' => 1],
            ['name' => 'Baling', 'state_id' => 2],
            ['name' => 'Bandar Baharu', 'state_id' => 2],
            ['name' => 'Kota Setar', 'state_id' => 2],
            ['name' => 'Kuala Muda', 'state_id' => 2],
            ['name' => 'Kubang Pasu', 'state_id' => 2],
            ['name' => 'Kulim', 'state_id' => 2],
            ['name' => 'Langkawi', 'state_id' => 2],
            ['name' => 'Padang Terap', 'state_id' => 2],
            ['name' => 'Pendang', 'state_id' => 2],
            ['name' => 'Pokok Sena', 'state_id' => 2],
            ['name' => 'Sik', 'state_id' => 2],
            ['name' => 'Yan', 'state_id' => 2],
            ['name' => 'Bachok', 'state_id' => 3],
            ['name' => 'Gua Musang', 'state_id' => 3],
            ['name' => 'Jeli', 'state_id' => 3],
            ['name' => 'Kecil Lojing', 'state_id' => 3],
            ['name' => 'Kota Bharu', 'state_id' => 3],
            ['name' => 'Kuala Krai', 'state_id' => 3],
            ['name' => 'Machang', 'state_id' => 3],
            ['name' => 'Pasir Mas', 'state_id' => 3],
            ['name' => 'Pasir Puteh', 'state_id' => 3],
            ['name' => 'Tanah Merah', 'state_id' => 3],
            ['name' => 'Tumpat', 'state_id' => 3],
            ['name' => 'Kuala Lumpur', 'state_id' => 4],
            ['name' => 'Labuan', 'state_id' => 5],
            ['name' => 'Alor Gajah', 'state_id' => 6],
            ['name' => 'Jasin', 'state_id' => 6],
            ['name' => 'Melaka Tengah', 'state_id' => 6],
            ['name' => 'Jelebu', 'state_id' => 7],
            ['name' => 'Jempol', 'state_id' => 7],
            ['name' => 'Kuala Pilah', 'state_id' => 7],
            ['name' => 'Port Dickson', 'state_id' => 7],
            ['name' => 'Rembau', 'state_id' => 7],
            ['name' => 'Seremban', 'state_id' => 7],
            ['name' => 'Tampin', 'state_id' => 7],
            ['name' => 'Bentong', 'state_id' => 8],
            ['name' => 'Bera', 'state_id' => 8],
            ['name' => 'Cameron Highlands', 'state_id' => 8],
            ['name' => 'Jerantut', 'state_id' => 8],
            ['name' => 'Kuantan', 'state_id' => 8],
            ['name' => 'Lipis', 'state_id' => 8],
            ['name' => 'Maran', 'state_id' => 8],
            ['name' => 'Pekan', 'state_id' => 8],
            ['name' => 'Raub', 'state_id' => 8],
            ['name' => 'Rompin', 'state_id' => 8],
            ['name' => 'Temerloh', 'state_id' => 8],
            ['name' => 'Bagan Datuk', 'state_id' => 9],
            ['name' => 'Batang Padang', 'state_id' => 9],
            ['name' => 'Hilir Perak', 'state_id' => 9],
            ['name' => 'Hulu Perak', 'state_id' => 9],
            ['name' => 'Kampar', 'state_id' => 9],
            ['name' => 'Kerian', 'state_id' => 9],
            ['name' => 'Kinta', 'state_id' => 9],
            ['name' => 'Kuala Kangsar', 'state_id' => 9],
            ['name' => 'Larut dan Matang', 'state_id' => 9],
            ['name' => 'Manjung', 'state_id' => 9],
            ['name' => 'Muallim', 'state_id' => 9],
            ['name' => 'Perak Tengah', 'state_id' => 9],
            ['name' => 'Selama', 'state_id' => 9],
            ['name' => 'Perlis', 'state_id' => 10],
            ['name' => 'Barat Daya', 'state_id' => 11],
            ['name' => 'Seberang Perai Selatan', 'state_id' => 11],
            ['name' => 'Seberang Perai Tengah', 'state_id' => 11],
            ['name' => 'Seberang Perai Utara', 'state_id' => 11],
            ['name' => 'Timur Laut', 'state_id' => 11],
            ['name' => 'Putrajaya', 'state_id' => 12],
            ['name' => 'Beaufort', 'state_id' => 13],
            ['name' => 'Beluran', 'state_id' => 13],
            ['name' => 'Kalabakan', 'state_id' => 13],
            ['name' => 'Keningau', 'state_id' => 13],
            ['name' => 'Kinabatangan', 'state_id' => 13],
            ['name' => 'Kota Belud', 'state_id' => 13],
            ['name' => 'Kota Kinabalu', 'state_id' => 13],
            ['name' => 'Kota Marudu', 'state_id' => 13],
            ['name' => 'Kuala Penyu', 'state_id' => 13],
            ['name' => 'Kudat', 'state_id' => 13],
            ['name' => 'Kunak', 'state_id' => 13],
            ['name' => 'Lahad Datu', 'state_id' => 13],
            ['name' => 'Nabawan', 'state_id' => 13],
            ['name' => 'Papar', 'state_id' => 13],
            ['name' => 'Penampang', 'state_id' => 13],
            ['name' => 'Pitas', 'state_id' => 13],
            ['name' => 'Putatan', 'state_id' => 13],
            ['name' => 'Ranau', 'state_id' => 13],
            ['name' => 'Sandakan', 'state_id' => 13],
            ['name' => 'Semporna', 'state_id' => 13],
            ['name' => 'Sipitang', 'state_id' => 13],
            ['name' => 'Tambunan', 'state_id' => 13],
            ['name' => 'Tawau', 'state_id' => 13],
            ['name' => 'Telupid', 'state_id' => 13],
            ['name' => 'Tenom', 'state_id' => 13],
            ['name' => 'Tongod', 'state_id' => 13],
            ['name' => 'Tuaran', 'state_id' => 13],
            ['name' => 'Asajaya', 'state_id' => 14],
            ['name' => 'Bau', 'state_id' => 14],
            ['name' => 'Belaga', 'state_id' => 14],
            ['name' => 'Beluru', 'state_id' => 14],
            ['name' => 'Betong', 'state_id' => 14],
            ['name' => 'Bintulu', 'state_id' => 14],
            ['name' => 'Bukit Mabong', 'state_id' => 14],
            ['name' => 'Dalat', 'state_id' => 14],
            ['name' => 'Daro', 'state_id' => 14],
            ['name' => 'Julau', 'state_id' => 14],
            ['name' => 'Kabong', 'state_id' => 14],
            ['name' => 'Kanowit', 'state_id' => 14],
            ['name' => 'Kapit', 'state_id' => 14],
            ['name' => 'Kuching', 'state_id' => 14],
            ['name' => 'Lawas', 'state_id' => 14],
            ['name' => 'Limbang', 'state_id' => 14],
            ['name' => 'Lundu', 'state_id' => 14],
            ['name' => 'Maradong', 'state_id' => 14],
            ['name' => 'Marudi', 'state_id' => 14],
            ['name' => 'Matu', 'state_id' => 14],
            ['name' => 'Miri', 'state_id' => 14],
            ['name' => 'Mukah', 'state_id' => 14],
            ['name' => 'Pakan', 'state_id' => 14],
            ['name' => 'Pusa', 'state_id' => 14],
            ['name' => 'Samarahan', 'state_id' => 14],
            ['name' => 'Saratok', 'state_id' => 14],
            ['name' => 'Sarikei', 'state_id' => 14],
            ['name' => 'Sebauh', 'state_id' => 14],
            ['name' => 'Selangau', 'state_id' => 14],
            ['name' => 'Serian', 'state_id' => 14],
            ['name' => 'Sibu', 'state_id' => 14],
            ['name' => 'Simunjan', 'state_id' => 14],
            ['name' => 'Song', 'state_id' => 14],
            ['name' => 'Sri Aman', 'state_id' => 14],
            ['name' => 'Subis', 'state_id' => 14],
            ['name' => 'Tanjung Manis', 'state_id' => 14],
            ['name' => 'Tatau', 'state_id' => 14],
            ['name' => 'Tebedu', 'state_id' => 14],
            ['name' => 'Telang Usan', 'state_id' => 14],
            ['name' => 'Gombak', 'state_id' => 15],
            ['name' => 'Klang', 'state_id' => 15],
            ['name' => 'Kuala Langat', 'state_id' => 15],
            ['name' => 'Kuala Selangor', 'state_id' => 15],
            ['name' => 'Petaling', 'state_id' => 15],
            ['name' => 'Sabak Bernam', 'state_id' => 15],
            ['name' => 'Sepang', 'state_id' => 15],
            ['name' => 'Ulu Langat', 'state_id' => 15],
            ['name' => 'Ulu Selangor', 'state_id' => 15],
            ['name' => 'Besut', 'state_id' => 16],
            ['name' => 'Dungun', 'state_id' => 16],
            ['name' => 'Hulu Terengganu', 'state_id' => 16],
            ['name' => 'Kemaman', 'state_id' => 16],
            ['name' => 'Kuala Nerus', 'state_id' => 16],
            ['name' => 'Kuala Terengganu', 'state_id' => 16],
            ['name' => 'Marang', 'state_id' => 16],
            ['name' => 'Setiu', 'state_id' => 16],

        ];

        District::insert($districts);
    }
}
