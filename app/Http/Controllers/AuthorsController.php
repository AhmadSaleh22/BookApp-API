<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorsResource;
use App\Http\Requests\AuthorsRequest;


class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return AuthorsResource::collection(Author::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        //
        $fake = \Faker\Factory::create(1);
        $Author = Author::create([
            'name' => $fake->name,
        ]);
        return new AuthorsResource($Author);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $Author)
    {
        return new AuthorsResource($Author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $Author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Author $Author)
    {
        //
        $Author->update([
            'name' => $request->input('name')
        ]);

        return new AuthorsResource($Author);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $Author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $Author)
    {
        //
        $Author->delete();
        return response(null, 204);
    }
}
