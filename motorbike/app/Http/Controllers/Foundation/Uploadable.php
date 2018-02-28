<?php

namespace  App\Http\Controllers\Foundation;

use Illuminate\Http\UploadedFile;
use App\Exceptions\InvalidUploadedFileException;

trait Uploadable
{
    /**
     * Upload one or more files.
     *
     * @param UploadedFile|array $file
     */
    public function upload($file, $folder = null, $disk = 'public')
    {
        $paths = $this->uploadFile($file, $folder, $disk);

        return $this->getBasename($paths);
    }

    /**
     * Return array of file basename.
     *
     * @param array $paths
     *
     * @return array
     */
    protected function getBasename(array $paths): array
    {
        $basenames = [];

        foreach ($paths as $path) {
            $basenames[] = basename($path);
        }

        return $basenames;
    }

    protected function uploadFile($file, $folder = null, $disk = 'public')
    {
        $files = array_wrap($file);

        return $this->uploadFiles($files, $folder, $disk);
    }

    /**
     * Upload files and return paths.
     *
     * @param array  $files
     * @param string $folder
     * @param string $disk
     *
     * @return array
     */
    protected function uploadFiles(array $files, $folder = null, $disk = 'public'): array
    {
        $paths = [];

        foreach ($files as $file) {
            throw_if(!($file instanceof UploadedFile), new InvalidUploadedFileException());

            $paths[] = $file->store($folder, $disk);
        }

        return $paths;
    }
}
