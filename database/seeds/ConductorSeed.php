<?php


use Phinx\Seed\AbstractSeed;

class ConductorSeed extends AbstractSeed
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
                
                'nombre'     => $faker->name($gender = null|'male'|'female'),
                'licencia'      => $faker->regexify('[1-9]{1}-[1-9]{3}-[1-9]{3}'),
                'fecha_nacimiento'   => $faker->dateTimeThisCentury->format('Y-m-d'),
                'sexo'              => $faker->randomElement($array = array ('M','F')),  
            ];
        }

        $this->insert('conductores', $data);

    }
}
