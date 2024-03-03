<?php
namespace App\Services;

class FileGeneratorService {

    /**
     * Generate File
     *
     * @param string $content
     * @param string $filename
     * @return void
     */
    public function generateFile(string $content, string $filename): void {
        $file = fopen($filename, 'w');
        if (!$file) {
            echo "Error: Unable to open file for writing.";
            return;
        }

        fwrite($file, $content);
        fclose($file);
    }
}
