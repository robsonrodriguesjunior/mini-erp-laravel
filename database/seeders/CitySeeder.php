<?php
namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $states = [
            'AC' => [
                ['name' => 'Rio Branco', 'ibge_code' => '1200401'],
                ['name' => 'Cruzeiro do Sul', 'ibge_code' => '1200203'],
                ['name' => 'Sena Madureira', 'ibge_code' => '1200500'],
            ],
            'AL' => [
                ['name' => 'Maceió', 'ibge_code' => '2704302'],
                ['name' => 'Arapiraca', 'ibge_code' => '2700300'],
                ['name' => 'Palmeira dos Índios', 'ibge_code' => '2706307'],
            ],
            'AP' => [
                ['name' => 'Macapá', 'ibge_code' => '1600303'],
                ['name' => 'Santana', 'ibge_code' => '1600600'],
                ['name' => 'Laranjal do Jari', 'ibge_code' => '1600279'],
            ],
            'AM' => [
                ['name' => 'Manaus', 'ibge_code' => '1302603'],
                ['name' => 'Parintins', 'ibge_code' => '1303403'],
                ['name' => 'Itacoatiara', 'ibge_code' => '1301902'],
            ],
            'BA' => [
                ['name' => 'Salvador', 'ibge_code' => '2927408'],
                ['name' => 'Feira de Santana', 'ibge_code' => '2910801'],
                ['name' => 'Vitória da Conquista', 'ibge_code' => '2933307'],
            ],
            'CE' => [
                ['name' => 'Fortaleza', 'ibge_code' => '2304400'],
                ['name' => 'Caucaia', 'ibge_code' => '2303709'],
                ['name' => 'Juazeiro do Norte', 'ibge_code' => '2307304'],
            ],
            'DF' => [
                ['name' => 'Brasília', 'ibge_code' => '5300108'],
                ['name' => 'Ceilândia', 'ibge_code' => '5300108'],
                ['name' => 'Taguatinga', 'ibge_code' => '5300108'],
            ],
            'ES' => [
                ['name' => 'Vitória', 'ibge_code' => '3205309'],
                ['name' => 'Vila Velha', 'ibge_code' => '3205200'],
                ['name' => 'Serra', 'ibge_code' => '3205002'],
            ],
            'GO' => [
                ['name' => 'Goiânia', 'ibge_code' => '5208707'],
                ['name' => 'Aparecida de Goiânia', 'ibge_code' => '5201405'],
                ['name' => 'Anápolis', 'ibge_code' => '5201108'],
            ],
            'MA' => [
                ['name' => 'São Luís', 'ibge_code' => '2111300'],
                ['name' => 'Imperatriz', 'ibge_code' => '2105302'],
                ['name' => 'Timon', 'ibge_code' => '2112209'],
            ],
            'MT' => [
                ['name' => 'Cuiabá', 'ibge_code' => '5103403'],
                ['name' => 'Várzea Grande', 'ibge_code' => '5108402'],
                ['name' => 'Rondonópolis', 'ibge_code' => '5107602'],
            ],
            'MS' => [
                ['name' => 'Campo Grande', 'ibge_code' => '5002704'],
                ['name' => 'Dourados', 'ibge_code' => '5003702'],
                ['name' => 'Três Lagoas', 'ibge_code' => '5008305'],
            ],
            'MG' => [
                ['name' => 'Belo Horizonte', 'ibge_code' => '3106200'],
                ['name' => 'Uberlândia', 'ibge_code' => '3170206'],
                ['name' => 'Contagem', 'ibge_code' => '3118601'],
            ],
            'PA' => [
                ['name' => 'Belém', 'ibge_code' => '1501402'],
                ['name' => 'Ananindeua', 'ibge_code' => '1500800'],
                ['name' => 'Santarém', 'ibge_code' => '1506807'],
            ],
            'PB' => [
                ['name' => 'João Pessoa', 'ibge_code' => '2507507'],
                ['name' => 'Campina Grande', 'ibge_code' => '2504009'],
                ['name' => 'Santa Rita', 'ibge_code' => '2513703'],
            ],
            'PR' => [
                ['name' => 'Curitiba', 'ibge_code' => '4106902'],
                ['name' => 'Londrina', 'ibge_code' => '4113700'],
                ['name' => 'Maringá', 'ibge_code' => '4115200'],
            ],
            'PE' => [
                ['name' => 'Recife', 'ibge_code' => '2611606'],
                ['name' => 'Jaboatão dos Guararapes', 'ibge_code' => '2607901'],
                ['name' => 'Olinda', 'ibge_code' => '2609600'],
            ],
            'PI' => [
                ['name' => 'Teresina', 'ibge_code' => '2211001'],
                ['name' => 'Parnaíba', 'ibge_code' => '2207702'],
                ['name' => 'Picos', 'ibge_code' => '2208007'],
            ],
            'RJ' => [
                ['name' => 'Rio de Janeiro', 'ibge_code' => '3304557'],
                ['name' => 'Niterói', 'ibge_code' => '3303302'],
                ['name' => 'São Gonçalo', 'ibge_code' => '3304904'],
            ],
            'RN' => [
                ['name' => 'Natal', 'ibge_code' => '2408102'],
                ['name' => 'Mossoró', 'ibge_code' => '2408003'],
                ['name' => 'Parnamirim', 'ibge_code' => '2403251'],
            ],
            'RS' => [
                ['name' => 'Porto Alegre', 'ibge_code' => '4314902'],
                ['name' => 'Caxias do Sul', 'ibge_code' => '4305108'],
                ['name' => 'Pelotas', 'ibge_code' => '4314407'],
            ],
            'RO' => [
                ['name' => 'Porto Velho', 'ibge_code' => '1100205'],
                ['name' => 'Ji-Paraná', 'ibge_code' => '1100122'],
                ['name' => 'Ariquemes', 'ibge_code' => '1100023'],
            ],
            'RR' => [
                ['name' => 'Boa Vista', 'ibge_code' => '1400100'],
                ['name' => 'Caracaraí', 'ibge_code' => '1400209'],
                ['name' => 'Rorainópolis', 'ibge_code' => '1400472'],
            ],
            'SC' => [
                ['name' => 'Florianópolis', 'ibge_code' => '4205407'],
                ['name' => 'Joinville', 'ibge_code' => '4209102'],
                ['name' => 'Blumenau', 'ibge_code' => '4202404'],
            ],
            'SP' => [
                ['name' => 'São Paulo', 'ibge_code' => '3550308'],
                ['name' => 'Campinas', 'ibge_code' => '3509502'],
                ['name' => 'Santos', 'ibge_code' => '3548500'],
            ],
            'SE' => [
                ['name' => 'Aracaju', 'ibge_code' => '2800308'],
                ['name' => 'Nossa Senhora do Socorro', 'ibge_code' => '2804805'],
                ['name' => 'Lagarto', 'ibge_code' => '2803500'],
            ],
            'TO' => [
                ['name' => 'Palmas', 'ibge_code' => '1721000'],
                ['name' => 'Araguaína', 'ibge_code' => '1702109'],
                ['name' => 'Gurupi', 'ibge_code' => '1709500'],
            ],
        ];

        foreach ($states as $stateCode => $cities) {
            $state = State::where('code', $stateCode)->firstOrFail();

            foreach ($cities as $city) {
                City::create([
                    'state_id'  => $state->id,
                    'name'      => $city['name'],
                    'ibge_code' => $city['ibge_code'],
                ]);
            }
        }
    }
}
