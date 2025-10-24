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
        Log::info('Block data:', [
            'type' => $data['type'] ?? 'NO TYPE',
            'content_keys' => isset($data['content']) ? array_keys($data['content']) : 'NO CONTENT',
            'content' => $data['content'] ?? null,
        ]);
        
        return $data;
    }
}


