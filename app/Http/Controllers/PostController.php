<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index');
    }

    public function datatable()
    {
        $posts = Post::latest()->get();
        return DataTables::of($posts)
            ->editColumn('published', function ($post) {
                return $post->published ? 'Yes' : 'No';
            })
            ->addColumn('action', function ($post) {
                return view('posts.partials.table-action', ['post' => $post]);
            })
            ->make(true);
    }

    public function factory(Request $request, $count)
    {
        Log::debug('ProductController@factory', [
            'count' => $count
        ]);

        Post::factory()->count($count)->create();

        $request->session()->flash('success', __('Posts generated'));
        return redirect()->route('posts.index');
    }
}
