<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Keyboard' => [
                [
                    'name' => 'Logitech G Pro X TKL',
                    'description' => 'Mechanical gaming keyboard with swappable switches.',
                    'price' => 1999000.00,
                    'stock' => 15,
                    'image_url' => 'https://resource.logitechg.com/w_1000,c_limit,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/pro-x-tkl/gallery/pro-x-tkl-keyboard-gallery-1-black.png?v=1',
                    'switch_type' => 'GX Blue Clicky',
                    'connectivity' => 'Wired',
                    'weight' => '980g'
                ],
                [
                    'name' => 'Razer BlackWidow V4 Pro',
                    'description' => 'Full-size mechanical keyboard with Razer Chroma RGB.',
                    'price' => 3200000.00,
                    'stock' => 8,
                    'image_url' => 'https://assets2.razerzone.com/images/pnx.rvq_06a090e5444101e4/razer-blackwidow-v4-pro-7-1200x630.jpg',
                    'switch_type' => 'Razer Green Mechanical',
                    'connectivity' => 'Wired',
                    'weight' => '1120g'
                ],
                [
                    'name' => 'Keychron Q1 HE',
                    'description' => 'Magnetic Switch mechanical keyboard, extremely customizable.',
                    'price' => 3500000.00,
                    'stock' => 5,
                    'image_url' => 'https://www.keychron.com/cdn/shop/files/Keychron-Q1-HE-QMK-custom-mechanical-keyboard-1.jpg',
                    'switch_type' => 'Gateron Magnetic',
                    'connectivity' => 'Wired/Wireless',
                    'weight' => '1500g'
                ],
                [
                    'name' => 'Wooting 60HE',
                    'description' => 'The original Hall Effect 60% gaming keyboard.',
                    'price' => 2900000.00,
                    'stock' => 10,
                    'image_url' => 'https://wooting.io/images/60he-image.png',
                    'switch_type' => 'Lekker Linear',
                    'connectivity' => 'Wired',
                    'weight' => '600g'
                ],
                [
                    'name' => 'SteelSeries Apex Pro TKL',
                    'description' => 'The world\'s fastest keyboard with OmniPoint 2.0 switches.',
                    'price' => 3100000.00,
                    'stock' => 12,
                    'image_url' => 'https://media.steelseriescdn.com/thumbs/catalog/items/64856/8051759409894e668c2d8c3664d60c40.png.1000x1000_q100_crop-fit_optimize.png',
                    'switch_type' => 'OmniPoint Adjustable',
                    'connectivity' => 'Wired',
                    'weight' => '960g'
                ],
                [
                    'name' => 'Corsair K70 RGB TKL',
                    'description' => 'Champion Series Tenkeyless Mechanical Gaming Keyboard.',
                    'price' => 2100000.00,
                    'stock' => 15,
                    'image_url' => 'https://www.corsair.com/corsairmedia/sys_master/productcontent/CH-9119010-NA-K70_RGB_TKL_01.png',
                    'switch_type' => 'Cherry MX Speed',
                    'connectivity' => 'Wired',
                    'weight' => '930g'
                ],
                [
                    'name' => 'Keychron V1',
                    'description' => 'Entry-level customizable mechanical keyboard.',
                    'price' => 1200000.00,
                    'stock' => 20,
                    'image_url' => 'https://www.keychron.com/cdn/shop/files/Keychron-V1-QMK-Custom-Mechanical-Keyboard-1.jpg',
                    'switch_type' => 'Keychron K Pro Brown',
                    'connectivity' => 'Wired',
                    'weight' => '970g'
                ],
                [
                    'name' => 'Razer Huntsman V3 Pro',
                    'description' => 'Analog optical gaming keyboard for pro-level performance.',
                    'price' => 3800000.00,
                    'stock' => 6,
                    'image_url' => 'https://assets2.razerzone.com/images/pnx.rvq_06a090e5444101e4/razer-huntsman-v3-pro-7-1200x630.jpg',
                    'switch_type' => 'Razer Analog Optical Gen-2',
                    'connectivity' => 'Wired',
                    'weight' => '1100g'
                ],
            ],
            'Mouse' => [
                [
                    'name' => 'Logitech G Pro X Superlight 2',
                    'description' => 'Ultra-lightweight wireless gaming mouse.',
                    'price' => 2199000.00,
                    'stock' => 20,
                    'image_url' => 'https://resource.logitechg.com/w_1000,c_limit,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/pro-x-superlight-2/gallery/pro-x-superlight-2-gallery-1-black.png?v=1',
                    'dpi' => 32000,
                    'connectivity' => 'Wireless (LIGHTSPEED)',
                    'sensor' => 'HERO 2',
                    'weight' => '60g'
                ],
                [
                    'name' => 'Razer DeathAdder V3 Pro',
                    'description' => 'Ergonomic wireless gaming mouse for esports.',
                    'price' => 2350000.00,
                    'stock' => 12,
                    'image_url' => 'https://assets2.razerzone.com/images/pnx.rvq_06a090e5444101e4/razer-deathadder-v3-pro-1200x630.jpg',
                    'dpi' => 30000,
                    'connectivity' => 'Wireless (HyperSpeed)',
                    'sensor' => 'Focus Pro 30K Optical',
                    'weight' => '63g'
                ],
                [
                    'name' => 'Finalmouse UltralightX',
                    'description' => 'The lightest carbon fiber gaming mouse.',
                    'price' => 4500000.00,
                    'stock' => 3,
                    'image_url' => 'https://finalmouse.com/cdn/shop/files/ULX-Guardian-Top_1200x.png',
                    'dpi' => 26000,
                    'connectivity' => 'Wireless',
                    'sensor' => 'PAW3395',
                    'weight' => '29g'
                ],
                [
                    'name' => 'Logitech G502 X Plus',
                    'description' => 'Iconic gaming mouse redesigned with LIGHTFORCE hybrid switches.',
                    'price' => 2500000.00,
                    'stock' => 15,
                    'image_url' => 'https://resource.logitechg.com/w_1000,c_limit,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/g502x-plus/gallery/g502x-plus-gallery-1-black.png?v=1',
                    'dpi' => 25600,
                    'connectivity' => 'Wireless (LIGHTSPEED)',
                    'sensor' => 'HERO 25K',
                    'weight' => '106g'
                ],
                [
                    'name' => 'Razer Viper V3 Pro',
                    'description' => 'The lightweight mouse that helped pro players dominate.',
                    'price' => 2400000.00,
                    'stock' => 10,
                    'image_url' => 'https://assets2.razerzone.com/images/pnx.rvq_06a090e5444101e4/razer-viper-v3-pro-black-1200x630.jpg',
                    'dpi' => 35000,
                    'connectivity' => 'Wireless (HyperPolling 8KHz)',
                    'sensor' => 'Focus Pro 35K Optical Gen-2',
                    'weight' => '54g'
                ],
                [
                    'name' => 'SteelSeries Aerox 3 Wireless',
                    'description' => 'Ultra-lightweight 68g gaming mouse with IP54 water resistance.',
                    'price' => 1600000.00,
                    'stock' => 18,
                    'image_url' => 'https://media.steelseriescdn.com/thumbs/catalog/items/62612/8254b5dfd9d0426d83a15f02c67b9380.png.1000x1000_q100_crop-fit_optimize.png',
                    'dpi' => 18000,
                    'connectivity' => 'Wireless (2.4GHz & Bluetooth)',
                    'sensor' => 'TrueMove Air',
                    'weight' => '68g'
                ],
                [
                    'name' => 'Pulsar X2V2',
                    'description' => 'High-performance symmetrical gaming mouse.',
                    'price' => 1500000.00,
                    'stock' => 10,
                    'image_url' => 'https://pulsar.gg/cdn/shop/files/x2v2-black-top.png',
                    'dpi' => 26000,
                    'connectivity' => 'Wireless',
                    'sensor' => 'PAW3395',
                    'weight' => '53g'
                ],
                [
                    'name' => 'Zowie EC2-CW',
                    'description' => 'Ergonomic wireless mouse for esports with enhanced receiver.',
                    'price' => 2200000.00,
                    'stock' => 8,
                    'image_url' => 'https://zowie.benq.com/content/dam/game/en/product/mouse/ec2-cw/gallery/ec2-cw-01.png',
                    'dpi' => 3200,
                    'connectivity' => 'Wireless',
                    'sensor' => 'PAW3370',
                    'weight' => '77g'
                ],
            ],
            'Headphone' => [
                [
                    'name' => 'SteelSeries Arctis Nova 7',
                    'description' => 'Wireless multi-platform gaming headset.',
                    'price' => 2800000.00,
                    'stock' => 10,
                    'image_url' => 'https://media.steelseriescdn.com/thumbs/catalog/items/61553/f88126786c55490a9860b721867e35b7.png.1000x1000_q100_crop-fit_optimize.png',
                    'connectivity' => 'Wireless (2.4GHz & Bluetooth)',
                    'weight' => '325g'
                ],
                [
                    'name' => 'Audeze Maxwell',
                    'description' => 'Planar Magnetic wireless gaming headset with 80hr battery.',
                    'price' => 5200000.00,
                    'stock' => 4,
                    'image_url' => 'https://www.audeze.com/cdn/shop/products/Maxwell-Playstation-Angled-Right_1200x.png',
                    'connectivity' => 'Wireless / Wired',
                    'weight' => '490g'
                ],
                [
                    'name' => 'HyperX Cloud III Wireless',
                    'description' => 'Legendary comfort and durability, now with 120-hour battery life.',
                    'price' => 2400000.00,
                    'stock' => 20,
                    'image_url' => 'https://row.hyperx.com/cdn/shop/files/hyperx_cloud_iii_wireless_black_red_1_main_900x.jpg',
                    'connectivity' => 'Wireless',
                    'weight' => '330g'
                ],
                [
                    'name' => 'Sony INZONE H9',
                    'description' => 'Wireless Noise Canceling Gaming Headset with 360 Spatial Sound.',
                    'price' => 4200000.00,
                    'stock' => 7,
                    'image_url' => 'https://www.sony.co.id/image/575306917639a04a32371d152a233b2a?fmt=pjpeg&wid=660&hei=660&bgcolor=F1F5F9&qlt=43',
                    'connectivity' => 'Wireless (2.4GHz & Bluetooth)',
                    'weight' => '330g'
                ],
                [
                    'name' => 'Razer BlackShark V2 Pro',
                    'description' => 'The definitive esports headset, now with next-gen mic.',
                    'price' => 2900000.00,
                    'stock' => 12,
                    'image_url' => 'https://assets2.razerzone.com/images/pnx.rvq_06a090e5444101e4/razer-blackshark-v2-pro-2023-black-1200x630.jpg',
                    'connectivity' => 'Wireless (HyperSpeed)',
                    'weight' => '320g'
                ],
                [
                    'name' => 'Beyerdynamic DT 900 Pro X',
                    'description' => 'Open-back studio headphones for monitoring and gaming.',
                    'price' => 4500000.00,
                    'stock' => 5,
                    'image_url' => 'https://north-america.beyerdynamic.com/media/catalog/product/cache/6b3749298e69818816c4f74d093da4c2/d/t/dt_900_pro_x_v2.png',
                    'connectivity' => 'Wired',
                    'weight' => '345g'
                ],
                [
                    'name' => 'Sennheiser Game Zero',
                    'description' => 'Closed-back acoustic gaming headset for competitive gaming.',
                    'price' => 2200000.00,
                    'stock' => 10,
                    'image_url' => 'https://assets.sennheiser.com/global-downloads/assets/7521/thumbnails/Game_Zero_Product_Image_1_Square_Medium.png',
                    'connectivity' => 'Wired',
                    'weight' => '300g'
                ],
                [
                    'name' => 'Corsair HS80 RGB Wireless',
                    'description' => 'Premium Gaming Headset with Dolby Atmos.',
                    'price' => 2100000.00,
                    'stock' => 15,
                    'image_url' => 'https://www.corsair.com/corsairmedia/sys_master/productcontent/CA-9011235-NA-HS80_RGB_WRLS_BLK_01.png',
                    'connectivity' => 'Wireless (SLIPSTREAM)',
                    'weight' => '367g'
                ],
            ],
            'Accessories' => [
                [
                    'name' => 'Artisan Ninja FX Zero Soft',
                    'description' => 'Premium high-performance gaming mousepad from Japan.',
                    'price' => 850000.00,
                    'stock' => 10,
                    'image_url' => 'https://m.media-amazon.com/images/I/61r-G+6X+IL._AC_SL1500_.jpg',
                    'weight' => '400g'
                ],
                [
                    'name' => 'Artisan Hayate Otsu',
                    'description' => 'High-end gaming mousepad with unique weave.',
                    'price' => 950000.00,
                    'stock' => 5,
                    'image_url' => 'https://m.media-amazon.com/images/I/71u+m6m+uCL._AC_SL1500_.jpg',
                    'weight' => '400g'
                ],
                [
                    'name' => 'BenQ ZOWIE G-SR-SE',
                    'description' => 'Esports-grade cloth mousepad with smooth glide.',
                    'price' => 650000.00,
                    'stock' => 15,
                    'image_url' => 'https://zowie.benq.com/content/dam/game/en/product/mouse-pad/g-sr-se-rouge/gallery/g-sr-se-rouge-01.png',
                    'weight' => '350g'
                ],
                [
                    'name' => 'Razer Strider',
                    'description' => 'Hybrid mousepad with speed and control.',
                    'price' => 750000.00,
                    'stock' => 20,
                    'image_url' => 'https://assets2.razerzone.com/images/pnx.rvq_06a090e5444101e4/razer-strider-1200x630.jpg',
                    'weight' => '450g'
                ],
                [
                    'name' => 'SteelSeries QcK Heavy',
                    'description' => 'Extra thick gaming mousepad for maximal comfort.',
                    'price' => 450000.00,
                    'stock' => 25,
                    'image_url' => 'https://media.steelseriescdn.com/thumbs/catalog/items/63008/5b68f5f0b5f142e9a595f6e8093da4c2.png.1000x1000_q100_crop-fit_optimize.png',
                    'weight' => '500g'
                ],
                [
                    'name' => 'Logitech G Powerplay',
                    'description' => 'Wireless charging system for compatible Logitech mice.',
                    'price' => 1800000.00,
                    'stock' => 5,
                    'image_url' => 'https://resource.logitechg.com/w_1000,c_limit,q_auto,f_auto,dpr_2.0/d_transparent.gif/content/dam/gaming/en/products/powerplay/powerplay-gallery-1.png?v=1',
                    'weight' => '1200g'
                ],
                [
                    'name' => 'Razer Mouse Bungee V3',
                    'description' => 'Drag-free cord control for improved mouse movement.',
                    'price' => 350000.00,
                    'stock' => 30,
                    'image_url' => 'https://assets2.razerzone.com/images/pnx.rvq_06a090e5444101e4/razer-mouse-bungee-v3-1200x630.jpg',
                    'weight' => '240g'
                ],
                [
                    'name' => 'Glorious Mouse Bungee',
                    'description' => 'Flexible arm for ultimate cord management.',
                    'price' => 250000.00,
                    'stock' => 40,
                    'image_url' => 'https://cdn.shopify.com/s/files/1/0549/2681/products/MouseBungee-White_1.png?v=1545163158',
                    'weight' => '250g'
                ],
            ],
        ];

        foreach ($categories as $categoryName => $products) {
            $category = Category::firstOrCreate(['name' => $categoryName]);
            foreach ($products as $productData) {
                Product::updateOrCreate(
                    ['name' => $productData['name']],
                    array_merge($productData, ['category_id' => $category->id])
                );
            }
        }
    }
}
