<?php namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ShowGalleryRequest;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Symfony\Component\Security\Core\User\User;

class GalleriesController extends Controller {

    public function __construct() {
        //$this->middleware('auth');
        $this->middleware('auth', ['except' => 'show']);
    }


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$galleries = Gallery::all();
        return view('galleries.index', compact('galleries'));
	}

	/**
	 * Show the form for creating a new resource.
     * This is intended to create only a client gallery
     * accessible via a link token.
     * Public galleries will not be created by user.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('galleries.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
	public function store(Request $request)
	{
        $this->validate($request, Gallery::$rules);

        $gallery = new Gallery();
        $gallery->name = $request->get('name');
        $gallery->slug = Str::slug($request->get('name'));
        $gallery->link_token = str_random(10);
        $gallery->client = $request->get('type') == 'client' ? 1 : 0;

        $gallery->save();

        return redirect('galleries')->with('message', 'Gallery was created.');
	}

	/**
	 * Display a client gallery.
	 *
	 * @param  int  $link_token
	 * @return Response
	 */
	public function show($link_token)
	{
        $gallery = Gallery::findByLinkToken($link_token);

        // Get all photos in this gallery
        $photos = $gallery->photos;

        return view('galleries.show', compact('gallery', 'photos'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $gallery = Gallery::find($id);
        $photos = $gallery->photos();

        return view('galleries.edit', compact('gallery', 'photos'));
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
		$this->validate($request, Gallery::$rules);

        $gallery = Gallery::find($id);
        $gallery->name = $request->get('name');
        $gallery->slug = Str::slug($request->get('name'));
        $gallery->client = $request->get('type') == 'client' ? 1 : 0;

        $gallery->update();

        return redirect('galleries')->with('message', 'Gallery was updated.');
	}

    /**
     * Update gallery name inline with x-editable plugin
     *
     * @param Request $request
     * @param $id
     * @return string
     */
    public function updateAjax(Request $request, $id)
    {
        if ($name = $request->get('value'))
        {
            $this->validate($request, Gallery::$rules);
            $gallery = Gallery::findOrFail($id);
            $gallery->name = $name;
            $gallery->slug = Str::slug($name);

            $gallery->update();

            return 'true';
        }

        return 'false';
    }

    /**
     * Show the form for sorting photos in a gallery
     *
     * @param $id
     * @return Response
     */
    public function sort($id)
    {
        $gallery = Gallery::find($id);
        $photos = $gallery->photos;

        return view('galleries.sort', compact('gallery', 'photos'));
    }

    /**
     * Handle ajax post request to update display_order
     *
     * @param Request $request
     * @return string
     */
    public function postSort(Request $request)
    {
        $photo_ids = explode(',', $request->get('ids'));
        $sort_order_counter = 1;
        foreach ($photo_ids as $id) {
            $id = intval($id);
            if (!empty($id)) {
                $photo = Photo::find($id);
                $photo->display_order = $sort_order_counter;
                $photo->save();

                $sort_order_counter++;
            }
        }

        return 'true';
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$gallery = Gallery::find($id);

        $photos = $gallery->photos;
        $photos_ids_array = [];
        if (count($photos)) {
            foreach ($photos as $photo) {
                $photos_ids_array[] = $photo->id;

                File::delete(public_path() . '/galleryphotos/' . $photo->filename);
                File::delete(public_path() . '/galleryphotos/carousel/' . $photo->filename);
                File::delete(public_path() . '/galleryphotos/thumbnails/' . $photo->filename);

                //$photo->delete();
            }
            Photo::destroy($photos_ids_array);
        }

        $gallery->delete();

        return redirect('galleries')->with('message', $gallery->name . ' gallery was deleted.');
	}

}
