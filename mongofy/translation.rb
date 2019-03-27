table "clientes" do
	column "cedula", :string
	column "primer_nombre", :string
	column "segundo_nombre", :string
	column "primer_apellido", :string
	column "segundo_apellido", :string
	column "tipo", :string
	column "identificacion_tipo", :string
end

table "clientes_vehiculos" do
	column "identificacion_cliente", :string
	column "placa_vehiculo", :string
	column "fecha_entrega", :datetime
	column "fecha_salida", :datetime
	column "id", :key, :as => :integer
	column "seguro_vehiculo_id", :integer, :references => "seguro_vehiculos"
end

table "conductores" do
	column "id", :key, :as => :integer
	column "nombre", :string
	column "licencia", :string
	column "fecha_nacimiento", :datetime
	column "sexo", :string
end

table "empleados" do
	column "nombre", :string
	column "apellido", :string
	column "id", :key, :as => :integer
	column "no_empleado", :string
end

table "facturas_ventas_vehiculos" do
	column "id", :key, :as => :integer
	column "codigo", :string
	column "placa_vehiculo", :string
	column "indentificacion_cliente", :string
	column "total", :decimal
end

table "incidencias" do
	column "id", :key, :as => :integer
	column "observaciones", :text
	column "cliente_vehiulo_id", :integer, :references => "cliente_vehiulos"
end

table "marca_autos" do
	column "id", :key, :as => :integer
end

table "marcas_modelos" do
	column "id", :key, :as => :integer
	column "marca", :string
	column "modelo", :string
end


table "reservas" do
	column "id", :key, :as => :integer
	column "vehiculo_id", :integer, :references => "vehiculos"
	column "fecha_reserva", :datetime
	column "cliente_id", :integer, :references => "clientes"
end

table "seguro_vehiculo" do
	column "id", :key, :as => :integer
	column "tipo", :string
end

table "vehiculos" do
	column "placa", :string
	column "anio", :integer
	column "color", :string
	column "precio_alquiler", :float
	column "imagen", :binary
	column "estado", :string
	column "marca_modelo_id", :integer, :references => "marca_modelos"
	column "tipo", :string
	column "tipo_gasolina", :string
	column "transmision", :string
	column "cantidad_puerta", :integer
	column "cantidad_asiento", :integer
	column "especificaciones", :string
end

