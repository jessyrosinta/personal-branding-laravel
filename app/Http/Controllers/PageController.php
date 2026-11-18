<?php

namespace App\Http\Controllers;

use App\Support\ContentRepository;
use Illuminate\Contracts\View\View;

/**
 * Menyiapkan data untuk setiap halaman, lalu menyerahkannya ke View.
 *
 * Variabel $profile dan $liveProjects tersedia di semua View karena dibagikan
 * lewat View::share() di AppServiceProvider.
 */
class PageController extends Controller
{
    public function __construct(private readonly ContentRepository $content)
    {
    }

    public function home(): View
    {
        return view('pages.home', [
            'latestArticles' => array_slice($this->content->articles(), 0, 2),
        ]);
    }

    public function about(): View
    {
        return view('pages.about');
    }

    public function portfolio(): View
    {
        return view('pages.portfolio', [
            'projects' => $this->content->projects(),
        ]);
    }

    public function project(string $slug): View
    {
        $project = $this->content->project($slug);
        abort_if($project === null, 404);

        return view('pages.project', ['project' => $project]);
    }

    public function blog(): View
    {
        return view('pages.blog', [
            'articles' => $this->content->articles(),
            'categories' => $this->content->articleCategories(),
        ]);
    }

    public function article(string $slug): View
    {
        $article = $this->content->article($slug);
        abort_if($article === null, 404);

        return view('pages.article', [
            'article' => $article,
            'otherArticles' => $this->content->otherArticles($slug),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact');
    }
}
