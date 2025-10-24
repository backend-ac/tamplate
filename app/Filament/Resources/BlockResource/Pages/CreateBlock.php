<?php

namespace App\Filament\Resources\BlockResource\Pages;

use App\Filament\Resources\BlockResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;

class CreateBlock extends CreateRecord
{
    protected static string $resource = BlockResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        Log::info('CreateBlock - Data before create:', [
            'type' => $data['type'] ?? 'NO TYPE',
            'content_structure' => isset($data['content']) ? array_keys($data['content']) : 'NO CONTENT',
            'content' => $data['content'] ?? null,
        ]);
        
        return $data;
    }
}


