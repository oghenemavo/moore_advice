<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Admin Dashboard';
        $data['videos'] = Media::where('type', 'video')->get();
        $data['banners'] = Media::where('type', 'banner')->get();
        $data['logos'] = Media::where('type', 'logo')->get();
        $data['tables1'] = Table::where('type', 'table1')->get();
        $data['tables2'] = Table::where('type', 'table2')->get();
        $data['tables3'] = Table::where('type', 'table3')->get();
        return view('admin.dashboard.home', $data);
    }

    public function template()
    {
        $data['page_title'] = 'Admin Template';
        $data['videos'] = Media::where('type', 'video')->get();
        $data['banners'] = Media::where('type', 'banner')->get();
        $data['logos'] = Media::where('type', 'logo')->get();
        $data['tables1'] = Table::where('type', 'table1')->get();
        $data['tables2'] = Table::where('type', 'table2')->get();
        $data['tables3'] = Table::where('type', 'table3')->get();
        return view('admin.dashboard.template', $data);
    }

    public function deleteMedia(Request $request, Media $media, $type='video')
    {
        File::delete("$type/". $media->content);
        $media->delete();
        return back()->with('success', 'successfully deleted media');
    }

    public function addVideo(Request $request)
    {
        $rules = [
            'video' => 'required|mimes:mp4',
        ];

        $request->validate($rules);
        if ($request->hasfile('video')) {
            $inventory = $request->file('video');
            $name = 'video_' . time() . '.' . $inventory->extension();

            $inventory->move(public_path('/video'), $name);

            $result =  Media::create([
                // 'user_id' => auth()->user()->id,
                'type' => 'video',
                'content' => $name,
            ]);

            if ($result) {
                return back()->with('success', 'new video added');
            }
        }
    }

    public function addImage(Request $request, $type = 'banner')
    {
        $rules = [
            'image' => 'required|image',
        ];

        $request->validate($rules);
        if ($request->hasfile('image')) {
            $inventory = $request->file('image');
            $name = 'image_' . time() . '.' . $inventory->extension();

            $inventory->move(public_path('/image'), $name);

            $result =  Media::create([
                // 'user_id' => auth()->user()->id,
                'type' => $type,
                'content' => $name,
            ]);

            if ($result) {
                return back()->with('success', 'new image added');
            }
        }
    }

    public function addTable(Request $request, $type = 'table1')
    {
        $rules = [
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
        ];
        $request->validate($rules);
        $data = $request->all();
        $data['type'] = $type;
        Table::create($data);
        return back()->with('success', 'successfully added row');
    }

    
    public function editImage(Request $request, Media $media)
    {
        $rules = [
            'image' => 'required|image',
        ];

        $request->validate($rules);
        if ($request->hasfile('image')) {
            $inventory = $request->file('image');
            $name = 'image_' . time() . '.' . $inventory->extension();

            $inventory->move(public_path('/image'), $name);

            $media->content = $name;
            $result = $media->save();

            if ($result) {
                return back()->with('success', 'new image added');
            }
        }
    }

    
    public function editVideo(Request $request, Media $media)
    {
        $rules = [
            'video' => 'required|mimes:mp4',
        ];

        $request->validate($rules);
        if ($request->hasfile('video')) {
            $inventory = $request->file('video');
            $name = 'video_' . time() . '.' . $inventory->extension();

            $inventory->move(public_path('/video'), $name);

            $media->content = $name;
            $result = $media->save();

            if ($result) {
                return back()->with('success', 'new video added');
            }
        }
    }

}
