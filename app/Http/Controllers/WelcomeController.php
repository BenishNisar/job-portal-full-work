<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Discipline;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\UserThankYouMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class WelcomeController extends Controller
{

    public function index()
    {

        // Featured Blog
        $featuredBlog = Blog::find(6);


        // Latest Blogs
        $latestBlogs = Blog::where('id', '!=', 6)
            ->latest()
            ->take(3)
            ->get();



        // Blogs Section
        $blogs = Blog::with('category')
            ->where('status', 1)
            ->latest()
            ->take(3)
            ->get([
                'id',
                'slug',
                'title',
                'short_description',
                'featured_image',
                'author',
                'category_id',
                'status',
                'created_at',
                'date'
            ]);



        // Featured Jobs Section
        $featuredJobs = Job::where('status', 1)
            ->orderByDesc('posted_date')
            ->take(6)
            ->get();



        // Explore Sectors Section
        $sectors = Discipline::latest()
            ->take(8)
            ->get();



        return view("Home.welcome", compact(

            'featuredBlog',

            'latestBlogs',

            'blogs',

            'featuredJobs',

            'sectors'

        ));

    }





    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',

            'email' => 'required|email',

            'country' => 'required',

            'phone' => 'nullable',

            'message' => 'required|string',

        ]);



        if ($validator->fails()) {

            return response()->json([
                'errors' => $validator->errors()
            ], 422);

        }



        $contact = Contact::create([

            'name' => $request->name,

            'email' => $request->email,

            'country' => $request->country,

            'phone' => $request->phone,

            'message' => $request->message

        ]);



        Mail::to('test@gmail.com')
            ->queue(new ContactMail($contact));



        Mail::to($contact->email)
            ->send(new UserThankYouMail($contact->name));



        return response()->json([

            'message' => 'Contact submitted successfully.'

        ]);

    }

}
