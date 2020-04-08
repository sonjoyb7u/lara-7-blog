<?php

namespace App\Http\Controllers\Backsite\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::with('category', 'user')->orderBy('id', 'asc')->paginate(5);

//        dd($posts);
//        return $posts;

        return view('backsite.admin.post.manage', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::select('id','name')->where('status', 1)->orderBy('id', 'asc')->get();

        return view('backsite.admin.post.create-form', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
//        return $request->all();

//        $request->validate([
//            'title' => 'required|unique:posts|max:100',
//            'desc' => 'required',
//            'image' => 'required|image',
//            'status' => 'required',
//
//        ], [
//            'title.required' => 'Post title field must be filled out!',
//            'title.unique' => 'Post title has already been taken!',
//            'title.max' => 'Post title must be less than 100 Character\'s!',
//            'image.required' => 'Image field must be filled out!',
//            'image.images' => 'Image file must be png,jpeg/jpg extension!',
//            'status.required' => 'Status field option must be selected!',
//
//        ]);

        $image_file = $request->file('image');
        $image_file_ext = $image_file->getClientOriginalExtension();

        $new_image_file  = rand(9999, 99999)."_".date("Ymdhis")."_".rand(9999, 99999).".".$image_file_ext;
//        echo $new_file_name;

//        return $image_file->getMimeType();

        try {

            $post_data = [
                'user_id' => $request->user_id,
                'cat_id' => $request->cat_id,
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $new_image_file,
                'status' => $request->status,

            ];

//            dd($post_data);


            if($image_file->isValid()) {

                if($image_file->getMimeType() == "image/jpeg" || $image_file->getMimeType() == "image/png") {

                    Post::create($post_data);

                    $image_file->storeAs('images/posts', $new_image_file);
//                $image_file->move('uploads/images/users/', $new_file_name);

                    $this->showMessage('success','Success, Post has been Created!');
                    return redirect()->route('posts.index');

                } else {
//                Session::flash('ErrorMsg', 'Invalid Image file!');
                    $this->showMessage('danger','Error, Invalid Image file!');
                    return redirect()->back();
                }
            }

        } catch (\Exception $e) {
//            Session::flash('ErrorMsg', 'Invalid Image file!');
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
        $post_id = base64_decode($id);

        $post = Post::with('category', 'user')->find($post_id);

        return $post;

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
        $post_id = base64_decode($id);
        $post_edit_data = Post::find($post_id);

//        return $post_edit_data;

        $categories = Category::select('id','name')->orderBy('id', 'asc')->get();

        return view('backsite.admin.post.edit-form', compact('post_edit_data', 'categories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        //
//        echo $post_data_update->image;


//        $request->validate([
//            'title' => 'required|max:100',
//            'desc' => 'required',
//            'image' => 'image',
//            'status' => 'required',
//
//        ], [
//            'title.required' => 'Post title field must be filled out!',
//            'title.max' => 'Post title must be less than 100 Character\'s!',
//            'image.images' => 'Image file must be png,jpeg/jpg extension!',
//            'status.required' => 'Status field option must be selected!',
//
//        ]);

        //        return base64_decode($id);
        $post_id = base64_decode($id);

        $post_old_data = Post::find($post_id);


            try {

                $image_file = $request->file('image');
                $image_file_ext = $image_file->getClientOriginalExtension();

                $new_image_file  = rand(9999, 99999)."_".date("Ymdhis")."_".rand(9999, 99999).".".$image_file_ext;

//              echo $new_file_name;

//              return $image_file->getMimeType();

                if(isset($image_file)) {
                    if($image_file->isValid()) {
                        if($image_file->getMimeType() == "image/jpeg" || $image_file->getMimeType() == "image/png") {
                            Storage::disk('public')->delete('/images/posts/'.$post_old_data->image);

                            $post_update_data = [
                                'user_id' => auth()->user()->id,
                                'cat_id' => $request->cat_id,
                                'title' => $request->title,
                                'desc' => $request->desc,
                                'image' => $new_image_file,
                                'status' => $request->status,
                            ];

                        $post_old_data->update($post_update_data);

//                $post_old_data->cat_id = $request->cat_id;
//                $post_old_data->title = $request->title;
//                $post_old_data->desc = $request->desc;
//                $post_old_data->image = $request->image;
//                $post_old_data->status = $request->status;

                        if($post_old_data) {

                            $image_file->storeAs('images/posts', $new_image_file);
//                      $image_file->move('uploads/images/users/', $new_file_name);

                            $this->showMessage('success','Success, Post has been Updated with image file.');
                            return redirect()->route('posts.index');

                        } else {
                            $this->showMessage('danger','Error, Post has not been Updated!');
                            return redirect()->back();
                        }

                    } else {
                        $this->showMessage('danger','Error, this is not an image file!');
                        return redirect()->back();
                    }

                } else {
                    $this->showMessage('danger','Error, Invalid Image file!');
                    return redirect()->back();
                }



                } else {
                    if(!isset($request->image)) {
                        $post_old_data->update( [
                            'user_id' => auth()->user()->id,
                            'cat_id' => $request->cat_id,
                            'title' => $request->title,
                            'desc' => $request->desc,
                            'image' => $post_old_data->image,
                            'status' => $request->status,

                        ]);

                        if($post_old_data) {

                            $this->showMessage('success','Success, Post has been Updated without Image file!');
                            return redirect()->route('posts.index');

                        }

                    }


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
        $post_id = base64_decode($id);
        $post_delete = Post::find($post_id);

        unlink(public_path('uploads/images/posts/'.$post_delete->image));

        $post_delete->delete();

        $this->showMessage('success','Success, Post has been Deleted.');
        return redirect()->route('posts.index');
    }


}
