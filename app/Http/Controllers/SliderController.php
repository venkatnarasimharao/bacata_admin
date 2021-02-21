<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider = Slider::orderBy('created_at', 'desc')->get();
        return view('admin.slider.index', compact('slider'));
    }
    public function slider_show()
    {
        $slider = Slider::first();
        return view('admin.slider', compact('slider'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Slider a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'title' => 'required',
          'heading' => 'required',
          'image' => 'required|image|mimes:jpg,jpeg,png',
          'link' => 'required',
        ]);

        $input = $request->all();

        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images/slider', $name);
            $input['image'] = $name;
        }

        Slider::create($input);

        flash('Banner has been added')->success();
        return redirect('admin/slider')->with('updated', 'Banner has been updated');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $Social
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }
    public function slider_update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);
        $request->validate([
        'title' => 'required',
        'heading' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png',
        'link' => 'required|regex:#^https?://#',
      ]);
        // if ($request->is_image == 1) {
        //     $request->validate([
        //     'heading' => 'required',
        //     'subheading' => 'required',
        //     'image' => 'nullable|image|mimes:jpg,jpeg,png',
        //     'link' => 'required|regex:#^https?://#',
        //   ]);
        // }
        // else{
        //   $request->validate([
        //     'link' => 'required'
        //   ]);
        // }

        $input = $request->all();

        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            if ($slider->image != '' && $slider->image != null) {
                //  unlink(public_path() . '/images/slider' . $slider->image);
            }
            $file->move('images/slider', $name);
            $input['image'] = $name;
        }

        if (!isset($input['is_parallax'])) {
            $input['is_parallax'] = 0;
        }
        if (!isset($input['is_overlay'])) {
            $input['is_overlay'] = 0;
        }
        // if (!isset($input['is_active']))
        // {
        //   $input['is_active'] = 0;
        // }

        $slider->update($input);

        return back()->with('added', 'Slider has been saved successfully');
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
        $request->validate([
        'title' => 'required',
        'heading' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png',
        'link' => 'required',
      ]);

        $slider = Slider::findOrFail($id);

        $input = $request->all();
        if (!isset($input['is_active'])) {
            $input['is_active'] = 0;
        }
        if ($file = $request->file('image')) {
            $name = time() . $file->getClientOriginalName();
            // if ($slider->image != '' && $slider->image != null) {
            //     //  unlink(public_path() . '/images/slider' . $slider->image);
            // }
            $file->move('images/slider', $name);
            $input['image'] = $name;
        }

        $slider->update($input);

        return redirect('admin/slider')->with('updated', 'Banner has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $Social
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        $slider->delete();

        flash('Slider has been deleted')->error();

        return back();
    }
    public function bulk_delete(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'checked' => 'required',
      ]);

        if ($validator->fails()) {
            return back()->with('deleted', 'Please select one of them to delete');
        }

        foreach ($request->checked as $checked) {
            $this->destroy($checked);
        }

        return back()->with('deleted', 'Slider has been deleted');
    }
}
