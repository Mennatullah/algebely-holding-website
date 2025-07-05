<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            [
                'title' => ['en' => 'Our Story', 'ar' => 'قصتنا'],
            ],
            [
                'title' => ['en' => 'Portfolio', 'ar' => 'أعمالنا'],
            ],
            [
                'title' => ['en' => 'Leadership', 'ar' => 'القيادة'],
            ],
            [
                'title' => ['en' => 'Contact Us', 'ar' => 'تواصل معنا'],
            ],
            [
                'title' => ['en' => 'Grow With Us', 'ar' => 'انضم معنا'],
            ],
            [
                'title' => ['en' => 'Corporate Social Responsibility', 'ar' => 'المسؤولية الاجتماعية'],
            ],
            [
                'title' => ['en' => 'Privacy Policy', 'ar' => 'سياسة الخصوصية'],
            ],
            [
                'title' => ['en' => 'Cookie Policy', 'ar' => 'سياسة ملفات تعريف الارتباط'],
            ],
        ];

        foreach ($pages as $index => $data) {
            $page = new Page();
            $page->parent_id = null;
            $page->is_active = 1;
            $page->sort = $index + 1;
            $page->link = null; // You can generate or customize this if needed
            $page->image = null;

            $page->translateOrNew('en')->slug = Str::slug($data['title']['en']);
            $page->translateOrNew('ar')->slug = str_replace(' ', '-', $data['title']['ar']);

            $page->translateOrNew('en')->title = $data['title']['en'];
            $page->translateOrNew('ar')->title = $data['title']['ar'];

            $page->translateOrNew('en')->description = 'Description for ' . $data['title']['en'];
            $page->translateOrNew('ar')->description = 'وصف لصفحة ' . $data['title']['ar'];

            $page->translateOrNew('en')->content = 'Content for ' . $data['title']['en'] . '. This is demo content.';
            $page->translateOrNew('ar')->content = 'محتوى لصفحة ' . $data['title']['ar'] . '. هذا محتوى تجريبي.';

            $page->save();
        }
    }
}
