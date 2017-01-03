<?php

namespace App\Http\Controllers;

use App\Snippet;
use Illuminate\Http\Request;

class SnippetsController extends Controller
{

    /**
     * List all snippets
     * @return View
     */
    public function index()
    {
        $snippets = Snippet::latest()->get();
        return view('snippets.index', compact('snippets'));
    }

    /**
     * Display form to create new snippet
     * @return View
     */
    public function create(Snippet $snippet)
    {
        return view('snippets.create', compact('snippet'));
    }
    /**
     * Show single snippet
     * @return View
     */
    public function show(Snippet $snippet)
    {
        return view('snippets.show', compact('snippet'));
    }
    /**
     * Store new snippet
     * @return redirect home
     */
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        Snippet::create([
            'title' => request('title'),
            'body' => request('body'),
            'forked_id' => request('forked_id')
        ]);

        return redirect()->home();
    }
}
