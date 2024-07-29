<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('dashboard.question', compact('questions'));
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
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'question' => 'required|max:50',
            'answer' => 'required|max:200',
        ], [
            'required.question' => 'Pertanyaan Tidak Boleh Kosong Banyak',
            'required.answer' => 'Jawaban Tidak Boleh Kosong',
            'max.question' => 'Pertanyaan Tidak Boleh Lebih Dari 50 karakter',
            'max.answer' => 'Pertanyaan Tidak Boleh Lebih Dari 200 karakter'
        ]);

        Question::create($credentials);
        return redirect('/Questions')->with('success', 'Berhasil Menambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, $id)
    {
        $credentials = $request->validate([
            'question' => 'required|max:50',
            'answer' => 'required|max:200',
        ], [
            'required.question' => 'Pertanyaan Tidak Boleh Kosong Banyak',
            'required.answer' => 'Jawaban Tidak Boleh Kosong',
            'max.question' => 'Pertanyaan Tidak Boleh Lebih Dari 50 karakter',
            'max.answer' => 'Pertanyaan Tidak Boleh Lebih Dari 200 karakter'
        ]);

        Question::findOrFail($id)->update($credentials);
        return redirect('/Questions')->with('success', 'Berhasil Mengupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect('/Questions');
    }
}
