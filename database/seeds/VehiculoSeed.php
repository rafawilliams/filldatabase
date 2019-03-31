<?php


use Phinx\Seed\AbstractSeed;

class VehiculoSeed extends AbstractSeed
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
        for ($i = 0; $i < 200; $i++) {
            $data[] = [
                'placa'      => $faker->vehicleRegistration('[A-Z]{2}[0-9]{4}'),
                'anio'     => $faker->biasedNumberBetween(1998,2017, 'sqrt'),
                'color'    => $faker->colorName,
                'precio_alquiler' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 30.30, $max = 100.20),
                'precio_venta' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 10000.00, $max = 2000.99),
                'estado'  => 'disponible',
                'marca_modelo_id' => $faker->numberBetween($min = 1, $max = 31),
                'tipo' => $faker->vehicleType,
                'tipo_gasolina' => $faker->vehicleFuelType,
                'transmision' => $faker->randomElement($array = array ('manual','automatico')),
                'cantidad_puerta' => $faker->vehicleDoorCount,
                'cantidad_asiento' => $faker->vehicleSeatCount,
                'especificaciones' => collect((object)$faker->vehicleProperties)->values()
            ];
        }

        $this->insert('vehiculos', $data);

    }
}
