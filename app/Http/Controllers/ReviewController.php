<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        try {
            $subjects = Review::orderBy('id', 'desc')->paginate(10)->load('classes');
            // dd($subjects);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return view('admin.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('admin.subjects.create');
    }

    public function edit($id)
    {
        try {
            $subject = Review::find($id);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return view('admin.subjects.edit', compact('subject'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        try {
            $subject = Review::create($request->all());
            $subject->classes()->sync($request->classes);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        return to_route('subjects.index')->with('success', 'Class created successfully');
    }

    public function update(Request $request)
    {
        try {
            $subject = Review::find($request->id);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }

        $request->validate(['id' => 'required']);

        try {
            $subject->update($request->all());
            $subject->classes()->sync($request->classes);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }


        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully');
    }

    public function delete($id)
    {
        try {
            Review::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
        return to_route('subjects.index')->with('success', 'Subject deleted successfully');
    }
}