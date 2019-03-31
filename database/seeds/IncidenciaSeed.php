<?php


use Phinx\Seed\AbstractSeed;

class IncidenciaSeed extends AbstractSeed
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
        for ($i = 1; $i < 20; $i++) {
            $data[] = [
                'observaciones'      => $faker->realText($faker->numberBetween(10,20)),
                'cliente_vehiculo_id'     => $faker->numberBetween(1808, 1900)
            ];
        }

        $this->insert('incidencias', $data);
    }
}
