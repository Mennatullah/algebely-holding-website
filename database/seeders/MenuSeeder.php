<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            'Main Menu' => [
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
            ],
            'Secondary Menu' => [
                [
                    'title' => ['en' => 'Overview', 'ar' => 'نظرة عامة'],
                ],
                [
                    'title' => ['en' => 'Our Story', 'ar' => 'قصتنا'],
                ],
            ],
            'Footer Menu' => [
                [
                    'title' => ['en' => 'Grow With Us', 'ar' => 'نم معنا'],
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
            ],
        ];

        foreach ($menus as $parentTitleEn => $children) {
            // Create parent menu (top-level group)
            $parentMenu = new Menu();
            $parentMenu->parent_id = null;
            $parentMenu->is_active = 1;
            $parentMenu->sort = 0;
            $parentMenu->translateOrNew('en')->title = $parentTitleEn;
            $parentMenu->translateOrNew('ar')->title = $this->translateGroupTitleToArabic($parentTitleEn);
            $parentMenu->save();

            foreach ($children as $index => $item) {
                $menu = new Menu();
                $menu->parent_id = $parentMenu->id;
                $menu->is_active = 1;
                $menu->sort = $index + 1;
                $menu->translateOrNew('en')->title = strip_tags($item['title']['en']);
                $menu->translateOrNew('ar')->title = strip_tags($item['title']['ar']);
                $menu->save();
            }
        }
    }

    protected function translateGroupTitleToArabic($enTitle)
    {
        return match ($enTitle) {
            'Main Menu' => 'القائمة الرئيسية',
            'Secondary Menu' => 'القائمة الثانوية',
            'Footer Menu' => 'قائمة التذييل',
            default => $enTitle,
        };
    }
}
