<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Post;

class PostTest extends TestCase
{
    public function test_set_name_in_lowercase()
    {
        $post = new Post;
        $post->name = "Proyecto de PHP";

        $this->assertEquals("proyecto de php", $post->name);
    }

    public function test_get_slug()
    {
        $post = new Post;
        $post->name = "Proyecto de PHP";

        $this->assertEquals("proyecto-de-php", $post->slug);
    }
}
