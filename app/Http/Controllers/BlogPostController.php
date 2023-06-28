<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()->orderBy('created_at', 'desc')->simplePaginate(1);
        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        if (auth()->user()) {
            return view('blog.create');
        } else {
            return view('welcome');
        }
    }


    public function store(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'bevezeto' => $request->bevezeto,
            'user_id' => $user->id,
        ]);

        return redirect('blog/' . $newPost->id);
    }

    public function show(BlogPost $blogPost)
    {
        return view('blog.show', [
            'post' => $blogPost,
            'comments' => $blogPost->comments()->orderBy('created_at', 'desc')->simplePaginate(1),
        ]);
    }


    public function edit(BlogPost $blogPost)
{
    if (auth()->user()) {
        $user = User::findOrFail(Auth::id());
        if ($user->id != $blogPost->user_id) {
            return redirect('/blog/' . $blogPost->id);
        }

        return view('blog.edit', [
            'post' => $blogPost,
        ]);
    } else {
        return view('welcome');
    }
}


    public function update(Request $request, BlogPost $blogPost)
    {
        $user = User::findOrFail(Auth::id());
        if ($user->id != $blogPost->user_id) {
            return redirect('/blog/' . $blogPost->id);
        }

        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body,
            'bevezeto' => $request->bevezeto,
        ]);

        return redirect('blog/' . $blogPost->id);
    }

    public function destroy(BlogPost $blogPost)
    {
        $user = User::findOrFail(Auth::id());
        if ($user->id != $blogPost->user_id) {
            return redirect('/blog/' . $blogPost->id);
        }
        $blogPost->delete();

        return redirect('/blog');
    }
}
