<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Post::all();
        return view('post.index1', compact('rows'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add1');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'post_date' => 'bail|required|unique:tb_post',
                'post_slug' => 'required',
                'post_title' => 'required',
                'post_text' => 'required'
            ],
            [
                'post_date.required' => 'Date wajib diisi',
                'post_date.unique' => 'Date sudah ada',
                'post_slug.required' => 'Slug wajib diisi',
                'post_title.required' => 'Title wajib diisi',
                'post_text.required' => 'Text wajib diisi'
            ]
        );

        Post::create([
            'post_date' => $request->post_date,
            'post_slug' => $request->post_slug,
            'post_title' => $request->post_title,
            'post_text' => $request->post_text
        ]);

        return redirect('/post');
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
        $row = Category::findOrFail($id);
        return view('category.edit', compact('row'));
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
        $request->validate(
            [
                'category_name' => 'bail|required',
                'category_text' => 'required'
            ],
            [
                'category_name.required' => 'NAME wajib diisi',
                'category_text.required' => 'TEXT wajib diisi'
            ]
        );

        $row = Category::findOrFail($id);
        $row->update([
            'category_name' => $request->category_name,
            'category_text' => $request->category_text
        ]);

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Category::findOrFail($id);
        $row->delete();

        return redirect('/Category');
    }
}
