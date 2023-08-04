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

        array_push($filesArray, [
            "path" => base_path('public/sitemap_index.xml'),
            "name" => "sitemap_index.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap-en.xml'),
            "name" => "sitemap-en.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap-de.xml'),
            "name" => "sitemap-de.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap-fr.xml'),
            "name" => "sitemap-fr.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap-ru.xml'),
            "name" => "sitemap-ru.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap-it.xml'),
            "name" => "sitemap-it.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap-es.xml'),
            "name" => "sitemap-es.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/sitemap-pt.xml'),
            "name" => "sitemap-pt.xml",
        ]);

        array_push($filesArray, [
            "path" => base_path('.htaccess'),
            "name" => ".htaccess",
        ]);

        array_push($filesArray, [
            "path" => base_path('public/robots.txt'),
            "name" => "robots.txt",
        ]);

        return [
            "folders" => $foldersArray,
            "files" => $filesArray
        ];
    }
}
