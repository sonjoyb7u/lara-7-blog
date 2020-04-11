<?php

namespace App\Http\Controllers\Backsite\Slider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Storage;
use Exception;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'asc')->paginate(4);

//        dd($posts);
//        return $posts;

        return view('backsite.admin.slider.manage', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backsite.admin.slider.create-form', compact('sliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {

        $image_file = $request->file('image');
        $image_file_ext = $image_file->getClientOriginalExtension();

        $new_image_file  = rand(9999, 99999)."_".date("Ymdhis")."_".rand(9999, 99999).".".$image_file_ext;
//        echo $new_file_name;

//        return $image_file->getMimeType();

        try {

            $slider_data = [
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $new_image_file,
                'link' => $request->link,
                'status' => $request->status,

            ];

//            dd($slider_data);


            if($image_file->isValid()) {

                if($image_file->getMimeType() == "image/jpeg" || $image_file->getMimeType() == "image/png") {

                    Slider::create($slider_data);

                    $image_file->storeAs('images/sliders', $new_image_file);
//                $image_file->move('uploads/images/users/', $new_file_name);

                    $this->showMessage('success','Success, Slider has been Created!');
                    return redirect()->route('sliders.index');

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
        $slider_id = base64_decode($id);

        $slider = Post::find($slider_id);

        return $slider;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider_id = base64_decode($id);
        $slider_edit_data = Slider::find($slider_id);

//        return $Slider_edit_data;

        return view('backsite.admin.slider.edit-form', compact('slider_edit_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slider_id = base64_decode($id);

        $slider_old_data = Slider::find($slider_id);

        try {
            $image_name = $request->file('image');

            if(isset($image_name)) {
                $image_file_ext = $image_name->getClientOriginalExtension();
                $new_image_name = rand(9999, 99999) . '_' . date('dmyHis'). '_' . rand(9999, 99999) . '.' . $image_file_ext;

                $image_name_type = $image_name->getMimeType();

                if($image_name->isValid()) {
                    if($image_name_type == "image/jpeg" || $image_name_type == "image/png") {
                        unlink(public_path('uploads/images/sliders/'.$slider_old_data->image));
//                        Storage::disk('public')->delete('/images/sliders/'.$slider_old_data->image);

                        $slider_update_data = [
                            'title' => $request->title,
                            'desc' => $request->desc,
                            'image' => $new_image_name,
                            'link' => $request->link,
                            'status' => $request->status,
                        ];

                        $slider_update = $slider_old_data->update($slider_update_data);

                        if($slider_update) {

                            $image_name->storeAs('images/sliders', $new_image_name);
//                      $image_file->move('uploads/images/users/', $new_file_name);

                            $this->showMessage('success','Success, Slider info has been Updated with image file.');
                            return redirect()->route('sliders.index');

                        } else {
                            $this->showMessage('danger','Error, Student Info has not been Updated!');
                            return redirect()->back();
                        }

                    } else {
                        $this->showMessage('danger','Error, This file type/extension is not valid!');
                        return redirect()->back();
                    }

                } else {
                    $this->showMessage('danger','Error, Invalid Image file!');
                    return redirect()->back();
                }



            } else {
                if(!isset($request->image)) {

                    $slider_update_data = [
                        'title' => $request->title,
                        'desc' => $request->desc,
                        'image' => $slider_old_data->image,
                        'link' => $request->link,
                        'status' => $request->status,

                    ];
                    $slider_update = $slider_old_data->update($slider_update_data);

                    if($slider_update) {
                        $this->showMessage('success','Success, Slider Info has been Updated without Image file!');
                        return redirect()->route('sliders.index');

                    }

                }


            }


        } catch (Exception $e) {
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
        //        return base64_decode($id);
        $slider_id = base64_decode($id);
        $slider_delete = Slider::find($slider_id);

        unlink(public_path('uploads/images/sliders/'.$slider_delete->image));

        $slider_delete->delete();

        $this->showMessage('success','Success, Slider has been Deleted.');
        return redirect()->route('sliders.index');
    }
}
