<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ArticlesData extends Seeder
{
    public function run()
    {
        $articles_data = [
            [
                'title' => 'Understanding AI in 2025',
                'description' => 'A brief overview of how AI will impact various industries in the coming years.',
                'body' => '
                    <h2>AI and the Future</h2>
                    <p>In 2025, artificial intelligence is projected to become deeply embedded in daily business operations across various sectors.</p>
                    <h3>Industries Impacted</h3>
                    <p>Industries such as healthcare, finance, and retail will benefit from smarter automation, predictive analytics, and improved user personalization.</p>
                    <p>For example, AI-driven diagnostics will assist doctors in making quicker and more accurate decisions, while financial institutions will use algorithms to detect fraud in real time.</p>
                    <h3>Challenges Ahead</h3>
                    <p>Despite these advancements, challenges around ethics, data privacy, and AI bias will continue to be hot topics in policy and development circles.</p>
                ',
                'reading_time' => 5,
                'is_featured' => 1,
                'visited' => 150,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'image_src' => 'https://www.acamstoday.org/wp-content/uploads/2020/05/AI.jpg',
                'author_id' => 1,
                'slug' => 'understanding-ai-2025',
            ],
            [
                'title' => 'The Future of Renewable Energy',
                'description' => 'Exploring the future of renewable energy technologies and their potential to shape global energy markets.',
                'body' => '
                    <h2>Clean Energy Revolution</h2>
                    <p>Renewable energy technologies are quickly becoming more efficient and cost-effective, making them a viable solution to global energy demands.</p>
                    <h3>Innovations in Technology</h3>
                    <p>Advancements in solar panel materials, wind turbine design, and battery storage are revolutionizing how we produce and store energy.</p>
                    <p>Smart grids are being developed to better distribute energy, especially in urban environments with high demand.</p>
                    <h3>Policy and Investment</h3>
                    <p>Governments and investors are now prioritizing green energy, driving global momentum toward a more sustainable and eco-friendly future.</p>
                ',
                'reading_time' => 6,
                'is_featured' => 0,
                'visited' => 120,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'image_src' => 'https://sebangsanetwork.com/wp-content/uploads/2021/07/87570724_m.jpg',
                'author_id' => 1,
                'slug' => 'the-future-of-renewable-energy',
            ],
            [
                'title' => 'Tips for a Healthier Lifestyle',
                'description' => 'Simple tips to lead a healthier lifestyle, focusing on balanced nutrition, exercise, and mental well-being.',
                'body' => '
                    <h2>Live Better, Feel Better</h2>
                    <p>A healthy lifestyle isn’t just about physical fitness — it’s a holistic approach that includes mental and emotional well-being.</p>
                    <h3>Nutrition</h3>
                    <p>Maintaining a balanced diet with whole foods, fruits, and vegetables fuels your body and boosts your immune system.</p>
                    <p>Avoiding processed food and sugary drinks can drastically improve energy levels and focus.</p>
                    <h3>Movement and Mindfulness</h3>
                    <p>Regular exercise, even just a brisk walk, improves cardiovascular health and mental clarity.</p>
                    <p>Meanwhile, practices like meditation and journaling help reduce stress and improve mood over time.</p>
                ',
                'reading_time' => 4,
                'is_featured' => 0,
                'visited' => 80,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'image_src' => 'https://oncquest-blog.s3.ap-south-1.amazonaws.com/blog/wp-content/uploads/2023/07/12043920/a.jpg',
                'author_id' => 1,
                'slug' => 'tips-for-a-healthier-lifestyle',
            ],
            [
                'title' => 'The Rise of E-Commerce in 2025',
                'description' => 'A look at how e-commerce has evolved and what the future holds for online shopping and digital retail.',
                'body' => '
                    <h2>E-Commerce: The Digital Boom</h2>
                    <p>Online shopping has become the norm, and by 2025 it’s expected to dominate retail in ways we’ve never seen before.</p>
                    <h3>Personalization and AI</h3>
                    <p>Retailers are leveraging AI to create personalized shopping experiences that anticipate user needs and preferences.</p>
                    <p>Smart product recommendations, voice-assisted shopping, and dynamic pricing models are becoming standard features.</p>
                    <h3>Faster Fulfillment</h3>
                    <p>Same-day delivery, drone shipping, and advanced logistics networks are changing customer expectations and making e-commerce even more convenient.</p>
                ',
                'reading_time' => 7,
                'is_featured' => 1,
                'visited' => 200,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'image_src' => 'https://www.techved.com/resources/images/blog/the-rising-ecommerce-1.jpg',
                'author_id' => 1,
                'slug' => 'the-rise-of-e-commerce-2025',
            ],
        ];

        // Insert the articles into the 'articles' table
        $this->db->table('articles')->insertbatch( $articles_data);
    }
}
