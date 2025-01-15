<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            "image" => "WHAT WE SERVE",
            "title" => "Top Values For You 🔥",
            "description" => "Try a varienty of benefits when using our services"
        ]);
        Service::create([
            "image" => "globes.png",
            "title" => "Lot of Choices",
            "description" => "Total 460+ destinations that we work with."
        ]);
        Service::create([
            "image" => "suitcase.png",
            "title" => "Best Tour Guide",
            "description" => "Our tour guide with 15+ years of experience."
        ]);
        Service::create([
            "image" => "tickets.png",
            "title" => "Easy Booking",
            "description" => "With an easy and fast ticket purchase process."
        ]);
    }
}
