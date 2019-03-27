<?php


use Phinx\Seed\AbstractSeed;

class ClienteSeed extends AbstractSeed
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
                'cedula'      => $faker->regexify('[1-9]{1}-[1-9]{3}-[1-9]{3}'),
                'primer_nombre'     => $faker->firstName($gender = null|'male'|'female'),
                'primer_apellido'   => $faker->lastName,
                'tipo'              => 'cliente',
                'identificacion_tipo' => 'natural'
            ];
        }

        $this->insert('clientes', $data);

    }
}
