<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Photo;
use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller {

    /**
     * Display the public home page
     *
     * @return Response
     */
    public function index()
    {
        $photos = Photo::where('carousel', 1)->orderBy('carousel_display_order', 'ASC')->get();

        return view('index', ['photos' => $photos, 'counter' => 0]);
    }

    /**
     * Display the public gallery page
     *
     * @return \Illuminate\View\View
     */
    public function gallery()
    {
        $galleries = Gallery::where('client', 0)->get();

        return view('gallery', compact('galleries'));
    }

    /**
     * Display the contact page and show the form
     *
     * @return Response
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * Handle contact form submission
     *
     * @param Request $request
     *
     * @return Response
     */
    public function postContactForm(Request $request)
    {
        // if honeypot field filled in, just return
        if ( ! $request->get('last-name') == '') {
            return view('contact');
        }

        // Custom error message to display the word 'message' instead of 'msg'
        $error_messages = array(
            'msg.required' => 'The message field is required.',
        );

        $rules =
            [
                'name'      => 'required',
                'email'     => 'required|email',
                'subject'   => 'required',
                'msg'       => 'required'
            ];

        $validator = Validator::make($request->all(), $rules, $error_messages);

        if ($validator->fails())
        {
            return redirect('contact')->withInput()->withErrors($validator)->with('error', 'There was a validation error.');
        }

        // Send the email with the emails/contact view and user input
        $sent = Mail::send('emails.contact', $request->all(), function($message){
            $message->to('morgan.davison@gmail.com')
                    ->subject('Contact Form')
                    ->from('info@chestertownbuilders.com');
        });

        if ( ! $sent)
        {
            return redirect('contact')->with('error', "I'm sorry, the contact form is experiencing a problem. Please try again later.");
        }

        return redirect('contact')->with('message', 'Thank you! Your email has been sent.');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
