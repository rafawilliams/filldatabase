<?php


use Phinx\Seed\AbstractSeed;

class EmpleadoSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Faker\Factory::create('es_VE');
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                
                'nombre'     => $faker->firstName($gender = null|'male'|'female'),
                'apellido'     => $faker->lastName,
                'no_empleado'   => $faker->unique()->numberBetween($min = 1000, $max = 9000)
            ];
        }

        $this->insert('empleados', $data);

    }
}
