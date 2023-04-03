<?php

namespace Database\Seeders;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InvoiceSeeder extends Seeder
{

    function randomDate($start_date, $end_date)
    {
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        return date('Y-m-d', $val);
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $count = 100;

        for($i=0; $i<$count; $i++){

            // Initial Initialization
            $remarks = "";
            $no_of_entry = rand(1, 5);
            $tasks = ["Data Entry", "Domain Registration", "Website Design", "Laptop", "Charger", "Logo Design", "Mobile Application", "Laptop Repair", "AI Services", "Mobile Repair", "AWS Service", "UI/UX Design", "Training"];

            // Gathering invoice items with total
            $rates = array();
            $amounts = array();
            $times = array();
            $particulars = array();
            $total = 0;

            for($i=0; $i<$no_of_entry; $i++){
                $rate = rand(100, 1000);
                $amount = rand(1, 10);
                $time = rand(1, 10);
                $particular = $tasks[array_rand($tasks, 1)];

                $total += ($rate*$amount*$time);

                array_push($rates, $rate);
                array_push($times, $time);
                array_push($amounts, $amount);
                array_push($particulars, $particular);

                $remarks = $remarks ." ".$particular;
            }
            $remarks = $remarks ." was bought. Thank you !!";

            // Calculate VAT and Discount
            $discount = (rand(0, 20)/100) * $total;
            $vat = rand(0, 1) * 0.13 * ($total-$discount);
            $total = $total - $discount + $vat;

            // Create invoice
            $invoice = Invoice::create([
                "user_id"=> User::inRandomOrder()->first()->id,
                "total"=>$total,
                "vat"=>$vat,
                "discount"=>$discount,
                "invoice_no"=>Str::random(10),
                "remarks"=>$remarks,
                "date_of_entry"=>$this->randomDate('2019-01-01','2022-09-11'),
            ]);

            for($i=0; $i<$no_of_entry; $i++){
                InvoiceItem::create([
                    "particular"=>$particulars[$i],
                    "amount"=>$amounts[$i],
                    "rate"=>$rates[$i],
                    "time"=>$times[$i],
                    "invoice_id"=>$invoice->id,
                ]);
            }
        }
    }
}
