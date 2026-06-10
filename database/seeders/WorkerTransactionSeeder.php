<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Worker;
use App\Models\WorkerTransaction;

class WorkerTransactionSeeder extends Seeder
{
    public function run(): void
    {
        $workers = Worker::all();

        if ($workers->count() == 0) {
            $this->command->error('No workers found. Please add workers first.');
            return;
        }

        $paymentTypes = ['cash', 'upi', 'bank'];

        for ($i = 1; $i <= 5000; $i++) {

            $worker = $workers->random();

            WorkerTransaction::create([
                'user_id'           => $worker->user_id,
                'worker_id'         => $worker->worker_id,
                'worker_name'       => $worker->worker_name,
                'amount'            => rand(100, 10000),
                'transaction_date'  => now()->subDays(rand(0, 365))->toDateString(),
                'payment_type'      => $paymentTypes[array_rand($paymentTypes)],
                'description'       => 'Dummy Transaction #' . $i,
            ]);
        }

        $this->command->info('5000 worker transactions created successfully!');
    }
}