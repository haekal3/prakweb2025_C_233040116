<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::id());

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        return view('dashboard.index', [
            'posts' => $posts->latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt'     => 'nullable',
            'body'        => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Generate slug unik
        $slug = Str::slug($request->title);
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        // Upload Image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        // Auto excerpt
        $excerpt = $request->excerpt ?? Str::limit(strip_tags($request->body), 200);

        Post::create([
            'title'       => $request->title,
            'slug'        => $slug,
            'category_id' => $request->category_id,
            'excerpt'     => $excerpt,
            'body'        => $request->body,
            'image'       => $imagePath,
            'user_id'     => Auth::id(),
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('dashboard.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title'       => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt'     => 'nullable',
            'body'        => 'required',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update slug jika title berubah
        $slug = $post->slug;
        if ($request->title !== $post->title) {
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $count = 1;

            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $originalSlug . '-' . $count++;
            }
        }

        // Update image
        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $imagePath = $request->file('image')->store('post-images', 'public');
        }

        $excerpt = $request->excerpt ?? Str::limit(strip_tags($request->body), 200);

        $post->update([
            'title'       => $request->title,
            'slug'        => $slug,
            'category_id' => $request->category_id,
            'excerpt'     => $excerpt,
            'body'        => $request->body,
            'image'       => $imagePath,
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('dashboard.index')->with('success', 'Post has been deleted!');
    }
}
