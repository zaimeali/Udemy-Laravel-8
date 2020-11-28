<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    // it lets you recreate the dB structure by running all the migrations on each test run
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNoBlogPostsWhenNothingInDatabase()
    {
        $response = $this->get('/posts');

        $response->assertSeeText('No Post found');
    }

    public function testSee1BlogPostWhenThereIs1()
    {
        // Arrange
        $post = new BlogPost();
        $post->title = "Nice Test";
        $post->content = "Nice hogaya yr new content";
        $post->save();

        // Act
        $response = $this->get('/posts');

        //Assert
        $response->assertSeeText('Nice Test');
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Nice Test',
        ]);
    }

    public function testStoreValid()
    {
        $params = [
            'title' => 'Valid Title',
            'content' => 'At least 10 Characters',
        ];

        // For redirect there is a status 302
        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Your Post has been created successfully');
    }

    public function testStoreFail()
    {
        $params = [
            'title' => 'X',
            'content' => 'X',
        ];

        // For redirect there is a status 302
        $this->post('/posts', $params)
            ->assertStatus(302)
            ->assertSessionHas('errors');

        $messages = session('errors')->getMessages();
        $this->assertEquals($messages['title'][0], "The title must be at least 5 characters.");
        $this->assertEquals($messages['content'][0], "The content must be at least 10 characters.");
        // dd($messages->getMessages());
    }

    public function testUpdateValid()
    {
        // Arrange
        $post = new BlogPost();
        $post->title = "New Title";
        $post->content = "New Content";
        $post->save();

        $this->assertDatabaseHas('blog_posts', $post->getAttributes());

        $params = [
            'title' => 'Updated Title',
            'content' => 'Update Content',
        ];

        $this->put("/posts/{$post->id}", $params)
            ->assertStatus(302)
            ->assertSessionHas('status');

        // $this->put("/posts/{$post->id}", $params)
        //     ->assertStatus(302)
        //     ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Blog Post has been Updated Successfully');
        $this->assertDatabaseMissing('blog_posts', $post->getAttributes());
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Updated Title',
        ]);
    }

    public function testDelete()
    {
        // Arrange
        $post = new BlogPost();
        $post->title = "New Title";
        $post->content = "New Content";
        $post->save();

        $this->delete("/posts/{$post->id}")
            ->assertStatus(302)
            ->assertSessionHas('status');

        $this->assertEquals(session('status'), 'Post has been deleted successfully');
    }
}
