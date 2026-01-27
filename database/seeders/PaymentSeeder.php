<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentType;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                'name' => 'Gopay'
            ],
            [
                'name' => 'BNI'
            ],
            [
                'name' => 'Dana'
            ],
            [
                'name' => 'BRI'
            ],
        ];

        foreach ($payments as $payment) {
            PaymentType::create($payment);
        }
    }
}
