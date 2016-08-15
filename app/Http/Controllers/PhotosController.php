<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Symfony\Component\Translation\Tests\Dumper\FileDumperTest;

//use Illuminate\Support\Facades\Input;

class PhotosController extends Controller {

    public function __construct() {
       $this->middleware('auth');
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $photos = Photo::with('gallery')->orderBy('gallery_id')->get();

        return view('photos.index', compact('photos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Get galleries options
        // Upgrade to 5.1 -> lists() now returns a Collection, so using all()
        // to return a plain array for now
        $galleries = Gallery::lists('name', 'id')->all();
        if ( empty($galleries))
        {
            return redirect('photos')->with('error', 'You must first create a gallery before adding any photos.');
        }

        return view('photos.create', compact('galleries'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
     * @return Response
	 */
	public function store(Request $request)
	{
        $file = $request->file('photo');
        if ( empty($file)) {
            return 'No photo.';
        }
        $filename = time() . '-' . $file->getClientOriginalName();
        $filesize = $file->getClientSize();
        $filetype = $file->getMimeType();
        if ( ! $filesize > 0) {
            return 'Photo is too big';
        }

        // Crop	& save with Intervention
        $image = Image::make($file);
        $carousel = $image;
        $thumbnail = $image;

        // Gallery photo
        $gallery = $image->resize(2000, null, function($constraint){
            $constraint->upsize();
            $constraint->aspectRatio();
        })->save(public_path() . '/galleryphotos/' . $filename);

        // Crop and resize for carousel
        $carousel = $carousel->fit(1140, 500, function($constraint){
            $constraint->upsize();
        })->save(public_path() . '/galleryphotos/carousel/' . $filename);

        $thumbnail = $thumbnail->fit(200, 150, function($constraint){
            $constraint->upsize();
        })->save(public_path() . '/galleryphotos/thumbnails/' . $filename);

        // This shows the uploaded image on the page
        //return $thumbnail->response('jpg');

        // Save to DB
        $photo = new Photo();
        $photo->filename = $filename;
        $photo->type = $filetype;
        $photo->size = $filesize;
        $photo->gallery_id = $request->get('gallery');
        $photo->carousel = $request->get('carousel') == '1' ? 1 : 0;
        $photo->save();

        return redirect('photos')->with('message', 'Photo was uploaded.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$photo = Photo::find($id);

        if (is_null($photo))
        {
            return redirect('photos');
        }

        return view('photos.show', compact('photo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$photo = Photo::findOrFail($id);

        // Get galleries options
        $galleries = Gallery::lists('name', 'id')->all();

        return view('photos.edit', compact('photo', 'galleries'));
	}

	/**
	 * Update the specified resource in storage.
	 *
     * @param Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$photo = Photo::findOrFail($id);
        $photo->gallery_id = $request->get('gallery');
        $photo->carousel = $request->get('carousel') == '1' ? 1 : 0;
        $photo->update();

        return redirect('photos')->with('message', 'Photo was updated.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        $photo = Photo::find($id);

        if (is_null($photo))
        {
            return redirect('photos');
        }

        // Delete from filesystem
        $deleted_from_gallery = File::delete(public_path() . '/galleryphotos/' . $photo->filename);
        $deleted_from_carousel = File::delete(public_path() . '/galleryphotos/carousel/' . $photo->filename);
        $deleted_from_thumbnails = File::delete(public_path() . '/galleryphotos/thumbnails/' . $photo->filename);

        // Delete from db
        if ( ! $photo->delete()) {
            return "Unable to delete from database";
        }

        return redirect('photos')->with('message', 'Photo ' . $photo->filename . ' was deleted.');

	}

    /**
     * Show all the photos in the Carousel
     *
     * @return Response
     */
    public function carousel()
    {
        $photos = Photo::where('carousel', 1)->orderBy('carousel_display_order')->get();

        return view('photos.carousel', compact('photos'));
    }

    /**
     * Handle ajax post request to update display_order
     *
     * @param Request $request
     * @return string
     */
    public function postCarousel(Request $request)
    {
        $photo_ids = explode(',', $request->get('ids'));
        $sort_order_counter = 1;
        foreach ($photo_ids as $id) {
            $id = intval($id);
            if (!empty($id)) {
                $photo = Photo::find($id);
                $photo->carousel_display_order = $sort_order_counter;
                $photo->save();

                $sort_order_counter++;
            }
        }

        return 'true';
    }

}
