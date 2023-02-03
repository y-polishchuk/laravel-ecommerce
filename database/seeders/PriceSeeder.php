<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::truncate();

        $faker = \Faker\Factory::create();

        $data = [];
        $titles = ['Free', 'Business', 'Developer', 'Ultimate'];
        $price_ids = ['none', 'price_1LkkccAN7OPdNadIgtAYKdG7', 'price_1LkkccAN7OPdNadIJMgF1Kgu', 'price_1LkkccAN7OPdNadIP9wlGLb5', 'database-2', 'gradienter', 'file-list-3', 'price-tag-2', 'anchor', 'disc', 'base-station', 'fingerprint'];
        $prices = [0, 19, 29, 49];
        $features = [
            '<ul style="list-style-type: none;">
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li><s>Pharetra massa</s></li>
            <li><s>Massa ultricies mi</s></li>
            </ul>',
            '<ul style="list-style-type: none;">
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li>Pharetra massa</li>
            <li><s>Massa ultricies mi</s></li>
            </ul>',
            '<ul style="list-style-type: none;">
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li>Pharetra massa</li>
            <li>Massa ultricies mi</li>
            </ul>',
            '<ul style="list-style-type: none;">
            <li>Aida dere</li>
            <li>Nec feugiat nisl</li>
            <li>Nulla at volutpat dola</li>
            <li>Pharetra massa</li>
            <li>Massa ultricies mi</li>
            </ul>'
        ];


        for($i = 0; $i < 4; $i++) {
            $item = [
                'title' => $titles[$i],
                'price_id' => $price_ids[$i],
                'price' => $prices[$i],
                'features' => $features[$i],
                'advanced' => 0,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
            if($i == 3) {
                $item['advanced'] = 1;
            }
            $data[] = $item;
        }

        Price::insert($data);
    }
}
