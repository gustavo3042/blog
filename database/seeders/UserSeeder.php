<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{

   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {


      User::create([
'name'=> 'Gustavo Andres Rios',
'email' =>'metal123z3042@gmail.com',
'password' =>bcrypt('12345678')

      ])->assignRole('Admin'); //se le asigna un rol a este usuario

      User::create([
        'name'=> 'maria',
        'email' =>'maria@gmail.com',
        'password' =>bcrypt('12345678')
        
              ])->assignRole('Cliente'); //se le asigna un rol a este usuario


User::factory(1)->create();

$this->insertAfp();
$this->insertTipoContrato();
$this->insertAbsences();

    }


    private static function insertAfp()
    {


        $datos = [

            ['Afp modelo S.A'],
            ['Afp capital S.A'],
            ['Afp habitat S.A'],
            ['Afp Provida S.A'],
            ['Afp cuprum S.A'],
            ['AFP San Cristóbal S.A.'],
            ['AFP El Libertador S.A'],
            ['AFP Planvital S.A'],
            ['AFP Summa S.A'],
            ['AFP Alameda S.A'],
            ['AFP Concordia S.A'],
            ['AFP Invierta S.A'],
            ['AFP Magister S.A'],
            ['AFP Protección S.A'],
            ['AFP Futuro S.A'],
            ['AFP Bannuestra S.A'],
            ['AFP BanguardiaS.A'],
            ['AFP Qualitas S.A'],
            ['AFP Laboral S.A'],
            ['AFP Bansander S.A'],
            ['AFP Fomenta S.A'],
            ['AFP Previpan S.A'],
            ['AFP Valora S.A'],
            ['AFP GeneraS.A'],
            ['AFP Aporta S.A'],
            ['AFP Armoniza S.A'],
        
       

        ];
        $datos = array_map(function ($type)  {
            return [
                'name' => $type[0],
            ];
        }, $datos);

        DB::table('afps')->insert($datos);
    }


    private static function insertTipoContrato()
    {


        $datos = [

            ['Trabajando Contrato a plazo fijo'],
            ['Trabajando Contrato indefinido'],
            ['Trabajando Contrato de obra o faena'],
            ['Cesante'],
            ['Universitario/a'],
            ['Estudiante'],
            ['Dueña/o de Casa'],
            ['Otro'],

        ];
        $datos = array_map(function ($type)  {
            return [
                'name' => $type[0],
            ];
        }, $datos);

        DB::table('tipo_contratos')->insert($datos);
       

       
    }


    private static function insertAbsences()
    {
        $now = \Carbon\Carbon::now();
        $absences = [


            ['Ninguno'],
            ['Falla'],
            ['Licencia'],
            ['Vacaciones'],
            ['Permiso de Medio Tiempo'],
            ['Permiso de Tiempo Completo'],

        ];
        $absences = array_map(function ($type) use ($now) {
            return [
                'name' => $type[0],
                'updated_at' => $now,
                'created_at' => $now,
            ];
        }, $absences);

        DB::table('absences')->insert($absences);
    }

  
}
