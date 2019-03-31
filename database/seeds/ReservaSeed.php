<?php


use Phinx\Seed\AbstractSeed;
use Carbon\Carbon;

class ReservaSeed extends AbstractSeed
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

        $vehiculos = $this->fetchAll('SELECT placa_vehiculo, identificacion_cliente FROM clientes_vehiculos');

        $data = [];
        for ($i = 1; $i < 10; $i++) 
        {

            $cliente = $faker->numberBetween($min = 1, $max = 200);

            $fecha = Carbon::now()->subMonths(2);
            $fecha_reserva = $fecha->copy()->addDays($faker->numberBetween($min = 1, $max = 14));


            $data[] = [
                'placa'      => $vehiculos[$cliente]['placa_vehiculo'],
                'fecha_reserva'     => $fecha_reserva,
                'cliente_cedula'    => $vehiculos[$cliente]['identificacion_cliente'],
                'empleado_id'       => $faker->numberBetween(1,20)
            ];
        }

        $this->insert('reservas', $data);
    }
}
