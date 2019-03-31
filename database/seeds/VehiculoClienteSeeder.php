<?php


use Phinx\Seed\AbstractSeed;
use Carbon\Carbon;

class VehiculoClienteSeeder extends AbstractSeed
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

        $clientes =  $this->fetchAll('SELECT * FROM clientes');
        $vehiculos = $this->fetchAll('SELECT placa FROM vehiculos');
        $fecha = Carbon::now()->startOfMonth();

        $data = [];

        for($i=0; $i<200; $i++){
            $cliente_id = $faker->numberBetween($min = 1, $max = 398);
            $vehiculo_id = $faker->numberBetween($min = 1, $max = 200);
            //$fecha_reserva = $faker->dateTime();
            $fecha = Carbon::now()->subMonths(2);
            $fecha_reserva = $fecha->copy()->addDays($faker->numberBetween($min = 1, $max = 14));
            $fecha_regreso = $fecha->copy()->addDays($faker->numberBetween($min = 15, $max = 30));

            $data[] = [
            'identificacion_cliente' => $clientes[$cliente_id]['cedula'],
            'placa_vehiculo' => $vehiculos[$vehiculo_id]['placa'],
            'fecha_reserva' => $fecha_reserva->toDateTimeString(),
            'fecha_regreso' => $fecha_regreso->toDateTimeString(),
            'seguro_vehiculo_id' => $faker->numberBetween($min = 1, $max = 3)
            ];
        }

        $this->insert('clientes_vehiculos', $data);
        
    }
}
