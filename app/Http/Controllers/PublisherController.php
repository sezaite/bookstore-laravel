<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Validator;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        if ('title' == $request->sort){
            $publishers = Publisher::orderBy('title')->get();
        } else {
            $publishers = Publisher::all();
        }
        
        return view('publisher.index', ['publishers'=>$publishers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validator = Validator::make($request->all(),
        [
            'publisher_title' => ['required', 'min:3', 'max:64'],
        ],
        [
             'publisher_title.min' => 'Title is too short',
             'publisher_title.max' => 'Title is too long',
             'publisher_title.required' => 'Title is required'
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
      
    $publisher = new Publisher;
    $publisher->title = $request->publisher_title;
    $publisher->save();
    return redirect()->route('publisher.index')->with('success_message', 'Sėkmingai įrašyta.');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('publisher.edit', ['publisher' => $publisher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $validator = Validator::make($request->all(),
        [
            'publisher_title' => ['required', 'min:3', 'max:64'],
        ],
        [
             'publisher_title.min' => 'Title is too short',
             'publisher_title.max' => 'Title is too long',
             'publisher_title.required' => 'Title is required',
        ]
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
       $publisher->title = $request->publisher_title;
       $publisher->save();
       return redirect()->route('publisher.index')->with('success_message', 'Sekmingai pakeista.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        if($publisher->publisherBooks->count()){
            return redirect()->route('publisher.index')->with('info_message', 'Trinti negalima, nes turi knygų.');
        }
 
        $publisher->delete();
        return redirect()->route('publisher.index')->with('success_message', 'Sekmingai ištrinta.');
    }
}
