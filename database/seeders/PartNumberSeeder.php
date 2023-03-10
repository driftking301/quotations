<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partnumbers = [
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700100', 'description' => 'HHCS_.375-16UNC X1.50_GR2_ZP', 'unitmeasure'=> 'Units','price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700101', 'description' => 'RUST_PREVENTATIVE', 'unitmeasure'=> 'Units','price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700102', 'description' => 'PRIMER_GRAY_WATER_BASE', 'unitmeasure'=> 'Units','price' => 0.12],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700103', 'description' => 'HHCS_.250-20UNC X1.00_GR2_ZP', 'unitmeasure'=> 'Units','price' => 0.06],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700104', 'description' => 'RIVNUT_.250-20_UNC_ZP', 'unitmeasure'=> 'Units','price' => 0.13],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700105', 'description' => 'HHCS_.375-16UNC X1.25_GR5_ZP', 'unitmeasure'=> 'Units','price' => 0.10],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700106', 'description' => 'WASHER_NYLON_.375-16_GR6/6', 'unitmeasure'=> 'Units','price' => 0.08],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700107', 'description' => 'WASHER_NYLON_.625-11_GR6/6', 'unitmeasure'=> 'Units','price' => 0.15],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700108', 'description' => 'HHCS_.625-11UNC X1.75_GR2_ZP', 'unitmeasure'=> 'Units','price' => 0.40],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700109', 'description' => 'NUT_SQUARE_.375-16UNC_.63SQ', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700110', 'description' => 'GASKET_CHANNEL_.125_NEOPRENE', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700111', 'description' => 'GASKET_CHANNEL_.188_NEOPRENE', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700112', 'description' => 'HHCS_.375-16UNC X1.00_GR2_ZP', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700113', 'description' => 'GASKET_NEORPENE_.13X10.13X10.13', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700114', 'description' => 'WELDNUT_WPILOT.375-16UNC_PN', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700115', 'description' => 'HHCS_.625-11X1.50_LG_ZP', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700116', 'description' => 'WELDNUT_M5X0.8_18-8SS', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700117', 'description' => 'WELDNUT_M4X0.7_18-8SS', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700118', 'description' => 'WELDNUT_M6X1.00_18-8SS', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700119', 'description' => 'FLEXMASTER_CPLG_.50_NH1650C050B0225', 'unitmeasure'=> 'Units','price' => 0.47],
            ['sheetname' => 'BUY OUT PARTS #700100', 'partnumber' => '700120', 'description' => 'SOCKET_HEAD_SET_SCREW_3/8-16X.50_PLN', 'unitmeasure'=> 'Units','price' => 0.47],
        ];
        DB::table('part_numbers')->insert($partnumbers);
    }
}
