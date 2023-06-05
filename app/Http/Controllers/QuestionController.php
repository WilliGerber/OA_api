<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Alternative;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return response()->json($questions);
    }

    public function show($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        return response()->json($question);
    }

    public function save(Request $request)
    {
        $question = new Question;
        $question->title = $request->input('title');
        $question->tag = $request->input('tag');
        $question->level_id = $request->input('level_id');
        $question->subject_id = $request->input('subject_id');
        $question->isForm = $request->input('isForm');
        $question->question = $request->input('question');
        $question->save();

        return response()->json($question, 201);
    }

    public function update(Request $request, $id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        $question->title = $request->input('title');
        $question->tag = $request->input('tag');
        $question->level_id = $request->input('level_id');
        $question->subject_id = $request->input('subject_id');
        $question->isForm = $request->input('isForm');
        $question->question = $request->input('question');
        $question->save();

        return response()->json($question);
    }

    public function destroy($id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }
        $question->delete();

        return response()->json(['message' => 'Question deleted']);
    }

    // public function filterBySubjectId($subjectId)
    // {
    //     $questions = Question::where('subject_id', $subjectId)->get();
    //     return response()->json($questions);
    // }

    public function getQuestionsBySubjectId($subjectId)
    {
        $questions = Question::with('alternatives')->where('subject_id', $subjectId)->get();
        return response()->json($questions);
    }

    public function getQuestionAlternatives($questionId)
    {
        $question = Question::find($questionId);

        if (!$question) {
            return response()->json(['message' => 'Question not found'], 404);
        }

        $alternatives = Alternative::where('question_id', $questionId)->get();

        $question->alternatives = $alternatives;

        return response()->json($question);
    }
}
