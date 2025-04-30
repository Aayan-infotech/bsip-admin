<?php
namespace Database\Seeders;

use App\Models\Staff_Category;
use Illuminate\Database\Seeder;

class StaffCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'category_name'     => 'Director',
                'category_name_hin' => 'निदेशक',
            ],
            [
                'category_name'     => 'Scientist',
                'category_name_hin' => 'वैज्ञानिक',
            ],
            [
                'category_name'     => 'Technical Officer',
                'category_name_hin' => 'तकनीकी अधिकारी',
            ],
            [
                'category_name'     => 'Administrative',
                'category_name_hin' => 'प्रशासनिक',
            ],
            [
                'category_name'     => 'Governing Body',
                'category_name_hin' => 'शासी निकाय',
            ],
            [
                'category_name'     => 'Research Advisory Council',
                'category_name_hin' => 'अनुसंधान सलाहकार परिषद',
            ],
            [
                'category_name'     => 'Finance Committee',
                'category_name_hin' => 'वित्त समिति',
            ],
            [
                'category_name'     => 'Technical Assistant',
                'category_name_hin' => 'तकनीकी सहायक',
            ],
            [
                'category_name'     => 'Superannuated Employee',
                'category_name_hin' => 'सेवानिवृत्त कर्मचारी',
            ],
            [
                'category_name'     => 'SRF/JRF',
                'category_name_hin' => 'एसआरएफ/जेआरएफ',
            ],
            [
                'category_name'     => 'Building Committee',
                'category_name_hin' => 'भवन समिति',
            ],[
                'category_name'     => 'AcSIR',
                'category_name_hin' => 'एसीएसआईआर',
            ]
        ];

        foreach ($data as $category) {
            Staff_Category::create($category);
        }
        $this->command->info('Staff categories seeded successfully.');
    }
}
