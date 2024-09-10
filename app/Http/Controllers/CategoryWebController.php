<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Contracts\Support\Renderable;

class CategoryWebController extends Controller
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        return view('backend.pages.category_two.index', [
            'categories' => $this->categoryRepository->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {

        return view('backend.pages.category.create', [
            'parentCategories' => $this->categoryRepository->printCategory()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $category = $this->categoryRepository->create($request->all());

        if (!empty($category)) {
            session()->flash('success', 'Category created successfully.');
            return redirect()->route('categories.index');
        }

        session()->flash('error', 'Something went wrong to create a category.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {

        $category = $this->categoryRepository->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return Renderable
     */
    public function edit(Category $category): Renderable
    {


        return view('backend.pages.category.edit', [
            'category' => $category,
            'parentCategories' => $this->categoryRepository->printCategory($category->parent_id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $categoryUpdated = $this->categoryRepository->update($request->except('_token', '_method'), $category->id);

        if (!empty($categoryUpdated)) {
            session()->flash('success', 'Category updated successfully.');
            return redirect()->route('categories.index');
        }

        session()->flash('error', 'Something went wrong to update the category.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {


        if ($this->categoryRepository->delete($category)) {
            session()->flash('success', 'Category deleted successfully.');
            return redirect()->route('categories.index');
        }

        session()->flash('error', 'Something went wrong to update the category.');
    }
}
