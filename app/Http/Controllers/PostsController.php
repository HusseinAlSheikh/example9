<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $posts = Post::orderBy('updated_at' ,'desc')->where('id' ,'<' , 200)->paginate(20);

        return view('blog.index' , compact('posts') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $request->validated();
     
        Post::create([
            'title' => $request->title ,
            'excerpt' => $request->excerpt ,
            'body' => $request->body ,
            'min_to_read' => $request->min_to_read ,
            'image_path' => $this->storeImage($request) ,
            'is_published' => $request->is_published ==='on' ,
        ]);

        return redirect()->route('blog.index');
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
        $post = Post::findOrFail($id);
        return view('blog.show' , ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.edit' , ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, $id)
    {
       
        $request->validated();

        Post::where('id' , $id)->update(
            [
                'title' => $request->title ,
                'excerpt' => $request->excerpt ,
                'body' => $request->body ,
                'min_to_read' => $request->min_to_read ,
                'image_path' => $request->image_path ,
                'is_published' => $request->is_published ==='on' ,
            ]
        );

        return redirect()->route('blog.index');

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
        Post::destroy($id);

        return redirect()->route('blog.index')->with('message' , 'Post has been deleted ');
    }


    private function storeImage($request){
        $newImageName = uniqid() .'-'.
                        $request->title. '.'.
                        $request->image->extension();
        return $request->image->move(public_path('images'),$newImageName);
    }
}
