<?php

namespace App\Services;

use App\Section;

class CreateSectionService
{
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255'
        ]);
    }

    public function create(array $data)
    {
        return Section::create([
            'name' => $data['name']
        ]);
    }
}
