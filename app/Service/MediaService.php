<?php

namespace App\Service;


use Illuminate\Support\Facades\Storage;
use App\Classes\UploadFile;
use Illuminate\Support\Str;

class MediaService
{

    public $imageExtensions = ['image/gif', 'image/jpeg', 'image/png'];

    public function getDirectoriesDetail($parent = '')
    {
        $directories = Storage::directories($parent);
        $list = [];
        foreach ($directories as $directory) {
            $contents = $this->getDirectoryDetail($directory);
            array_push($list, $contents);
        }
        $sort = request('sort', ['name' => 'name', 'order' => 'asc']);
        if ($sort && $sort['name'] == 'name') {
            $this->sortListByKey($list, $sort['name'], $sort['order']);
        }
        return $list;

    }

    function trimPath($path)
    {
        while (strpos($path, '//')) {
            $path = str_replace('//', '/', $path);
        }
        return $path;
    }

    public function getDirectoryDetail($directory)
    {
        return [
            'id' => Str::random(20),
            'name' => basename($directory),
            'type' => 'folder',
            'path' => $directory,
        ];
    }

    public function sortListByKey($list, $key, $order = 'asc')
    {
        if (!$key) return;

        $keys = ['name', 'size', 'type', 'lastModified'];
        if (!in_array($key, $keys)) return;

        if ($key == 'size') $key = 'sizeByte';

        if ($order == 'des') {
            usort($list, function ($item1, $item2) use ($key) {
                return mb_strtolower($item1[$key]) <= mb_strtolower($item2[$key]);
            });
        } else {
            usort($list, function ($item1, $item2) use ($key) {
                return mb_strtolower($item1[$key]) >= mb_strtolower($item2[$key]);
            });
        }

    }

    function getBreadcrumbByPath($path){
        $lastStr = substr($path, -1);
        if ($lastStr == '/'){
            $path = substr($path,0, strlen($path) - 1);
        }
        $res = [];
        if (trim($path) !== ''){
            $path = $this->trimPath($path);
            $arr = explode('/',$path);
            foreach ($arr as $key => $item){
                $temp = [
                    'name' => $item,
                    'path' => ''
                ];
                for ($i = 0; $i <= $key; $i++){
                    $temp['path'].=$arr[$i].'/';
                }
                $res[] = $temp;
            }
        }
        return $res;
    }

    function getFilesDetail($parent = '')
    {
        $files = Storage::files($parent);
        $list = [];
        foreach ($files as $file) {
            $contents = $this->getFileDetail($file);
            array_push($list, $contents);
        }

        $sort = request('sort', ['name' => 'name', 'order' =>'asc']);
        if ($sort) {
            $this->sortListByKey($list, $sort['name'], $sort['order']);
        }
        return $list;
    }

    function uploadFiles($array = [], $folder = '')
    {
        $result = [
            'numberItemSuccess' => 0,
            'doneFiles' => [],
            'errorFiles' => [],
            'numberItemFailed' => 0
        ];

        if (!is_array($array)) {
            throw new \Exception('Input must be an array');
        }

        foreach ($array as &$file) {
            if (!$file->getClientSize() || $file->getClientSize() > 5 * 1048576) {
                array_push($result['errorFiles'], ['name' => $file->getClientOriginalName(), 'errorMsg' => 'Upload file failed, file must not be greater than 5MB']);
                $result['numberItemFailed']++;
                continue;
            }

            try {
                $newFile = UploadFile::uploadFile($file, $folder);
                if ($newFile) {
                    $data = $this->getFileDetail($this->trimPath($folder . '/' . $newFile));
                    $data['old_name'] = $file->getClientOriginalName();

                    array_push($result['doneFiles'], $data);
                    $result['numberItemSuccess']++;
                } else {
                    array_push($result['errorFiles'], ['name' => $file->getClientOriginalName(), 'errorMsg' => 'Upload file failed!']);
                    $result['numberItemFailed']++;
                }
            } catch (\Exception $e) {
                logger($e->getMessage());
                array_push($result['errorFiles'], ['name' => $file->getClientOriginalName(), 'errorMsg' => $e->getMessage()]);
                $result['numberItemFailed']++;
            }
        }
        return $result;
    }

    public function getFileDetail($file)
    {
        $data = [
            'id' => Str::random(20),
            'name' => basename($file),
            'type' => Storage::mimeType($file),
            'size' => $this->convertToReadableSize(Storage::size($file)),
            'lastModified' => \DateTime::createFromFormat("U", Storage::lastModified($file))->format('Y-m-d H:i'),
            'url' => Storage::url($file),
            'urlFull' => url(Storage::url($file)),
            'path' => $file,
            'sizeByte' => Storage::size($file)
        ];

        if (in_array($data['type'], $this->imageExtensions)) {
            $data['image'] = true;
        }
        return $data;
    }

    function convertToReadableSize($size)
    {
        $number = 1024;
        if ($size < $number) return '1KB';
        $base = log($size) / log($number);
        $suffix = array("", "KB", "MB", "GB", "TB");
        $f_base = floor($base);
        return round(pow($number, $base - floor($base)), 1) . $suffix[$f_base];
    }
}
