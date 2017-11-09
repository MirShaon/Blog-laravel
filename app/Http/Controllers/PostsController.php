<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\Tag;
use App\Category;
use App\Post;


use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        if($categories->count() == 0)
        {
            Session::flash('info', 'You Must have Choose At least One Category');

            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories)
                                         ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title' => 'required',
            'featured' => 'required|image',
            'body' => 'required',
            'category_id'=> 'required',
             'tags'=>'required'
            

        ]);

        $featured = $request->featured;
        $featuerd_new = time().$featured->getClientoriginalName();
        $featured->move('uploads/posts', $featuerd_new);

        $post = Post::create([


                'title' => $request->title,
                'body' => $request->body,
                'featured' => 'uploads/posts/'. $featuerd_new,
                'category_id' => $request->category_id,
                'slug'=> str_slug($request->title),
                'user_id'=>Auth::id()


        ]);

          $post->tags()->attach($request->tags);


       Session::flash('success','Your post Created Succesfully');

       return redirect()->back();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);

        return view('admin.posts.edit')->with('posts',$posts)

                                       ->with('categories', Category::all())
                                       ->with('tags',Tag::all());
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
        

         $this->validate($request,[

            'title' => 'required',
            'body' => 'required',
            'category_id'=> 'required'
            

        ]);

        $posts = Post::find($id);

        if($request->hasfile('featured')){


        $featured = $request->featured;
        $featuerd_new = time().$featured->getClientoriginalName();
        $featured->move('uploads/posts', $featuerd_new);
        $posts->featured ='uploads/posts/'.$featuerd_new;

        }


         $posts->title = $request->title;
         $posts->body = $request->body;
         $posts->category_id = $request->category_id;
         $posts->save();
         $posts->tags()->sync($request->tags);

      
       Session::flash('success', 'You succesfully updated a Post.');
        return redirect()->route('posts');
       



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        Session::flash('success', 'You succesfully deleted a Post.');
        return redirect()->back();
    }

    public function trashed()
    {
 
       $posts = Post::onlyTrashed()->get();
      

       return view('admin.posts.trashed')->with('posts', $posts);

    }

    public function kill($id)
    {
       $posts = Post::withTrashed()->where('id',$id)->first();
       $posts->forceDelete();
       Session::flash('success', 'You succesfully deleted a Post Permanently.');
       return redirect()->back();
      
    }

    public function restore($id)

    {
        $posts = Post::withTrashed()->where('id',$id)->first();
        $posts->restore();
        Session::flash('success', 'You succesfully Restore a Post.');
        return redirect()->route('posts');


    }
}
