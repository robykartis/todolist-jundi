<?php

namespace Database\Seeders;

use App\Models\Todolist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodolistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Todolist::create([
            'tugas' => 'Tugas 1 Belajar Laravel',
            'deskripsi' => 'Deskripsi 2 Tugas Belajar Laravel',
            'tanggal' => '2021-01-01',
        ]);
        Todolist::create([
            'tugas' => 'Tugas 2 Belajar Laravel',
            'deskripsi' => 'Deskripsi Tugas 2 Belajar Laravel',
            'tanggal' => '2022-01-01',
        ]);
        Todolist::create([
            'tugas' => 'Tugas 3 Belajar Laravel',
            'deskripsi' => 'Deskripsi Tugas 3 Belajar Laravel',
            'tanggal' => '2023-01-01',
        ]);
    }
}
