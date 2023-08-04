<?php

namespace io3x1\FilamentBrowser\Pages;

use Filament\Pages\Page;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;

class Browser extends Page
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static string $view = 'filament-browser::browser';
    protected static ?string $navigationGroup = 'Settings';
    protected static ?int $navigationSort = 5;

    protected static function getNavigationLabel(): string
    {
        return __('File Manager');
    }

    protected function getViewData(): array
    {
        $foldersArray = [];
        $filesArray = [];
        $root = base_path();
        $name = base_path();

        array_push($filesArray, [
            "path" => base_path('.htaccess'),
            "name" => ".htaccess",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap.xml'),
            "name" => "sitemap.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/robots.txt'),
            "name" => "robots.txt",
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
