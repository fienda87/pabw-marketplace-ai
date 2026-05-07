<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        if ($users->isEmpty() || $products->isEmpty()) {
            return;
        }

        $comments = [
            5 => [
                'Mantap banget gearnya, sangat responsif!',
                'Kualitas premium, tidak menyesal beli di sini.',
                'AI recommender-nya beneran kasih saran yang oke!',
                'Barang original dan pengiriman cepat.',
                'Gacor parah buat main Valorant!',
                'Sangat puas dengan build quality-nya.',
                'Packaging sangat aman, bubble wrap tebal.',
                'Software-nya gampang diconfigure.',
                'Sensornya akurat banget, no delay.',
                'Terbaik di kelasnya, worth every penny.'
            ],
            4 => [
                'Barang bagus, tapi pengiriman agak lama.',
                'Sesuai deskripsi, worth it untuk harganya.',
                'Build quality solid, cuma kabelnya agak kaku.',
                'Puas pakai keyboard ini, suaranya thocky.',
                'Mouse-nya ringan banget, pas di tangan.',
                'RGB-nya terang dan transisinya smooth.',
                'Fitur AI-nya ngebantu banget pilih barang.',
                'Admin responsif, tanya-tanya dijawab dengan jelas.',
                'Barang sampai dengan selamat, berfungsi semua.'
            ],
            3 => [
                'Lumayan lah buat budget pelajar.',
                'Kualitas standar, sesuai harga.',
                'Ada sedikit lecet di box, tapi fungsinya normal.',
                'Ukurannya agak kekecilan buat tangan saya.',
                'Material plastiknya terasa agak murah.',
                'Connectivity kadang putus nyambung sedikit.'
            ],
            2 => [
                'Kurang puas, performa tidak sesuai ekspektasi.',
                'Barang agak cepat panas saat dipakai lama.',
                'Software-nya buggy, sering crash.'
            ]
        ];

        foreach ($products as $product) {
            // Each product gets 3-6 random reviews
            $numReviews = rand(3, 6);
            $reviewingUsers = $users->random(min($numReviews, $users->count()));

            foreach ($reviewingUsers as $user) {
                // Bias towards higher ratings for a marketplace demo
                $ratingRoll = rand(1, 100);
                if ($ratingRoll > 40) $rating = 5;
                elseif ($ratingRoll > 15) $rating = 4;
                elseif ($ratingRoll > 5) $rating = 3;
                else $rating = 2;

                Review::create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'rating' => $rating,
                    'comment' => $comments[$rating][array_rand($comments[$rating])],
                ]);
            }
        }
    }
}
