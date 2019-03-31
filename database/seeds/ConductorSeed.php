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

        $clientes = $this->fetchAll('SELECT * FROM clientes');
        
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            
            $cliente_id = $faker->numberBetween($min = 1, $max = 398);

            $data[] = [
                
                'nombre'     => $faker->name($gender = null|'male'|'female'),
                'licencia'      => $faker->regexify('[1-9]{1}-[1-9]{3}-[1-9]{3}'),
                'fecha_nacimiento'   => $faker->dateTimeThisCentury->format('Y-m-d'),
                'sexo'              => $faker->randomElement($array = array ('M','F')), 
                'cliente_cedula'    => $clientes[$cliente_id]['cedula'] 
            ];
        }

        $this->insert('conductores', $data);

    }
}
