<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Learn;


class LearnController extends Controller
{
    public function index()
    {
        $questions = Learn::all();
        return response()->json($questions);
    }

    public function filterBySubjectId($subjectId)
    {
        $learns = Learn::where('subject_id', $subjectId)->get();
        return response()->json($learns);
    }

    public function getContentByLevelAndSubject($level_id, $subject_id)
    {
        $learns = Learn::where('level_id', $level_id)
                        ->where('subject_id', $subject_id)
                        ->get();

        return response()->json($learns);
    }

    public function show($id)
    {
        $learn = Learn::find($id);
        if (!$learn) {
            return response()->json(['message' => 'Content not found'], 404);
        }
        return response()->json($learn);
    }

    // public function save(Request $request)
    // {
    //     $question = new Question;
    //     $question->title = $request->input('title');
    //     $question->tag = $request->input('tag');
    //     $question->level_id = $request->input('level_id');
    //     $question->subject_id = $request->input('subject_id');
    //     $question->isForm = $request->input('isForm');
    //     $question->question = $request->input('question');
    //     $question->save();

    //     return response()->json($question, 201);
    // }

    // public function update(Request $request, $id)
    // {
    //     $question = Question::find($id);
    //     if (!$question) {
    //         return response()->json(['message' => 'Question not found'], 404);
    //     }
    //     $question->title = $request->input('title');
    //     $question->tag = $request->input('tag');
    //     $question->level_id = $request->input('level_id');
    //     $question->subject_id = $request->input('subject_id');
    //     $question->isForm = $request->input('isForm');
    //     $question->question = $request->input('question');
    //     $question->save();

    //     return response()->json($question);
    // }

    // public function destroy($id)
    // {
    //     $question = Question::find($id);
    //     if (!$question) {
    //         return response()->json(['message' => 'Question not found'], 404);
    //     }
    //     $question->delete();

    //     return response()->json(['message' => 'Question deleted']);
    // }
}
