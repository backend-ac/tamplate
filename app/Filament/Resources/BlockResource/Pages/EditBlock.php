<?php

namespace App\Filament\Resources\BlockResource\Pages;

use App\Filament\Resources\BlockResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Log;

class EditBlock extends EditRecord
{
    protected static string $resource = BlockResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        Log::info('EditBlock - Data before fill:', [
            'type' => $data['type'] ?? 'NO TYPE',
            'content_structure' => isset($data['content']) ? array_keys($data['content']) : 'NO CONTENT',
            'ru_fields' => isset($data['content']['ru']) ? array_keys($data['content']['ru']) : 'NO RU',
        ]);
        
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        Log::info('EditBlock - Data before save:', [
            'type' => $data['type'] ?? 'NO TYPE',
            'content_structure' => isset($data['content']) ? array_keys($data['content']) : 'NO CONTENT',
        ]);
        
        return $data;
    }
}


