<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

$tables = [
    'pages',
    'page_sections',
    'menus',
    'settings',
    'branches',
    'users',
    'galleries',
    'news',
    'hero_sliders',
    'popup_banners',
];

$sql = "-- Export from local database\n";
$sql .= "SET FOREIGN_KEY_CHECKS=0;\n\n";

foreach ($tables as $table) {
    try {
        $data = DB::table($table)->get();
        
        if ($data->isEmpty()) {
            continue;
        }
        
        $sql .= "-- Table: {$table}\n";
        $sql .= "DELETE FROM `{$table}`;\n";
        
        // Get actual table columns from database
        $tableColumns = DB::select("PRAGMA table_info({$table})");
        $columnNames = array_column($tableColumns, 'name');
        
        // For popup_banners, only export columns that exist in MySQL (title, link, background_image, order, is_active, created_at, updated_at)
        $allowedColumns = null;
        if ($table === 'popup_banners') {
            $allowedColumns = ['id', 'title', 'link', 'background_image', 'order', 'is_active', 'created_at', 'updated_at'];
        }
        
        foreach ($data as $row) {
            $rowArray = (array) $row;
            
            // Filter columns if needed
            if ($allowedColumns !== null) {
                $rowArray = array_intersect_key($rowArray, array_flip($allowedColumns));
            }
            
            $columns = array_keys($rowArray);
            $values = array_values($rowArray);
            
            // Escape values
            $escapedValues = array_map(function($value) {
                if ($value === null) {
                    return 'NULL';
                }
                if (is_numeric($value)) {
                    return $value;
                }
                return "'" . addslashes($value) . "'";
            }, $values);
            
            $sql .= "INSERT INTO `{$table}` (`" . implode('`, `', $columns) . "`) VALUES (" . implode(', ', $escapedValues) . ");\n";
        }
        
        $sql .= "\n";
    } catch (\Exception $e) {
        echo "Error exporting {$table}: " . $e->getMessage() . "\n";
    }
}

$sql .= "SET FOREIGN_KEY_CHECKS=1;\n";

file_put_contents('local_db_export.sql', $sql);
echo "Export completed: local_db_export.sql\n";

