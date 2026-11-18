<?php

namespace Tests\Feature;

use App\Support\ContentRepository;
use Tests\TestCase;

class WebsitePagesTest extends TestCase
{
    public function test_main_pages_can_be_opened(): void
    {
        foreach (['/', '/about', '/portfolio', '/blog', '/contact'] as $url) {
            $this->get($url)->assertOk();
        }
    }

    public function test_every_article_has_a_detail_page_and_invalid_slug_is_404(): void
    {
        foreach (app(ContentRepository::class)->articles() as $article) {
            $this->get('/blog/'.$article['slug'])->assertOk()->assertSee($article['title']);
        }

        $this->get('/blog/slug-yang-tidak-ada')->assertNotFound();
    }

    public function test_every_project_has_a_detail_page_and_invalid_slug_is_404(): void
    {
        foreach (app(ContentRepository::class)->projects() as $project) {
            $this->get('/portfolio/'.$project['slug'])->assertOk()->assertSee($project['title']);
        }

        $this->get('/portfolio/slug-yang-tidak-ada')->assertNotFound();
    }

    public function test_portfolio_and_blog_meet_the_minimum_dummy_data(): void
    {
        $this->get('/portfolio')->assertViewHas('projects', fn ($projects) => count($projects) >= 3);
        $this->get('/blog')->assertViewHas('articles', fn ($articles) => count($articles) >= 5);
    }

    public function test_portfolio_lists_the_two_live_projects(): void
    {
        $this->get('/portfolio')
            ->assertSee('https://tara-jr.com', false)
            ->assertSee('https://garudabersinar.com', false);
    }

    public function test_unknown_page_uses_the_custom_404_view(): void
    {
        $this->get('/halaman-yang-tidak-ada')
            ->assertNotFound()
            ->assertSee('Halaman tidak ditemukan');
    }
}
