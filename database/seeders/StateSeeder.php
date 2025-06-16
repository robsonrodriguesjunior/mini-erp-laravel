<?php
namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $brazil = Country::where('code', 'BR')->first();

        $states = [
            ['name' => 'Acre', 'code' => 'AC', 'ibge_code' => '12'],
            ['name' => 'Alagoas', 'code' => 'AL', 'ibge_code' => '27'],
            ['name' => 'Amapá', 'code' => 'AP', 'ibge_code' => '16'],
            ['name' => 'Amazonas', 'code' => 'AM', 'ibge_code' => '13'],
            ['name' => 'Bahia', 'code' => 'BA', 'ibge_code' => '29'],
            ['name' => 'Ceará', 'code' => 'CE', 'ibge_code' => '23'],
            ['name' => 'Distrito Federal', 'code' => 'DF', 'ibge_code' => '53'],
            ['name' => 'Espírito Santo', 'code' => 'ES', 'ibge_code' => '32'],
            ['name' => 'Goiás', 'code' => 'GO', 'ibge_code' => '52'],
            ['name' => 'Maranhão', 'code' => 'MA', 'ibge_code' => '21'],
            ['name' => 'Mato Grosso', 'code' => 'MT', 'ibge_code' => '51'],
            ['name' => 'Mato Grosso do Sul', 'code' => 'MS', 'ibge_code' => '50'],
            ['name' => 'Minas Gerais', 'code' => 'MG', 'ibge_code' => '31'],
            ['name' => 'Pará', 'code' => 'PA', 'ibge_code' => '15'],
            ['name' => 'Paraíba', 'code' => 'PB', 'ibge_code' => '25'],
            ['name' => 'Paraná', 'code' => 'PR', 'ibge_code' => '41'],
            ['name' => 'Pernambuco', 'code' => 'PE', 'ibge_code' => '26'],
            ['name' => 'Piauí', 'code' => 'PI', 'ibge_code' => '22'],
            ['name' => 'Rio de Janeiro', 'code' => 'RJ', 'ibge_code' => '33'],
            ['name' => 'Rio Grande do Norte', 'code' => 'RN', 'ibge_code' => '24'],
            ['name' => 'Rio Grande do Sul', 'code' => 'RS', 'ibge_code' => '43'],
            ['name' => 'Rondônia', 'code' => 'RO', 'ibge_code' => '11'],
            ['name' => 'Roraima', 'code' => 'RR', 'ibge_code' => '14'],
            ['name' => 'Santa Catarina', 'code' => 'SC', 'ibge_code' => '42'],
            ['name' => 'São Paulo', 'code' => 'SP', 'ibge_code' => '35'],
            ['name' => 'Sergipe', 'code' => 'SE', 'ibge_code' => '28'],
            ['name' => 'Tocantins', 'code' => 'TO', 'ibge_code' => '17'],
        ];

        foreach ($states as $state) {
            State::create([
                'country_id' => $brazil->id,
                'name'       => $state['name'],
                'code'       => $state['code'],
                'ibge_code'  => $state['ibge_code'],
            ]);
        }
    }
}
