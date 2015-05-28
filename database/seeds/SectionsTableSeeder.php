<?php

use App\Services\CreateSectionService;
use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * @var CreateSectionService
     */
    private $createSectionService;

    public function __construct(CreateSectionService $createSectionService)
    {
        $this->createSectionService = $createSectionService;
    }

    public function run()
    {
        $sections = [
            [
                'name' => 'Embarazo'
            ],
            [
                'name' => 'Lactancia'
            ],
            [
                'name' => 'Alimentación'
            ],
            [
                'name' => 'Ocio'
            ],
            [
                'name' => 'Lecturas interesantes'
            ]
        ];

        foreach ($sections as $section) {
            $this->createSectionService->create($section);
        }
    }
}
