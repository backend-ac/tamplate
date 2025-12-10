<?php

namespace App\Filament\Resources\BlockResource\Pages;

use App\Filament\Resources\BlockResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
        
        // Convert images to WebP
        $data = $this->convertImagesToWebP($data);
        
        return $data;
    }

    protected function convertImagesToWebP(array $data): array
    {
        if (!isset($data['content']) || !is_array($data['content'])) {
            return $data;
        }

        foreach ($data['content'] as $locale => &$content) {
            if (!is_array($content)) {
                continue;
            }

            // Handle different block types
            switch ($data['type'] ?? null) {
                case 'hero':
                    if (isset($content['banners']) && is_array($content['banners'])) {
                        foreach ($content['banners'] as &$banner) {
                            if (isset($banner['image'])) {
                                $banner['image'] = $this->convertImageToWebP($banner['image']);
                            }
                        }
                    }
                    break;

                case 'assortment':
                case 'supplies':
                case 'why_us':
                case 'stations':
                case 'advantages':
                    if (isset($content['items']) && is_array($content['items'])) {
                        foreach ($content['items'] as &$item) {
                            if (isset($item['img'])) {
                                $item['img'] = $this->convertImageToWebP($item['img']);
                            }
                        }
                    }
                    break;

                case 'model':
                    if (isset($content['images_1']) && is_array($content['images_1'])) {
                        foreach ($content['images_1'] as &$image) {
                            if (isset($image['value'])) {
                                $image['value'] = $this->convertImageToWebP($image['value']);
                            }
                        }
                    }
                    if (isset($content['images_2']) && is_array($content['images_2'])) {
                        foreach ($content['images_2'] as &$image) {
                            if (isset($image['value'])) {
                                $image['value'] = $this->convertImageToWebP($image['value']);
                            }
                        }
                    }
                    break;

                case 'office':
                case 'certificate':
                    if (isset($content['images']) && is_array($content['images'])) {
                        foreach ($content['images'] as &$image) {
                            if (isset($image['value'])) {
                                $image['value'] = $this->convertImageToWebP($image['value']);
                            }
                        }
                    }
                    break;

                case 'partners':
                    if (isset($content['logos']) && is_array($content['logos'])) {
                        foreach ($content['logos'] as &$logo) {
                            if (isset($logo['img'])) {
                                $logo['img'] = $this->convertImageToWebP($logo['img']);
                            }
                        }
                    }
                    break;
            }
        }

        return $data;
    }

    protected function convertImageToWebP(?string $imagePath): ?string
    {
        if (!$imagePath) {
            return $imagePath;
        }

        // Skip if already WebP or SVG
        $extension = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        if (in_array($extension, ['webp', 'svg'])) {
            return $imagePath;
        }

        // Skip PDFs
        if ($extension === 'pdf') {
            return $imagePath;
        }

        try {
            $disk = Storage::disk('public');
            
            if (!$disk->exists($imagePath)) {
                Log::warning('Image not found for WebP conversion', ['path' => $imagePath]);
                return $imagePath;
            }

            // Get full path
            $fullPath = storage_path('app/public/' . $imagePath);
            
            // Create new WebP filename
            $pathInfo = pathinfo($imagePath);
            $webpPath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . '.webp';
            $webpFullPath = storage_path('app/public/' . $webpPath);

            // Convert to WebP using Intervention Image v3
            $manager = new ImageManager(new Driver());
            $image = $manager->read($fullPath);
            $image->toWebp(90)->save($webpFullPath);

            // Delete original file
            $disk->delete($imagePath);

            Log::info('Image converted to WebP', [
                'original' => $imagePath,
                'webp' => $webpPath
            ]);

            return $webpPath;
        } catch (\Exception $e) {
            Log::error('Failed to convert image to WebP', [
                'path' => $imagePath,
                'error' => $e->getMessage()
            ]);
            return $imagePath;
        }
    }
}


