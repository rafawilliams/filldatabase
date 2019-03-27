<?php


use Phinx\Seed\AbstractSeed;

class MarcaSeed extends AbstractSeed
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
        $faker = Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        $data = [];
        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'marca'      => $faker->vehicleBrand,
                'modelo'     => $faker->vehicleModel
            ];
        }

        $this->insert('marcas_modelos', $data);

    }
}
