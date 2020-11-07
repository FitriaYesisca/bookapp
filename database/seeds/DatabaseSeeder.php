<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        DB::table('books')->insert([
            'title' => 'War of the Worlds',
            'description' => 'A science fiction masterpiece about Martians invading London',
            'author' => 'H. G. Wells',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('books')->insert([
            'title' => 'A Wrinkle in Time',
            'description' => 'A young girl goes on mission to save her father who has gone missing after working on a mysterious project called a tesseract',
            'author' => 'Madeleine L\'Engle',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
         DB::table('authors')->insert([
            'name' => 'H. G. Wells',
            'gender' => 'male',
            'biography' => 'Herbert George Wells adalah seorang novelis, jurnalis, sosiolog, sekaligus sejarawan berkebangsaan Inggris. Dia lahir di Bromley, Kent, Inggris pada tangal 21 September tahun 1866 dan meninggal saat 13 Agustus 1946 di London. Dia terkenal karena novel fiksinya, seperti The Time Machine dan The War of the Worlds, kemudian komik yang dibuatnya, antara lain Tono-Bungay dan The History of Mr. Polly. Bersama dengan Jules Verne, Wells disebut sebagai "Bapak Fiksi Ilmiah".',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('authors')->insert([
            'name' => 'Madeleine L\'Engle',
            'gender' => 'female',
            'biography' => 'Seorang penulis Amerika fiksi, non-fiksi, puisi, dan fiksi dewasa muda , termasuk A Wrinkle in Time dan sekuelnya: A Wind in the Door , A Swiftly Tilting Planet , Many Waters , dan An Acceptable Time . Karya-karyanya mencerminkan iman Kristennya dan minatnya yang kuat pada sains modern.',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
