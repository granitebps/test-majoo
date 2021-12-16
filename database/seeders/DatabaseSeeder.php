<?php

namespace Database\Seeders;

use App\Models\Merchant;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Admin 1',
            'user_name' => 'admin1',
            'password' => Hash::make('admin1')
        ]);
        $user2 = User::create([
            'name' => 'Admin 2',
            'user_name' => 'admin2',
            'password' => Hash::make('admin2')
        ]);

        $merchant1 = Merchant::create([
            'user_id' => $user1->id,
            'merchant_name' => 'merchant 1',
            'created_by' => $user1->id,
            'updated_by' => $user1->id
        ]);
        $merchant2 = Merchant::create([
            'user_id' => $user2->id,
            'merchant_name' => 'merchant 2',
            'created_by' => $user2->id,
            'updated_by' => $user2->id
        ]);

        $outlet1 = Outlet::create([
            'merchant_id' => $merchant1->id,
            'outlet_name' => 'Outlet 1',
            'created_by' => $merchant1->user_id,
            'updated_by' => $merchant1->user_id
        ]);
        $outlet2 = Outlet::create([
            'merchant_id' => $merchant2->id,
            'outlet_name' => 'Outlet 1',
            'created_by' => $merchant2->user_id,
            'updated_by' => $merchant2->user_id
        ]);
        $outlet3 = Outlet::create([
            'merchant_id' => $merchant1->id,
            'outlet_name' => 'Outlet 2',
            'created_by' => $merchant1->user_id,
            'updated_by' => $merchant1->user_id
        ]);

        $transactions = [
            [
                'merchant_id' => $outlet1->merchant_id,
                'outlet_id' => $outlet1->id,
                'bill_total' => 2000,
                'created_by' => $outlet1->merchant->user_id,
                'updated_by' => $outlet1->merchant->user_id,
                'created_at' => '2021-11-01 12:30:04',
                'updated_at' => '2021-11-01 12:30:04'
            ],
            [
                'merchant_id' => $outlet1->merchant_id,
                'outlet_id' => $outlet1->id,
                'bill_total' => 2500,
                'created_by' => $outlet1->merchant->user_id,
                'updated_by' => $outlet1->merchant->user_id,
                'created_at' => '2021-11-01 17:20:14',
                'updated_at' => '2021-11-01 17:20:14'
            ],
            [
                'merchant_id' => $outlet1->merchant_id,
                'outlet_id' => $outlet1->id,
                'bill_total' => 4000,
                'created_by' => $outlet1->merchant->user_id,
                'updated_by' => $outlet1->merchant->user_id,
                'created_at' => '2021-11-02 12:30:04',
                'updated_at' => '2021-11-02 12:30:04'
            ],
            [
                'merchant_id' => $outlet1->merchant_id,
                'outlet_id' => $outlet1->id,
                'bill_total' => 1000,
                'created_by' => $outlet1->merchant->user_id,
                'updated_by' => $outlet1->merchant->user_id,
                'created_at' => '2021-11-04 12:30:04',
                'updated_at' => '2021-11-04 12:30:04'
            ],
            [
                'merchant_id' => $outlet1->merchant_id,
                'outlet_id' => $outlet1->id,
                'bill_total' => 7000,
                'created_by' => $outlet1->merchant->user_id,
                'updated_by' => $outlet1->merchant->user_id,
                'created_at' => '2021-11-05 16:59:30',
                'updated_at' => '2021-11-05 16:59:30'
            ],
            [
                'merchant_id' => $outlet3->merchant_id,
                'outlet_id' => $outlet3->id,
                'bill_total' => 2000,
                'created_by' => $outlet3->merchant->user_id,
                'updated_by' => $outlet3->merchant->user_id,
                'created_at' => '2021-11-02 18:30:04',
                'updated_at' => '2021-11-02 18:30:04'
            ],
            [
                'merchant_id' => $outlet3->merchant_id,
                'outlet_id' => $outlet3->id,
                'bill_total' => 2500,
                'created_by' => $outlet3->merchant->user_id,
                'updated_by' => $outlet3->merchant->user_id,
                'created_at' => '2021-11-03 17:20:14',
                'updated_at' => '2021-11-03 17:20:14'
            ],
            [
                'merchant_id' => $outlet3->merchant_id,
                'outlet_id' => $outlet3->id,
                'bill_total' => 4000,
                'created_by' => $outlet3->merchant->user_id,
                'updated_by' => $outlet3->merchant->user_id,
                'created_at' => '2021-11-04 12:30:04',
                'updated_at' => '2021-11-04 12:30:04'
            ],
            [
                'merchant_id' => $outlet3->merchant_id,
                'outlet_id' => $outlet3->id,
                'bill_total' => 1000,
                'created_by' => $outlet3->merchant->user_id,
                'updated_by' => $outlet3->merchant->user_id,
                'created_at' => '2021-11-04 12:31:04',
                'updated_at' => '2021-11-04 12:31:04'
            ],
            [
                'merchant_id' => $outlet3->merchant_id,
                'outlet_id' => $outlet3->id,
                'bill_total' => 7000,
                'created_by' => $outlet3->merchant->user_id,
                'updated_by' => $outlet3->merchant->user_id,
                'created_at' => '2021-11-05 16:59:30',
                'updated_at' => '2021-11-05 16:59:30'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 2000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-01 18:30:04',
                'updated_at' => '2021-11-01 18:30:04'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 2500,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-02 17:20:14',
                'updated_at' => '2021-11-02 17:20:14'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 4000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-03 12:30:04',
                'updated_at' => '2021-11-03 12:30:04'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 1000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-04 12:31:04',
                'updated_at' => '2021-11-04 12:31:04'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 7000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-05 16:59:30',
                'updated_at' => '2021-11-05 16:59:30'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 2000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-05 18:30:04',
                'updated_at' => '2021-11-05 18:30:04'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 2500,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-06 17:20:14',
                'updated_at' => '2021-11-06 17:20:14'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 4000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-07 12:30:04',
                'updated_at' => '2021-11-07 12:30:04'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 1000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-08 12:31:04',
                'updated_at' => '2021-11-08 12:31:04'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 7000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-09 16:59:30',
                'updated_at' => '2021-11-09 16:59:30'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 1000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-10 12:31:04',
                'updated_at' => '2021-11-10 12:31:04'
            ],
            [
                'merchant_id' => $outlet2->merchant_id,
                'outlet_id' => $outlet2->id,
                'bill_total' => 7000,
                'created_by' => $outlet2->merchant->user_id,
                'updated_by' => $outlet2->merchant->user_id,
                'created_at' => '2021-11-11 16:59:30',
                'updated_at' => '2021-11-11 16:59:30'
            ],
        ];
        DB::table('transactions')->insert($transactions);
    }
}
