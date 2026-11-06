<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Membandingkan lazy loading (N+1 problem) dengan eager loading.
     *
     * Lazy loading: 1 query untuk mengambil semua post:
     *   SELECT * FROM posts;
     * lalu N query (satu per post) saat $post->comments diakses di dalam loop:
     *   SELECT * FROM comments WHERE post_id = 1;
     *   SELECT * FROM comments WHERE post_id = 2;
     *   ...
     * Total query = 1 + N.
     *
     * Eager loading: cukup 2 query berapa pun jumlah post-nya:
     *   SELECT * FROM posts;
     *   SELECT * FROM comments WHERE post_id IN (1, 2, 3, ...);
     */
    public function index(): View
    {
        DB::enableQueryLog();

        // Lazy loading: komentar baru di-query saat diakses di dalam loop
        $lazyPosts = $this->formatPosts(Post::all());
        $lazyQueries = DB::getQueryLog();

        DB::flushQueryLog();

        // Eager loading: komentar sudah dimuat sekaligus sebelum loop
        // FULL CIRCLE JOIN
        $eagerPosts = $this->formatPosts(Post::with('comments')->get());
        $eagerQueries = DB::getQueryLog();
        // 
        return view('post.index', [
            'hasil' => [
                'Lazy Loading' => [
                    'posts' => $lazyPosts,
                    'jumlahQuery' => count($lazyQueries),
                    'daftarQuery' => array_column($lazyQueries, 'query'),
                ],
                'Eager Loading' => [
                    'posts' => $eagerPosts,
                    'jumlahQuery' => count($eagerQueries),
                    'daftarQuery' => array_column($eagerQueries, 'query'),
                ],
            ],
        ]);
    }

    /**
     * Ubah koleksi post menjadi array untuk ditampilkan di view.
     *
     * @param  Collection<int, Post>  $posts
     * @return array<int, array{id: int, title: string, jumlah_komentar: int, komentar: \Illuminate\Support\Collection<int, string>}>
     */
    private function formatPosts(Collection $posts): array
    {
        $data = [];
        foreach ($posts as $post) {
            $data[] = [
                'id' => $post->id,
                'title' => $post->title,
                // Jika relasi belum dimuat, akses ini menjalankan 1 query baru
                'jumlah_komentar' => $post->comments->count(),
                'komentar' => $post->comments->pluck('body'),
            ];
        }

        return $data;
    }
}
