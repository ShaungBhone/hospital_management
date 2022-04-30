<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Appointment::factory()->count(10)->make();
        App\BedAllotment::factory()->count(10)->make();
        App\Bed::factory()->count(10)->make();
        App\CaseHistory::factory()->count(10)->make();
        App\DayoffSchedule::factory()->count(10)->make();
        App\Document::factory()->count(10)->make();
        App\Expense::factory()->count(10)->make();
        App\LapReport::factory()->count(10)->make();
        App\LapTemplate::factory()->count(10)->make();
        App\MedicineCategory::factory()->count(10)->make();
        App\Medicine::factory()->count(10)->make();
        App\Finance::factory()->count(10)->make();
        App\TimeSchedule::factory()->count(10)->make();
        App\Department::factory()->count(10)->make();
        App\PaymentItem::factory()->count(10)->make();
        App\Payment::factory()->count(10)->make()->each(function($a) {
            $a->paymentitems()->attach(App\PaymentItem::all()->random(3),['payment_item_quantity'=>50]);
        });
        App\Prescription::factory()->count(10)->make()->each(function($a) {
            $a->medicines()->attach(App\Medicine::all()->random(3),['instructions'=>'test']);
        });

        App\User::factory()->count(50)->make()->each(function($a) {
            $a->departments()->attach(App\Department::all()->random(1));
        });
    }
}
