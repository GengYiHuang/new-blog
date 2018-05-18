<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Post;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->with('user')->get();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $post = Post::create([
            'uid' => Auth::id(),
            'title' => $request->title ?: '',
            'body' => $request->body ?: '',
            'image_path' => '',
        ]);

        $id = $post->id;
        
        if ($files = $request->file('images')) {
            foreach ($files as $key => $file) {
                $type = explode('/', $file->getClientMimeType())[1];   //mimetype ex:image/png, video/mp4
                $name = '/image/'.$id.'-'.($key + 1).'.'.$type;
                $file->move('image', $name);
                $images[] = $name;
            }
            Post::find($id)->update([
                'image_path' => json_encode($images),
            ]);
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        // dd($post);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post' => $post]);
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
        $post = Post::find($id);
        $imgs = $post->image_path;
        $files = $request->file('images');

        if ($files = $request->file('images')) {
            if($imgs) {
                foreach(json_decode($imgs) as $img) {
                    unlink('.'.$img);
                }
            }
            foreach($files as $key => $file) {
                $type = explode('/', $file->getClientMimeType())[1];   //mimetype ex:image/png, video/mp4
                $name = '/image/'.$id.'-'.($key + 1).'.'.$type;
                $file->move('image', $name);
                $images[] = $name;
            }
            Post::find($id)->update([
                'image_path' => json_encode($images),
            ]);
        }

        Post::find($id)->update([
            'title' => $request->title ?: '',
            'body' => $request->body ?: '',
        ]);

        return redirect()->route('post.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $imgs = $post->image_path;
        if($imgs) {
            foreach(json_decode($imgs) as $img) {
                unlink('.'.$img);
            }
        }
        Post::find($id)->delete();
        return redirect()->route('post.index');
    }
}
