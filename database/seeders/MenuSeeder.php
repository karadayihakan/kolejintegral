<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ana site için varsayılan menü öğeleri
        $defaultMenus = [
            [
                'label' => 'Hakkımızda',
                'url' => '/hakkimizda',
                'target' => '_self',
                'order' => 1,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'label' => 'Keşfet',
                'url' => '#explore',
                'target' => '_self',
                'order' => 2,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'label' => 'Birimler',
                'url' => '#classes',
                'target' => '_self',
                'order' => 3,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'label' => 'Haberler',
                'url' => '#haberler',
                'target' => '_self',
                'order' => 4,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'label' => 'İletişim',
                'url' => '#contact',
                'target' => '_self',
                'order' => 5,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'label' => 'İnsan Kaynakları',
                'url' => 'https://integral.eyotek.com/v1/Pages/human-resources-application',
                'target' => '_blank',
                'order' => 6,
                'is_active' => true,
                'branch_id' => null,
            ],
            [
                'label' => 'Pikajintegral',
                'url' => '/pikaj-integral',
                'target' => '_self',
                'order' => 7,
                'is_active' => true,
                'branch_id' => null,
            ],
        ];

        foreach ($defaultMenus as $menu) {
            Menu::updateOrCreate(
                [
                    'label' => $menu['label'],
                    'branch_id' => $menu['branch_id'],
                ],
                $menu
            );
        }
    }
}
