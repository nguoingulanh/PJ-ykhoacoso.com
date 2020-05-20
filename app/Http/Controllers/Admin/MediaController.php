<?php

namespace App\Http\Controllers\Admin;

use App\Service\MediaService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{

    protected $service;

    public function __construct(MediaService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function index()
    {
        //
        $path = request('path','');

        $fileBreadcrumbs = $this->service->getBreadcrumbByPath($path);

        $path = request('path', config('filesystems.file_directory'));
        $directory = $this->service->getDirectoriesDetail($path);
        $files = $this->service->getFilesDetail($path);
        $isModal = request('is-modal',null);
        $currentPath = count($fileBreadcrumbs) > 0?$fileBreadcrumbs[count($fileBreadcrumbs)-1]:['name' => '','path'=>'/'];
        $type = json_decode(request('dataFile'))->type ?? false;
        if ($type) {
            $html = view('admin.page.media.mediaFileChild')->with(compact('directory', 'files','fileBreadcrumbs','currentPath'))->render();
            return $html;
        }
        if ($isModal){
            $html = view('admin.page.media.models.filemanager')->with(compact('directory', 'files','fileBreadcrumbs','currentPath'))->render();
            return response($html,200);
        }
        return view('admin.page.media.index', [
            'titlePageDashboard' => 'Media'
        ], compact('directory', 'files','fileBreadcrumbs','currentPath'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addFolder()
    {
        $name = request()->input('newNameFolder');
        $folder = request()->input('currentFolder') ?? false;

        if (!strpbrk($name, "\\/?%*:|\"<>") === FALSE) {
            return response("Folder name cannot contain any of the following characters: \\/?%*:|\"<>", '400');
        }

        $path = $folder ? $folder : config('filesystems.file_directory');
        $newFolder = $this->service->trimPath($path . '/' . $name);

        if (Storage::exists($newFolder)) {
            return response('Folder already exist!', '400');
        }
        try {
            Storage::makeDirectory($newFolder);
            $folder = $this->service->getDirectoryDetail($newFolder);
            return response(view('admin.page.media.component.item-folder', compact('folder')), '200');
        } catch (\Exception $err) {
            return response('Add Folder Failed', '400');
        }

    }

    public function uploadFile()
    {
        $files = request('files');
        $folder = request('folder', '');
        $folder = $folder != '/' ? $folder : config('filesystems.file_directory');
        $files = $this->service->uploadFiles($files, $folder);
        $file = $files['doneFiles'];
        return response(view('admin.page.media.component.item-file', compact('file')), '200');
    }
}
