<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function index(){
        return view('export');
    }
    
    public function download_storage(){
        $filePath = 'public/test.png';
        $fileName = 'test.png';
        $mimeType = Storage::mimeType($filePath);
        $headers = [['Content-Type' => $mimeType]];
        return Storage::download($filePath, $fileName, $headers);
    }

    public function download_response(Request $request){
        $filePath = Storage::path('public/test.png');
        $fileName = 'test.png';
        $mimeType = Storage::mimeType($filePath);
        $headers = [['Content-Type' => $mimeType]];
        return response()->download($filePath, $fileName, $headers);
    }

    public function csv_stream(){
        $response_headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=export.csv',
            'Pragma' => 'no-cache',
            'Expires' => 0,
        ];

        $results = [
            ['id','name','class'],
            [1,'John','1-A'],
            [2,'Tom','1-B'],
            [3,'Mary','2-A'],
            [4,'May','2-B'],
        ];

        $callback = function () use ($results) {
            $resource = fopen('php://output', 'w');
            foreach ($results as $row){
                fputcsv($resource, $row);
            }
            fclose($resource);
        };

        return response()->stream($callback, 200, $response_headers);
    }
}