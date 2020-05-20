<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Post\AddPostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Models\Category;
use App\Service\PostService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    protected $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = $this->service->getPost();
        return view('admin.page.post.index', [
            'titlePageDashboard' => 'Post'
        ], compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::where('type_page', 'blog')->get();
        return view('admin.page.post.create', [
            'titlePageDashboard' => 'Add Post'
        ], compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPostRequest $request)
    {
        //
        $res = $this->service->storePost($request->all());
        if (isset($request['photo']))
            UploadImageFeature($request->file('photo'), 'public/post/Feature', $request['photo']->getClientOriginalName());
        NotificationResult($res);

        return back();
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
        $data = $this->service->showPost($id);
        $category = Category::where('type_page', 'blog')->get();
        return view('admin.page.post.update', [
            'titlePageDashboard' => $data->title,
        ], compact('data', 'category'));

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
    public function update(UpdatePostRequest $request, $id)
    {
        //
        $res = $this->service->updatePost($request->all(), $id);
        if (isset($request['photo']))
            UploadImageFeature($request->file('photo'), 'public/post/Feature', $request['photo']->getClientOriginalName());
        NotificationResult($res);

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = $this->service->destroyPost($id);
        NotificationResult($res);
    }

    public function updateStatus($id)
    {
        $this->service->updateStatusPost($id);
        return 200;
    }
}
