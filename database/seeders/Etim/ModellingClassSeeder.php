<?php

namespace Database\Seeders\Etim;

use App\Models\Etim\ModellingClass;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class ModellingClassSeeder extends Seeder
{

        /**
     * The Faker instance.
     *
     * @var Faker
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModellingClass::factory()->count(800)->create();
        ModellingClass::create([
            'modelling_class_id' => 'CT000047',
            'version' => 1,
            'status' => '5',
            'mutation_date' => '2024-01-09',
            'revision' => 22,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Control motor/actuator',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000046',
            'version' => 1,
            'status' => '2',
            'mutation_date' => '2024-01-09',
            'revision' => 35,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Slotted hole',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000045',
            'version' => 1,
            'status' => '2',
            'mutation_date' => '2024-01-09',
            'revision' => 272,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Key hole',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000043',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-09',
            'revision' => 64,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Tongue',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000042',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-09',
            'revision' => 845,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Groove',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000041',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-09',
            'revision' => 103,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Top rebate',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000040',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-09',
            'revision' => 689,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Bottom rebate',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            
            ModellingClass::create([
            'modelling_class_id' => 'CT000039',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-10',
            'revision' => 760,
            'revision_date' => '2024-01-11',
            'modelling' => false,
            'description' => 'Straight edge',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            
            ModellingClass::create([
            'modelling_class_id' => 'CT000038',
            'version' => 4,
            'status' => '2',
            'mutation_date' => '2024-01-11',
            'revision' => 270,
            'revision_date' => '2024-01-12',
            'modelling' => false,
            'description' => 'Punch hole round',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            
            ModellingClass::create([
            'modelling_class_id' => 'CT000037',
            'version' => 4,
            'status' => '2',
            'mutation_date' => '2024-01-12',
            'revision' => 381,
            'revision_date' => '2024-01-13',
            'modelling' => false,
            'description' => 'Punch hole rectangular',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000036',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-09',
            'revision' => 462,
            'revision_date' => '2024-01-10',
            'modelling' => false,
            'description' => 'Pipe flange oval',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000035',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-10',
            'revision' => 452,
            'revision_date' => '2024-01-11',
            'modelling' => false,
            'description' => 'Storz',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000034',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-01-11',
            'revision' => 365,
            'revision_date' => '2024-01-12',
            'modelling' => false,
            'description' => 'Duct insert end rectangular',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000033',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-01-12',
            'revision' => 372,
            'revision_date' => '2024-01-13',
            'modelling' => false,
            'description' => 'Duct insert end round',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000032',
            'version' => 4,
            'status' => '2',
            'mutation_date' => '2024-01-13',
            'revision' => 745,
            'revision_date' => '2024-01-14',
            'modelling' => false,
            'description' => 'Duct insert end oval',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000031',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-14',
            'revision' => 378,
            'revision_date' => '2024-01-15',
            'modelling' => false,
            'description' => 'Pipe insert end',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000030',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-15',
            'revision' => 400,
            'revision_date' => '2024-01-16',
            'modelling' => false,
            'description' => 'Duct beaded edge rectangular',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000029',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-16',
            'revision' => 131,
            'revision_date' => '2024-01-17',
            'modelling' => false,
            'description' => 'Duct beaded edge round',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000028',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-17',
            'revision' => 338,
            'revision_date' => '2024-01-18',
            'modelling' => false,
            'description' => 'Duct beaded edge oval',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000027',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-18',
            'revision' => 391,
            'revision_date' => '2024-01-19',
            'modelling' => false,
            'description' => 'Pipe beaded edge',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000026',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-19',
            'revision' => 706,
            'revision_date' => '2024-01-20',
            'modelling' => false,
            'description' => 'Duct flange rectangular',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000025',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-20',
            'revision' => 580,
            'revision_date' => '2024-01-21',
            'modelling' => false,
            'description' => 'Duct flange round',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000024',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-31',
            'revision' => 906,
            'revision_date' => '2024-02-01',
            'modelling' => false,
            'description' => 'Duct flange oval',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000023',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-01-31',
            'revision' => 182,
            'revision_date' => '2024-02-01',
            'modelling' => false,
            'description' => 'Duct sleeve rectangular',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000022',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-01-31',
            'revision' => 610,
            'revision_date' => '2024-02-01',
            'modelling' => false,
            'description' => 'Duct sleeve round',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000021',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-01-31',
            'revision' => 260,
            'revision_date' => '2024-02-01',
            'modelling' => false,
            'description' => 'Duct sleeve oval',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000020',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-01-31',
            'revision' => 57,
            'revision_date' => '2024-02-01',
            'modelling' => false,
            'description' => 'Concentric duct sleeve (flue gas, air supply)',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000019',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-01-31',
            'revision' => 281,
            'revision_date' => '2024-02-01',
            'modelling' => false,
            'description' => 'Pipe sleeve with 3 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000018',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-06',
            'revision' => 69,
            'revision_date' => '2024-02-07',
            'modelling' => false,
            'description' => 'Pipe sleeve with 2 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000017',
            'version' => 4,
            'status' => '5',
            'mutation_date' => '2024-02-07',
            'revision' => 770,
            'revision_date' => '2024-02-08',
            'modelling' => false,
            'description' => 'Pipe sleeve',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000016',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-08',
            'revision' => 802,
            'revision_date' => '2024-02-09',
            'modelling' => false,
            'description' => 'Pipe press sleeve',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000015',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-09',
            'revision' => 25,
            'revision_date' => '2024-02-10',
            'modelling' => false,
            'description' => 'Duct end rectangular',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000014',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-02-10',
            'revision' => 441,
            'revision_date' => '2024-02-11',
            'modelling' => false,
            'description' => 'Duct end round with 4 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000013',
            'version' => 2,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 350,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Duct end round with 3 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000012',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 498,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Duct end round with 2 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000011',
            'version' => 4,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 701,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Duct end round',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000010',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 353,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Duct end oval',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000009',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-02-11',
            'revision' => 111,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Concentric duct end (flue gas, air supply)',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000008',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 134,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Gland nut',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000007',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-02-11',
            'revision' => 317,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Pipe flange round',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000006',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-02-11',
            'revision' => 10,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Pipe end with 4 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000005',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-02-11',
            'revision' => 771,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Pipe end with 3 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000004',
            'version' => 3,
            'status' => '2',
            'mutation_date' => '2024-02-11',
            'revision' => 77,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Pipe end with 2 diameters',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000003',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 137,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Combined connection type (Pipe end + pipe sleeve)',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000002',
            'version' => 3,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 675,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Combined connection type (Pipe end + 2x pipe sleeve)',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            ModellingClass::create([
            'modelling_class_id' => 'CT000001',
            'version' => 4,
            'status' => '5',
            'mutation_date' => '2024-02-11',
            'revision' => 217,
            'revision_date' => '2024-02-12',
            'modelling' => false,
            'description' => 'Pipe end',
            'group_id' => 'MG000001',
            'drawing_uri' => 'https://via.placeholder.com/1754x1240.png/CCCCCC?text=SVG+Reference+Drawing+Connection+Type+Class',
            'changecode' => fake()->randomElement(["Unchanged","Changed","New","Deleted"])
            ]);
            

        
    }
}
