<?php

namespace App\Http\Controllers\Backsite\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Post;
use App\Models\Category;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::select('id', 'name', 'slug', 'status')->orderBy('id', 'asc')->paginate(5);

        return view('backsite.admin.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backsite.admin.category.create-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
//        return $request->except('_token');
//        return $request->all();

//        $request->validate([
//            'name' => 'required|max:20',
//            'status' => 'required',
//
//        ], [
//            'name.required' => 'Category Name field must be filled out!',
//            'name.max:25' => 'Category Name must be less than 20 Character\'s!',
//            'status.required' => 'Status field option must be selected!',
//
//        ]);


        try {
            $cat_name = $request->name;
            $category_data = [
                'name' => $cat_name,
                'slug' => Str::slug($cat_name),
                'status' => $request->status,

            ];

//            dd($category_data);

            if($category_data) {
                Category::create($category_data);

                $this->showMessage('success','Success, Category data Created.');
                return redirect()->route('categories.index');
            }

        } catch (\Exception $e) {
            $this->showMessage('danger','Error, Something went wrong!');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cat_id = base64_decode($id);
//        return $cat_id;

        $category = Category::with('posts')->select('id', 'name', 'slug', 'status', 'created_at')->find($cat_id);
//        return $category;
//        dd($category);

//        $posts = Post::where('cat_id', $id)->get();
//        return $posts;
//        dd($posts);

        return view('backsite.admin.category.view', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category_id = base64_decode($id);
        $category_edit_data = Category::find($category_id);

//        return $category_edit_data;

        return view('backsite.admin.category.edit-form', compact('category_edit_data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //
//        return base64_decode($id);
        $category_id = base64_decode($id);

        $category_data_update = Category::find($category_id);


        try {
            $cat_name = $request->name;

            $category_data_update->name = $cat_name;
            $category_data_update->slug = Str::slug($category_data_update->name);
            $category_data_update->status = $request->status;


//            dd($category_data_update);

            if($category_data_update) {
                $category_data_update->save();

                $this->showMessage('success','Success, Category data has been Updated.');
                return redirect()->route('categories.index');
            }

        } catch (\Exception $e) {
            $this->showMessage('danger','Error, Something went wrong!');
            return redirect()->back();
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
//        return base64_decode($id);
        $category_id = base64_decode($id);
        $category_delete = Category::find($category_id);

        $category_delete->delete();

        $this->showMessage('success','Success, Category has been Deleted.');
        return redirect()->route('categories.index');
    }
}
