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

        $filesArray[] = [
            "path" => base_path('../public_html/sitemap.xml'),
            "name" => "sitemap.xml",
        ];

        $filesArray[] = [
            "path" => base_path('../public_html/.htaccess'),
            "name" => ".htaccess",
        ];

        $filesArray[] = [
            "path" => base_path('../public_html/robots.txt'),
            "name" => "robots.txt",
        ];

        return [
            "folders" => $foldersArray,
            "files" => $filesArray
        ];
    }
}
