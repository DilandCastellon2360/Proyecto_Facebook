<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\Post;

class PdfController extends Controller
{
    public function generateUsersPdf()
    {
        $users = User::all();

        $pdf = PDF::loadView('pdf.users', compact('users'));

        return $pdf->download('users.pdf');
    }

    public function generatePostsPdf()
    {
        $posts = Post::with('user')->get();

        $pdf = PDF::loadView('pdf.posts', compact('posts'));

        return $pdf->download('posts.pdf');
    }
}
