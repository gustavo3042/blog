<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Reparaciones;
use App\Models\Cliente;
use App\Models\Tag;
use App\Models\Autos;
use App\Models\Insumo;
use App\Models\Post;
use App\Models\Worker;
use FontLib\Table\Type\name;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();


Storage::deleteDirectory('posts');
Storage::makeDirectory('posts');
//Storage::deleteDirectory('check_lists');
//Storage::makeDirectory('check_lists');
//Storage::deleteDirectory('orden_servicios');
//Storage::makeDirectory('orden_servicios');

$this->call(RoleSeeder::class);
$this->call(UserSeeder::class);



Category::factory(0)->create();
Tag::factory(0)->create();
//Reparaciones::factory(8)->create();
//Autos::factory(5)->create();



$this->call(PostSeeder::class);

//Cliente::factory(5)->create();

//$this->call(CheckListseeder::class);

//$this->call(OrdenSeeder::class);




$create = Reparaciones::create([

    'name' => 'Reparaciones Mecánicas',
    'precio'=> 500000

]);

$create2 = Reparaciones::create([

    'name' => 'Reparaciones Electromecanicas',
    'precio'=> 120000

]);


$workers = Worker::create([

    'name' => 'Luis',
    'name2' => 'Alberto',
    'surname' => 'Rios',
    'surname2' => 'Aguilera',
    'rut' => '8069821-6',
    

]);

$workers2 = Worker::create([

    'name' => 'Jaime',
    'name2' => 'Alberto',
    'surname' => 'Rios',
    'surname2' => 'Cabeza',
    'rut' => '18451216-5',
    

]);


$categoria = Category::create([

    'name' => 'Reparaciones Mecánicas',
    'slug' => 'reparaciones-mecánicas'

]);


$categoria2 = Category::create([

    'name' => 'Reparaciones Electromecanicas',
    'slug' => 'reparaciones-electromecanicas'

]);


$etiquetas = Tag::create([

'name' => 'Reparación de Motor',
'slug' => 'reparacion-de-motor',
'color' => 'blue'

]);

$etiquetas2 = Tag::create([

    'name' => 'Reparación de Culata',
    'slug' => 'reparacion-de-culata',
    'color' => 'red'
    
    ]);



    $etiquetas3 = Tag::create([

        'name' => 'Reparación de Dirección',
        'slug' => 'reparacion-de-direccion',
        'color' => 'green'
        
        ]);


        $etiquetas4 = Tag::create([

            'name' => 'Cambio de Distribución',
            'slug' => 'cambio-de-distribucion',
            'color' => 'yellow'
            
            ]);


            $etiquetas5 = Tag::create([

                'name' => 'Reparación DPF',
                'slug' => 'reparacion-dpf',
                'color' => 'purple'
                
                ]);

