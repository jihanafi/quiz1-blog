<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Category::all();
        return view('category.index', compact('rows')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
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
                'category_name' => 'bail|required|unique:tb_category',
                'category_text' => 'required'
            ],
            [
                'category_name.required' => 'NAME wajib diisi',
                'category_name.unique' => 'NAME sudah ada',
                'category_text.required' => 'TEXT wajib diisi'
            ]
        );

        Category::create([
            'category_name' => $request->category_name,
            'category_text' => $request->category_text
        ]);

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

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
