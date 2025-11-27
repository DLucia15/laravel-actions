<?php

namespace Database\Seeders;

use App\Models\Cicle;
use App\Models\Student;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    private function seedStudents(){
        DB::table('students')->delete();

        $u = new Student();
        $u->name = "Edu";
        $u->email = "edubro@gmail.com";
        $u->address = "Calle 1, 3";
        $u->birth_date = '2005-1-5';
        $u->phone_number = "888888888";
        $u->user_id = 1;
        $u->cicle_id = 1;
        $u->save();
        $u = new Student();
        $u->name = "Iker";
        $u->email = "keiro@gmail.com";
        $u->address = "Calle 1, 3";
        $u->birth_date = '2006-6-20';
        $u->phone_number = "888888888";
        $u->user_id = 2;
        $u->cicle_id = 1;
        $u->save();
        $u = new Student();
        $u->name = "David";
        $u->email = "david@gmail.com";
        $u->address = "Calle 4, 3";
        $u->birth_date = '2005-9-15';
        $u->phone_number = "888888888";
        $u->user_id = 3;
        $u->cicle_id = 1;
        $u->save();
    }

    private function seedUsers(){
        DB::table('users')->delete();

        $u = new User();
        $u->name = "Edu";
        $u->email = "edubro@gmail.com";
        $u->password = bcrypt("12345678");
        $u->save();
        $u = new User();
        $u->name = "Iker";
        $u->email = "keiro@gmail.com";
        $u->password = bcrypt("12345678");
        $u->save();
        $u = new User();
        $u->name = "David";
        $u->email = "david@gmail.com";
        $u->password = bcrypt("12345678");
        $u->save();
        $u = new User();
        $u->name = "admin";
        $u->email = "admin@admin.cat";
        $u->password = bcrypt("admin1234");
        $u->save();
    }

    private function seedCicles(){
        DB::table('cicles')->delete();

        $u = new Cicle();
        $u->code = "DAW";
        $u->name = "Desenvolupament d'Aplicacions Web";
        $u->desc = "En aquest cicle, aprendràs a crear pàgines web de 0 i diversos llenguatges de front i back end.";
        $u->courses = 8;
        $u->image = "https://assets.tina.io/b2c6fbf9-969e-4eb0-a552-d2d375d9e448/web-application-development.jpg";
        $u->save();
        $u = new Cicle();
        $u->code = "DAM";
        $u->name = "Desenvolupament d'Aplicacions Multiplataforma";
        $u->desc = "En aquest cicle, aprendràs a crear aplicacions interactuables per l'usuari";
        $u->courses = 8;
        $u->image = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5HvMarcGjyjrKZZo6z6jqjpOtUiMC8BhC7w&s";
        $u->save();
        $u = new Cicle();
        $u->code = "ASIXcs";
        $u->name = "Administració de sistemes informàtics i xarxes";
        $u->desc = "En aquest cicle, aprendràs a treballar amb sistemes i xarxes";
        $u->courses = 8;
        $u->image = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR5HvMarcGjyjrKZZo6z6jqjpOtUiMC8BhC7w&s";
        $u->save();
    }
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        self::seedUsers();
        self::seedCicles();
        self::seedStudents();
        $this->command->info('Tabla users inicializada con datos!');
    }
}
