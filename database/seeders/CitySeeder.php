<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Abomey', 'Abomey-Calavi', 'Adja-Ouèrè', 'Adjarra', 'Adjohoun', 'Agbangnizoun', 'Aguégués',
            'Allada', 'Aplahoué', 'Athiémé', 'Avrankou', 'Banikoara', 'Bantè', 'Bassila', 'Bembèrèkè',
            'Bohicon', 'Bonou', 'Bopa', 'Boukombé', 'Cobly', 'Comè', 'Copargo', 'Cotonou', 'Covè', 'Dangbo',
            'Dassa-Zoumè', 'Djakotomey', 'Djidja', 'Djougou', 'Dogbo', 'Glazoué', 'Gogounou', 'Grand-Popo',
            'Houéyogbé', 'Ifangni', 'Kalalé', 'Kandi', 'Karimama', 'Kérou', 'Kétou', ' Klouékanmè', 'Kouandé',
            'Kpomassè', 'Lalo', 'Lokossa', 'Malanville', 'Matéri', 'Missérété', 'N’dali', 'Natitingou',
            'Nikki', 'Ouaké', 'Ouèssè', 'Ouidah', 'Ouinhi', 'Parakou', 'Pehunco', 'Pèrèrè', 'Pobè',
            'Porto-Novo', 'Sakété', 'Savalou', 'Savè', 'Ségbana', 'Sèmè-Podji', 'Sinendé', 'Sô-Ava',
            'Tanguiéta', 'Tchaourou', 'Toffo', 'Tori-Bossito', 'Toucountouna', 'Toviklin', 'Zagnanado',
            'Za-Kpota', 'Zè', 'Zogbodomey'
        ];
        foreach ($cities as $city) {
            City::create(['name' => $city, 'country_id' => Country::first()->id]);
        }
    }
}
