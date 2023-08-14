<?php

namespace io3x1\FilamentBrowser\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BrowserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('folder_path')) {
            $request->validate([
                "folder_path" => "required",
                "folder_name" => "required",
                "type" => "required",
            ]);

            $root = $request->get('folder_path');
            $name = $request->get('folder_name');
            $type = $request->get('type');
        } else if ($request->has('file_path')) {
            $name = $request->get('file_name');
            $setFilePath = $request->get('file_path');
            $root = str_replace(DIRECTORY_SEPARATOR . $name, '', $request->get('file_path'));
        } else {
            $root = base_path();
            $name = base_path();
            $type = "home";
        }

        if ($request->has('file_path')) {
            $getFile = File::get($setFilePath);
            $foldersArray = [];
            $filesArray = [];

            array_push($filesArray, [
                "path" => base_path('../public_html/.htaccess'),
                "name" => ".htaccess",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap_index.xml'),
                "name" => "sitemap_index.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap-en.xml'),
                "name" => "sitemap-en.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap-de.xml'),
                "name" => "sitemap-de.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap-fr.xml'),
                "name" => "sitemap-fr.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap-ru.xml'),
                "name" => "sitemap-ru.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap-it.xml'),
                "name" => "sitemap-it.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap-es.xml'),
                "name" => "sitemap-es.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/sitemap-pt.xml'),
                "name" => "sitemap-pt.xml",
            ]);

            array_push($filesArray, [
                "path" => base_path('../public_html/robots.txt'),
                "name" => "robots.txt",
            ]);

            $ex = File::extension($setFilePath);

            if ($ex === 'webp' || $ex === 'jpg' || $ex === 'png' || $ex === 'svg' || $ex === 'jpeg' || $ex === 'ico' || $ex === 'gif' || $ex === 'tif') {
                $imagBase64 = base64_encode($getFile);
                $getFile = $imagBase64;
            }

            return response()->json([
                "folders" => $foldersArray,
                "files" => $filesArray,
                "file" => $getFile,
                "ex" => $ex,
                "path" => $setFilePath
            ], 200);
        } elseif ($request->has('content')) {
            $checkIfFileEx = File::exists($request->get('path'));
            if ($checkIfFileEx) {
                File::put($request->get('path'), $request->get('content'));

                return response()->json([
                    "success" => true
                ]);
            }
        }
    }
}
