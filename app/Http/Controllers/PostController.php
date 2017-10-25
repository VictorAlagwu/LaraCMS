<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use App\Post; 
use App\Category;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    public function post($id){
        $post = Post::findOrFail($id);
        $categories = Category::all();
        return view('post', compact('post','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();
        $categories = array_map('ucfirst', $categories);
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {
        //

         $input = $request->all();
         $user = Auth::user();
       //  $user_id = $user->id ;
     if($file = $request->file('photo_id')){
            $name = time().$file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file_path'=>$name]);
            $input['photo_id'] = $photo->id;


        }
        $user->posts()->create($input);
         return redirect('/admin/post');
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
        //
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name','id')->all();
        $categories = array_map('ucfirst', $categories);

        return view('admin.posts.edit',compact('post','categories'));
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
      
       $post = Post::findOrFail($id);
       $input = $request->all();
       $user = Auth::user();
        if ($file =$request->file('photo_id')) {
           $name = time().$file->getClientOriginalName();
           $file->move('images',$name);
           $photo = Photo::create(['file_path'=>$name]);

           $input['photo_id'] = $photo->id;
        }
        $post->update($input);
        return redirect('/admin/post');
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
        $post = Post::findOrFail($id)->destroy($id);
        return redirect('/admin/post');
    }
}
