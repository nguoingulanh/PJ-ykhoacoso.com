<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\AddCategoryRequest;
use App\Http\Requests\Category\EditCategoryRequest;
use App\Models\Category;
use App\Service\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $sercive;

    public function __construct(CategoryService $service)
    {
        $this->sercive = $service;
    }

    public function index()
    {
        //
        $category = Category::orderBy('id','DESC')->paginate(15);
        return view('admin.page.category.index', [
            'titlePageDashboard' => 'Category'
        ], compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.page.category.create', ['titlePageDashboard' => 'Add Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AddCategoryRequest $request)
    {
        $res = $this->sercive->storeCategory($request->all());
        NotificationResult($res);
        return Redirect::route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->sercive->showCategory($id);

        return view('admin.page.category.update', [
            'titlePageDashboard' => $data->title,
        ], compact('data'));
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
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, $id)
    {
        //
        $res = $this->sercive->updateCategory($request->all(), $id);
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
        $res = $this->sercive->destroyCategory($id);
        NotificationResult($res);
    }
}