/* 
        $post = Post::create([

            'name' => 'Reparación de culata',
            'slug' => 'reparacion-de-culata',
            'extract' => '<p>Reparación de Culata</p><p><strong>Costo reparación vehículo bencinero $250000.</strong></p><p><strong>Costo reparación Vehículo diesel $350000.</strong></p>',
            'body' => '<p>La reparación de la culata de un motor consiste en una serie de procesos y tareas técnicas diseñadas para restaurar su funcionalidad y garantizar que el motor opere de manera eficiente y segura. La culata es una parte crítica del motor que sella la parte superior de los cilindros, conteniendo la combustión y facilitando el flujo de gases de escape y admisión. La reparación de una culata generalmente incluye las siguientes etapas:</p><p><strong>Desmontaje</strong>: Se retira la culata del motor, lo cual implica desarmar varias partes del motor, como el sistema de escape, la admisión, las válvulas y, a veces, las bujías o inyectores.</p><p><strong>Limpieza</strong>: Se realiza una limpieza exhaustiva de la culata para eliminar cualquier acumulación de carbón, aceite, y otros residuos que puedan afectar su funcionamiento.</p><p><strong>Inspección</strong>: Se inspecciona la culata en busca de daños o desgastes, como grietas, deformaciones, corrosión, o desgaste en las guías y asientos de las válvulas.</p><p><strong>Rectificado de superficie</strong>: Si la superficie de la culata está deformada o dañada, se realiza un rectificado para garantizar que esté completamente plana y pueda sellar correctamente contra el bloque del motor.</p><p><strong>Reparación de grietas</strong>: Si se encuentran grietas, se pueden reparar mediante soldadura o utilizando métodos como el recubrimiento de metal.</p><p><strong>Reemplazo de componentes</strong>: Se reemplazan las guías de las válvulas, los sellos, los asientos de las válvulas y otras partes desgastadas o dañadas.</p><p><strong>Rectificado de válvulas</strong>: Las válvulas y sus asientos se rectifican para asegurar un sellado perfecto y evitar fugas de compresión.</p><p><strong>Reensamblaje</strong>: Después de realizar todas las reparaciones y reemplazos necesarios, se reensambla la culata, incluyendo la instalación de las válvulas y otros componentes.</p><p><strong>Pruebas de presión</strong>: Se realizan pruebas de presión para asegurarse de que no haya fugas en los conductos de agua y aceite, y para verificar que la culata puede mantener la compresión adecuada.</p><p><strong>Instalación</strong>: Finalmente, la culata se reinstala en el motor, asegurando que todas las juntas y sellos estén correctamente colocados para evitar fugas.</p><p>La reparación de la culata es un trabajo especializado que requiere precisión y atención al detalle, ya que cualquier error puede afectar gravemente el rendimiento del motor. Es recomendable que este tipo de reparación sea realizada por mecánicos profesionales con experiencia en motores.</p><p><strong>Costo reparación vehículo bencinero $250000.</strong></p><p><strong>Costo reparación Vehículo diesel $350000.</strong></p>',
            'status' => 2,
            'user_id' => 1,
            'category_id' => $categoria->id
        ]);

        $postTag = DB::table('post_tag')->insert(['post_id'=>$post->id,'tag_id'=>$etiquetas->id]);




        $post2 = Post::create([

            'name' => 'Reparación de Motor',
            'slug' => 'reparación-de-motor',
            'extract' => '<p>Reparación de Motor</p><p><strong>Costo reparación vehículo bencinero $650000.</strong></p><p><strong>Costo reparación Vehículo diesel $900000.</strong></p>',
            'body' => '<p>La reparación de un motor de vehículo es un proceso complejo que puede involucrar una variedad de tareas dependiendo de la naturaleza del problema. A continuación, se detallan los pasos y componentes más comunes involucrados en la reparación de un motor de automóvil:</p><h3>1. Diagnóstico del Problema</h3><ul><li><strong>Inspección Visual</strong>: Verificación de fugas, cables sueltos o conexiones dañadas.</li><li><strong>Pruebas de Compresión</strong>: Medición de la presión de los cilindros para identificar problemas de compresión.</li><li><strong>Escaneo de Códigos de Error</strong>: Utilización de herramientas de diagnóstico para leer los códigos de error del sistema de gestión del motor.</li></ul><h3>2. Desmontaje del Motor</h3><ul><li><strong>Desconexión de Componentes</strong>: Remoción de componentes externos como el alternador, bomba de agua, y demás accesorios.</li><li><strong>Extracción del Motor</strong>: Retiro del motor del vehículo, lo cual puede requerir la desconexión de múltiples sistemas y soportes.</li><li><strong>Desmontaje Interno</strong>: Separación de las partes internas del motor, como culata, bloque, pistones, cigüeñal, y bielas.</li></ul><h3>3. Evaluación y Limpieza de Componentes</h3><ul><li><strong>Inspección de Piezas</strong>: Verificación del desgaste y daños en las piezas internas.</li><li><strong>Limpieza</strong>: Uso de solventes y baños ultrasónicos para limpiar piezas y canales de lubricación.</li></ul><h3>4. Reemplazo o Reparación de Componentes</h3><ul><li><strong>Piezas Desgastadas</strong>: Sustitución de componentes desgastados o dañados, como pistones, segmentos, cojinetes, y juntas.</li><li><strong>Rectificación</strong>: Mecanizado de componentes como el cigüeñal, cilindros y válvulas para restaurar superficies.</li><li><strong>Reensamblaje</strong>: Montaje de las piezas nuevas o reparadas, asegurando el ajuste y la lubricación adecuados.</li></ul><h3>5. Montaje y Pruebas</h3><ul><li><strong>Reensamblaje del Motor</strong>: Colocación del motor nuevamente en el vehículo y reconexión de todos los sistemas y soportes.</li><li><strong>Pruebas de Funcionamiento</strong>: Arranque del motor y monitoreo de su desempeño para asegurar que funcione correctamente.</li><li><strong>Ajustes Finales</strong>: Realización de ajustes necesarios para asegurar el rendimiento óptimo del motor.</li></ul><h3>Componentes Clave Involucrados</h3><ul><li><strong>Cilindros y Pistones</strong>: Revisión y, si es necesario, sustitución de los pistones y reparación o sustitución de los cilindros.</li><li><strong>Cigüeñal y Bielas</strong>: Inspección y reparación o sustitución del cigüeñal y las bielas.</li><li><strong>Sistema de Válvulas</strong>: Reemplazo de válvulas, guías, y asientos si es necesario.</li><li><strong>Juntas y Sellos</strong>: Sustitución de todas las juntas y sellos para evitar fugas de aceite y refrigerante.</li><li><strong>Sistema de Lubricación y Refrigeración</strong>: Revisión y reparación del sistema de lubricación y refrigeración para asegurar que funcionen correctamente.</li></ul><h3>Herramientas y Equipos Usados</h3><ul><li><strong>Herramientas de Diagnóstico</strong>: Escáneres de códigos y equipos de medición de compresión.</li><li><strong>Herramientas Manuales y Eléctricas</strong>: Llaves, trinquetes, extractores y torquímetros.</li><li><strong>Equipo de Mecanizado</strong>: Torno, fresadora, rectificadora, y otros equipos para la rectificación de componentes.</li></ul><p>La reparación de un motor requiere habilidades y conocimientos especializados, así como acceso a herramientas y equipos adecuados. Por lo general, es realizada por mecánicos profesionales en talleres especializados.</p><p><strong>Costo reparación vehículo bencinero $650000.</strong></p><p><strong>Costo reparación Vehículo diesel $900000.</strong></p>',
            'status' => 2,
            'user_id' => 1,
            'category_id' => $categoria->id
        ]);

        $postTag2 = DB::table('post_tag')->insert(['post_id'=>$post2->id,'tag_id'=>$etiquetas2->id]);



        
        $post3 = Post::create([

            'name' => 'Reparación de Dirección',
            'slug' => 'reparacion-de-direccion',
            'extract' => '<p>Reparación de Dirección</p><p><strong>Costo reparación de autos $50000.</strong></p><p><strong>Costo reparación de autos mas cambio de amortiguadores $100000.</strong></p><p><strong>Costo reparación de camionetas 4x2 $120000.</strong></p><p><strong>Costo reparación de camionetas 4x4 $160000.</strong></p>',
            'body' => '<p>La reparación de la dirección de un vehículo es un proceso integral que incluye la inspección, el diagnóstico y la reparación de los componentes del sistema de dirección del vehículo. Este sistema es crucial para el control y la maniobrabilidad del vehículo. A continuación se detallan los componentes y pasos más comunes en la reparación de la dirección:</p><h3>Componentes del Sistema de Dirección</h3><ol><li><strong>Volante</strong>: Conduce el movimiento hacia el sistema de dirección.</li><li><strong>Columna de dirección</strong>: Conecta el volante con el sistema de dirección.</li><li><strong>Caja de dirección</strong>: Convierte el movimiento rotacional del volante en movimiento lineal que mueve las ruedas.</li><li><strong>Rótulas y extremos de dirección</strong>: Conectan la caja de dirección con las ruedas y permiten el movimiento angular de las mismas.</li><li><strong>Bomba de dirección asistida</strong>: Proporciona la presión hidráulica necesaria para facilitar el giro del volante.</li><li><strong>Fluido de dirección asistida</strong>: Líquido hidráulico que permite el funcionamiento suave del sistema.</li><li><strong>Cremailllera y piñón (en sistemas de dirección de cremallera)</strong>: Transforma el movimiento rotacional en lineal.</li><li><strong>Barras de dirección</strong>: Transmiten el movimiento desde la caja de dirección a las ruedas.</li></ol><h3>Pasos en la Reparación del Sistema de Dirección</h3><p><strong>Diagnóstico Inicial</strong>:</p><ul><li><strong>Prueba de Manejo</strong>: Para identificar problemas como ruidos inusuales, vibraciones, dureza en el volante, o respuesta imprecisa.</li><li><strong>Inspección Visual</strong>: Para revisar el estado de los componentes visibles como la cremallera, las rótulas y los extremos de dirección.</li></ul><p><strong>Desmontaje</strong>:</p><ul><li>Desmontar los componentes necesarios para tener acceso al sistema de dirección.</li><li>Retirar la rueda, la columna de dirección y la caja de dirección si es necesario.</li></ul><p><strong>Reparación o Reemplazo de Componentes</strong>:</p><ul><li><strong>Rótulas y extremos de dirección</strong>: Verificar el desgaste y reemplazarlos si están dañados.</li><li><strong>Bomba y fluido de dirección asistida</strong>: Revisar y reemplazar si hay fugas o problemas de presión.</li><li><strong>Caja de dirección</strong>: Reparar o reemplazar si hay juego excesivo o desgaste.</li><li><strong>Barras de dirección</strong>: Verificar el estado y reemplazarlas si es necesario.</li></ul><p><strong>Alineación y Ajuste</strong>:</p><ul><li>Ajustar la alineación de las ruedas para asegurar que estén correctamente orientadas.</li><li>Alinear la dirección para garantizar un manejo adecuado y seguro.</li></ul><p><strong>Pruebas Finales</strong>:</p><ul><li><strong>Prueba de Manejo</strong>: Para asegurarse de que el problema ha sido resuelto y el vehículo maneja correctamente.</li><li><strong>Inspección de Fugas</strong>: Revisar si hay fugas de fluido en el sistema.</li></ul><p><strong>Mantenimiento Regular</strong>:</p><ul><li>Revisar y cambiar el fluido de dirección asistida según las recomendaciones del fabricante.</li><li>Inspeccionar regularmente las rótulas, los extremos de dirección y otros componentes críticos para detectar desgaste temprano.</li></ul><p>La reparación del sistema de dirección puede ser compleja y requiere conocimientos técnicos avanzados y herramientas especializadas. Por eso, es recomendable que estas reparaciones sean realizadas por un mecánico profesional para asegurar la seguridad y la eficacia del sistema de dirección del vehículo.</p><p><strong>Costo reparación de autos $50000.</strong></p><p><strong>Costo reparación de autos mas cambio de amortiguadores $100000.</strong></p><p><strong>Costo reparación de camionetas 4x2 $120000.</strong></p><p><strong>Costo reparación de camionetas 4x4 $160000.</strong></p>',
            'status' => 2,
            'user_id' => 1,
            'category_id' => $categoria->id
        ]);

        $postTag3 = DB::table('post_tag')->insert(['post_id'=>$post3->id,'tag_id'=>$etiquetas3->id]);



        
        $post4 = Post::create([

            'name' => 'Cambio de Distribución',
            'slug' => 'cambio-de-distribucion',
            'extract' => '<p>Cambio de Distribución</p><p><strong>Cambio de correa $70000</strong></p><p><strong>Cambio de cadena $200000</strong></p>',
            'body' => '<p>El cambio de distribución de un vehículo, también conocido como cambio de correa de distribución, es un procedimiento de mantenimiento crucial que implica la sustitución de la correa de distribución del motor y, en algunos casos, otros componentes asociados como tensores, poleas y bombas de agua. La correa de distribución es una pieza esencial del motor, ya que sincroniza el movimiento del cigüeñal y el árbol de levas, asegurando que las válvulas se abran y cierren en el momento adecuado durante las fases de admisión y escape del motor.</p><p>Aquí te detallo los aspectos más importantes del cambio de distribución:</p><p><strong>Componentes a cambiar</strong>:</p><ul><li><strong>Correa de distribución</strong>: Es la principal pieza que se sustituye. Con el tiempo, la correa puede desgastarse y romperse, lo cual podría causar daños graves al motor.</li><li><strong>Tensores y poleas</strong>: Son componentes que mantienen la correa de distribución en la tensión adecuada. También pueden desgastarse y deben ser reemplazados para asegurar un funcionamiento correcto.</li><li><strong>Bomba de agua</strong> (si está impulsada por la correa de distribución): Aunque no siempre es necesario, a menudo se recomienda cambiar la bomba de agua al mismo tiempo, ya que si falla, podría provocar el sobrecalentamiento del motor.</li></ul><p><strong>Frecuencia del cambio</strong>:</p><ul><li>La frecuencia con la que debe realizarse el cambio de la correa de distribución varía según el fabricante y el modelo del vehículo. Generalmente, se recomienda entre los 60,000 y 100,000 kilómetros, o cada 5 a 7 años, lo que ocurra primero. Es crucial seguir las recomendaciones específicas del fabricante del vehículo.</li></ul><p><strong>Síntomas de desgaste</strong>:</p><ul><li>Ruidos inusuales procedentes del motor.</li><li>Dificultad para arrancar el motor.</li><li>Funcionamiento irregular del motor.</li><li>Fallos en el motor o pérdida de potencia.</li></ul><p><strong>Consecuencias de no realizar el cambio</strong>:</p><ul><li>Si la correa de distribución se rompe, puede causar graves daños al motor, como la colisión de válvulas y pistones, lo cual puede resultar en reparaciones costosas.</li><li>Puede llevar al fallo completo del motor, dejando el vehículo inoperativo.</li></ul><p><strong>Proceso de cambio</strong>:</p><ul><li>Desmontaje de componentes que obstruyen el acceso a la correa de distribución.</li><li>Remoción de la correa de distribución desgastada.</li><li>Instalación de la nueva correa de distribución, tensores, poleas y, si es necesario, la bomba de agua.</li><li>Ajuste y alineación adecuada de la nueva correa.</li><li>Prueba del motor para asegurar que la instalación se haya realizado correctamente y que el motor funcione sin problemas.</li></ul><p>Es importante que este mantenimiento sea realizado por un profesional, ya que la instalación incorrecta de la correa de distribución puede llevar a problemas serios en el motor.</p><p><strong>Cambio de correa $70000</strong></p><p><strong>Cambio de cadena $200000</strong></p>',
            'status' => 2,
            'user_id' => 1,
            'category_id' => $categoria->id
        ]);

        $postTag4 = DB::table('post_tag')->insert(['post_id'=>$post4->id,'tag_id'=>$etiquetas->id]);
        $postTag41 = DB::table('post_tag')->insert(['post_id'=>$post4->id,'tag_id'=>$etiquetas4->id]);



        
        $post5 = Post::create([

            'name' => 'Reparación DPF',
            'slug' => 'reparacion-dpf',
            'extract' => '',
            'body' => '',
            'status' => 2,
            'user_id' => 1,
            'category_id' => $categoria2->id
        ]);

        $postTag5 = DB::table('post_tag')->insert(['post_id'=>$post5->id,'tag_id'=>$etiquetas5->id]); */
/* 
     $insumo = Insumo::create([

            'name' => 'Aceite Total Quartz',
            'descripcion' => 'Aceite total quartz 10w40 semi sintetico 4 litros para motor diesel o bencina',
            'stock' => 16,
            'precio' => 25000,
            'precioCompra' => 17054,
            'status' => 1,
            'tipoProducto' =>1,

        ]);

   
        $insumo2 = Insumo::create([

            'name' => 'Aceite Wolver 15w40',
            'descripcion' => 'Aceite Wolver Turbo Evolution Diesel 15w40 4 litros',
            'stock' => 8,
            'precio' => 40000,
            'precioCompra' => 24354,
            'status' => 1,
            'tipoProducto' =>1,

        ]);


        $insumo3 = Insumo::create([

            'name' => 'Aceite Wolver 5w30',
            'descripcion' => 'Aceite Wolver 5w30 4 litros 100% sintetico ultratec para 20000 kilometos',
            'stock' => 6,
            'precio' => 40000,
            'precioCompra' => 26590,
            'status' => 1,
            'tipoProducto' =>1,

        ]); 
 */
    }
}
