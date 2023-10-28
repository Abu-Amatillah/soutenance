<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            /*start panneaux*/
            [
                'name'=> 'Panneaux de 10w',
                'image' => 'storage/products/panneau10w.jfif',
                'description'=> "Panneau solaire de 10w, pour l'éclairage. ",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 1000,
                'price'=> 20000,
                'weight'=> 12.35,
                'category_id'=> Category::where('name', '=', 'Panneaux')->first()->id,
            ],

            [
                'name'=> 'Panneaux de 50w',
                'image' => 'storage/products/panneau50w.jfif',
                'description'=> "Panneau solaire de 50w, pour l'éclairage. ",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 1500,
                'price'=> 4512,
                'weight'=> 0.52,
                'category_id'=> Category::where('name', '=', 'Panneaux')->first()->id,
            ],[
                'name'=> 'Panneaux de 80w',
                'image' => 'storage/products/panneau80w.jfif',
                'description'=> "Panneau solaire de 80w, pour l'éclairage. ",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 30000,
                'price'=> 15266,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Panneaux')->first()->id,
            ],[
                'name'=> 'Panneaux de 100w',
                'image' => 'storage/products/panneau100w.jfif',
                'description'=> "Panneau solaire de 100w, pour l'éclairage. ",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 416518,
                'price'=> 6499,
                'weight'=> 0.80,
                'category_id'=> Category::where('name', '=', 'Panneaux')->first()->id,
            ],

            /*end panneau*/

            /*start Ampoule*/
            [
                'name'=> 'Ampoule Led 3w',
                'image' => 'storage/products/led-3.jpg',
                'description'=> "Ampoule doter de forte éclairage ",
                'information'=> 'La marque LED est une marque connu pour sa forte...',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Ampoule')->first()->id,
            ],

            [
                'name'=> 'Ampoule Led 5w',
                'image' => 'storage/products/led-5.jpg',
                'description'=> "Ampoule doter de forte éclairage ",
                'information'=> 'La marque LED est une marque connu pour sa forte...',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Ampoule')->first()->id,
            ],

            [
                'name'=> 'Spot led à multiple couleur',
                'image' => 'storage/products/spot-led-couleur.jfif',
                'description'=> "Ampoule doter de forte éclairage ",
                'information'=> 'La marque LED est une marque connu pour sa forte...',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Ampoule')->first()->id,
            ],

            [
                'name'=> 'Spot led simple',
                'image' => 'storage/products/spot-led.jfif',
                'description'=> "Les Spots est.... ",
                'information'=> "Les spots sont des ampoule concus pour l'éclairage des staff...",
                'quantity'=> 78552,
                'price'=> 2556,
                'weight'=> 0.1455,
                'category_id'=> Category::where('name', '=', 'Ampoule')->first()->id,
            ],

            /*End ampoule*/

            /*Start batterie*/
            [
                'name'=> 'Batterie de 7am',
                'image' => 'storage/products/batterie7am.jfif',
                'description'=> "Batterie de 7am ",
                'information'=> 'Batteries accompagnant un panneaux....',
                'quantity'=> 123,
                'price'=> 526,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Batterie')->first()->id,
            ],

            [
                'name'=> 'Batterie de 18am',
                'image' => 'storage/products/batterie18am.jfif',
                'description'=> "Batterie de 18am ",
                'information'=> 'Batteries accompagnant un panneaux....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Batterie')->first()->id,
            ],
            [
                'name'=> 'Batterie de 100am',
                'image' => 'storage/products/batterie100.jfif',
                'description'=> "Batterie de 100am ",
                'information'=> 'Batteries accompagnant un panneaux....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Batterie')->first()->id,
            ],
            /*end batterie*/

            /*start projecteur*/

            [
                'name'=> 'Projecteur de 60w',
                'image' => 'storage/products/projecteur60.jfif',
                'description'=> "Projecteur",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Projecteur')->first()->id,
            ],
            [
                'name'=> 'Projecteur de 100w',
                'image' => 'storage/products/projecteur100w.jfif',
                'description'=> "P ",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Projecteur')->first()->id,
            ],
            [
                'name'=> 'Projecteur de 200w',
                'image' => 'storage/products/projecteur200w.jfif',
                'description'=> "P ",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Projecteur')->first()->id,
            ],
            [
                'name'=> 'Projecteur de 300w',
                'image' => 'storage/products/projecteur300w.jfif',
                'description'=> "P ",
                'information'=> 'Ce type de panneau vous offre la possibilité....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Projecteur')->first()->id,
            ],
            /*end projecteur*/

            /* Disjoncteur*/
            [
                'name'=> 'Disjoncteur unipolaire',
                'image' => 'storage/products/dij-unipolaire.jfif',
                'description'=> "Disjoncteur à ",
                'information'=> 'Disjoncteur est....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Disjoncteur')->first()->id,
            ],

            [
                'name'=> 'Disjoncteur Différenciel',
                'image' => 'storage/products/dij-differenciel.jfif',
                'description'=> "Disjoncteur à ",
                'information'=> 'Disjoncteur est....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Disjoncteur')->first()->id,
            ],
            [
                'name'=> 'Disjoncteur DPN',
                'image' => 'storage/products/dij-dpn.jfif',
                'description'=> "Disjoncteur à .... ",
                'information'=> 'Disjoncteur est....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Disjoncteur')->first()->id,
            ],
            [
                'name'=> 'Parafoudre Deux fille',
                'image' => 'storage/products/parafoudre-2-fille.jfif',
                'description'=> "Parafoudre. ",
                'information'=> 'Parafoudre....',
                'quantity'=> 78548,
                'price'=> 7421514,
                'weight'=> 0.5,
                'category_id'=> Category::where('name', '=', 'Disjoncteur')->first()->id,
            ],
        ];
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
