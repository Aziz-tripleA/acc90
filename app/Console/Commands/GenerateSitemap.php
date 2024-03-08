<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Add static pages (e.g., about-us, contact-us)
        $sitemap->add(Url::create('/about-us'));
        $sitemap->add(Url::create('/contact-us'));
        $sitemap->add(Url::create('/counseling-services'));
        $sitemap->add(Url::create('/articles'));
        $sitemap->add(Url::create('/learning-materials'));
        $sitemap->add(Url::create('/living-testimony'));
        $sitemap->add(Url::create('/advertisements'));
        $sitemap->add(Url::create('/request-counseling-session'));
        $sitemap->add(Url::create('/donate'));

        // Add dynamic URLs (e.g., articles)
        $articles = \App\Models\Article::all();
        foreach ($articles as $article) {
            $sitemap->add(Url::create("/articles/{$article->slug}"));
        }
        $books = \App\Models\Book::all();
        foreach ($books as $book) {
            $sitemap->add(Url::create("/books/{$book->slug}"));
        }

        $courses = \App\Models\Course::all();
        foreach ($courses as $course) {
            $sitemap->add(Url::create("/learning-materials/{$course->slug}"));
        }

        // Write the sitemap to a file
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
