<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Admin\Gallery\{StoreGalleryRequest,UpdateGalleryRequest};
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as ResizeImage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Admin\Gallery;
use App\Http\Controllers\Controller;
use File;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.page.gallery.index')->with('gallery',Gallery::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGalleryRequest $request)
    {
        // dd($request->all());
        if($request->hasFile('gallery_image') && $request->file('gallery_image')->isValid()){
            $gallery_image = $request->file('gallery_image');
            $galleryImage = time().'-'.$gallery_image->getClientOriginalName();
            $sitelogopath = public_path('storage/gallery'); !is_dir($sitelogopath) &&  mkdir($sitelogopath, 0777, true);
            ResizeImage::make($request->file('gallery_image'))->resize(303, 287)->save($sitelogopath.'/'. $galleryImage);
        }
        Gallery::insert(['name' => $request->image_title, 'image' => $galleryImage,'status' => ($request->status =='1') ? 1 : 0,'created_at' => now(), 'updated_at' => now() ]);
        return redirect()->route('admin.manage-gallery.index')->withSuccess('Gallery Successfully Created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.page.gallery.edit')->with('gallery',Gallery::findOrFail($id));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGalleryRequest $request, string $id ,Gallery $gallery)
    {
        $Gallery = $gallery::findOrFail($id);
        if($request->hasFile('gallery_image') && $request->file('gallery_image')->isValid()){
            $image_pasth = public_path('storage/gallery'); !is_dir($image_pasth) &&  mkdir($image_pasth, 0777, true);
            $gallery_image = $request->file('gallery_image');
            $galleryImage = time().'-'.$gallery_image->getClientOriginalName();
             $this->deleteIamge($image_pasth.'/'.$Gallery->image);
            ResizeImage::make($request->file('gallery_image'))->resize(303, 287)->save($image_pasth.'/'. $galleryImage);
            }else{
            $galleryImage = $Gallery->image;
        }

        $gallery::findOrFail($id)->update(['name' => $request->image_title, 'image' => $galleryImage,'status' => ($request->status =='1') ? 1 : 0, 'updated_at' => now() ]);
        return redirect()->route('admin.manage-gallery.index')->withSuccess('Gallery Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id ,Gallery $gallery)
    {

        $gallery::findOrFail($id)->delete();
        return redirect()->route('admin.manage-gallery.index')->withSuccess('Gallery Successfully Deleted');


    }

    protected function deleteIamge($imagePath){
   if(File::exists($imagePath)) { File::delete($imagePath); return true;  }  return false;

    }
}