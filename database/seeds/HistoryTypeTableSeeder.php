<?php

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Class HistoryTypeTableSeeder
 */
class HistoryTypeTableSeeder extends Seeder {

	/**
	 *
	 */
	public function run() {

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		}

		DB::table('history_types')->truncate();

		$types = [
			[
				'id' => 1,
				'name' => 'User',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
			[
				'id' => 2,
				'name' => 'Role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now()
			],
		];

		DB::table('history_types')->insert($types);

		if (DB::connection()->getDriverName() == 'mysql') {
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		}







		$types = [
				[
						'id' => 1,
						'name' => 'Taxi',
					    'slug'=>'taxi',
					    'fare_per_hour'=>'10.00',
					    'fare_per_km'=>'1.00',
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
				],
				[
						'id' => 2,
						'name' => 'Car',
						'slug'=>'car',
						'fare_per_hour'=>'10.00',
						'fare_per_km'=>'1.00',
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
				],
				[
						'id' => 3,
						'name' => 'TukTuk',
						'slug'=>'tuktuk',
						'fare_per_hour'=>'10.00',
						'fare_per_km'=>'1.00',
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
				],
				[
						'id' => 4,
						'name' => 'Moto ',
						'slug'=>'moto',
						'fare_per_hour'=>'10.00',
						'fare_per_km'=>'1.00',
						'created_at' => Carbon::now(),
						'updated_at' => Carbon::now()
				],
		];
		// save restaurants
		DB::table("transportations")->insert($types);


		## Taxi attach

		$user_model = config('auth.providers.users.model');
		$user_model = new $user_model;
		$user_model::find(3)->attachTransportation(1);


	}
}