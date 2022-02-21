<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Credit;
use App\Models\Payment;
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
        DB::insert('insert into users (username, password) values (?, ?)', ["gerencia", Hash::make("3663")]);
        DB::insert('insert into users (username, password) values (?, ?)', ["tecnico", Hash::make("2022")]);
        /* DB::insert('insert into products (codigo, nombre, precio, marca, cantidad) values (?, ?, ?, ?, ?)', [1343, "producto1", 2143, "marca1", 0]);
        DB::insert('insert into products (codigo, nombre, precio, marca, cantidad) values (?, ?, ?, ?, ?)', [1542, "producto2", 2143, "marca1", 0]);
        DB::insert('insert into products (codigo, nombre, precio, marca, cantidad) values (?, ?, ?, ?, ?)', [6541, "producto3", 2143, "marca2", 0]);
        DB::insert('insert into products (codigo, nombre, precio, marca, cantidad) values (?, ?, ?, ?, ?)', [1422, "producto4", 2143, "marca3", 0]);

        Client::factory()->count(5)->create();

        Credit::factory()->count(5)->create();

        Payment::factory()->count(10)->create(); */
    }
}
