<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;
use App\News;
use App\Profile;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            $posts = News::where('title', $cond_title).orderBy('updated_at', 'desc')->get();
        } else {
            $posts = News::all()->sortByDesc('updated_at');
        }

        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        return view('news.index', ['headline' => $headline, 'posts' => $posts, 'cond_title' => $cond_title]);
    }
    public function profile(Request $request)
    {
        $cond_name = $request->cond_name;

        if ($cond_name != '') {
        $posts = Profile::where('name', $cond_name).orderBy('updated_at', 'desc')->get();
        } else {
            $posts = Profile::all()->sortByDesc('updated_at');
        }
        if (count($posts) > 0) {
            $person = $posts->shift();
        } else {
            $person = null;
        }
        return view('news.profile', ['person' => $person, 'posts' => $posts, 'cond_name' => $cond_name]);
    }
}
