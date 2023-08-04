<?php

namespace io3x1\FilamentBrowser\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\File;

class Browser extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-folder';

    protected static string $view = 'filament-browser::browser';

    protected static ?string $navigationGroup = 'Settings';

    protected static function getNavigationLabel(): string
    {
        return __('Browser');
    }

    protected function getViewData(): array
    {
        $foldersArray = [];
        $filesArray = [];
        $root = base_path();
        $name = base_path();

        array_push($filesArray, [
            [
                "path" => base_path('public/.htaccess'),
                "name" => ".htaccess",
            ],
            [
                "path" => base_path('public/sitemap.xml'),
                "name" => "sitemap.xml",
            ],
            [
                "path" => base_path('public/robots.txt'),
                "name" => "robots.txt",
            ]
        ]);

        $exploadName = explode(DIRECTORY_SEPARATOR, $root);
        $count = count($exploadName);
        $setName = $exploadName[$count - 1];

        return [
            "folders" => $foldersArray,
            "files" => $filesArray,
            "back_path" => str_replace(DIRECTORY_SEPARATOR . $name, '', $root),
            "back_name" => $setName,
            "current_path" => $root
        ];
    }
}
