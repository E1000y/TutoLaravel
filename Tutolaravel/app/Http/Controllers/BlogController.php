<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class BlogController extends Controller
{
    public function index() : LengthAwarePaginator{

        return Post::paginate(1);
     
    }

    public function show(string $slug, string $id) : Post{

    }
}
