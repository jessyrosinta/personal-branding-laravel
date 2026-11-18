<?php

namespace App\Support;

/**
 * Sumber data konten untuk website.
 *
 * Konten dibaca dari file JSON di resources/data sehingga Controller tetap ramping
 * dan View tidak perlu tahu dari mana data berasal. Bila nanti ingin memakai
 * database, cukup ganti isi class ini dengan query Eloquent.
 */
class ContentRepository
{
    /**
     * @return array<int|string, mixed>
     */
    private function load(string $filename): array
    {
        $path = resource_path('data/'.$filename);

        if (! is_file($path)) {
            return [];
        }

        $decoded = json_decode(file_get_contents($path), true);

        return is_array($decoded) ? $decoded : [];
    }

    public function profile(): array
    {
        return $this->load('profile.json');
    }

    /**
     * Semua proyek, atau hanya satu jenis ("live" = sistem berjalan, "study" = studi kasus).
     */
    public function projects(?string $type = null): array
    {
        $projects = $this->load('projects.json');

        if ($type !== null) {
            $projects = array_filter($projects, fn (array $project): bool => $project['type'] === $type);
        }

        return array_values($projects);
    }

    public function project(string $slug): ?array
    {
        foreach ($this->projects() as $project) {
            if ($project['slug'] === $slug) {
                return $project;
            }
        }

        return null;
    }

    /**
     * Artikel terbaru lebih dulu.
     */
    public function articles(): array
    {
        $articles = $this->load('articles.json');

        usort($articles, fn (array $a, array $b): int => strcmp($b['date'], $a['date']));

        return $articles;
    }

    public function article(string $slug): ?array
    {
        foreach ($this->articles() as $article) {
            if ($article['slug'] === $slug) {
                return $article;
            }
        }

        return null;
    }

    /**
     * Daftar kategori artikel yang unik, untuk filter di halaman blog.
     *
     * @return array<int, string>
     */
    public function articleCategories(): array
    {
        return array_values(array_unique(array_column($this->articles(), 'category')));
    }

    /**
     * Artikel lain selain yang sedang dibaca, dipakai untuk bagian "Baca juga".
     */
    public function otherArticles(string $exceptSlug, int $limit = 2): array
    {
        $others = array_filter(
            $this->articles(),
            fn (array $article): bool => $article['slug'] !== $exceptSlug
        );

        return array_slice(array_values($others), 0, $limit);
    }
}
