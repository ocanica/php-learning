<?php

class Post {
    public $title;
    public $author;
    public $published;

    public function __construct($title, $author, $published) 
    {
        $this->title = $title;
        $this->author = $author;
        $this->published = $published;
    }
}

$posts = [

    new Post('My First Post', 'Me', true), 
    new Post('My Second Post', 'Jack', true),
    new Post('My Third Post', 'Mark', true), 
    new Post('My Fourth Post', 'Chris', false)
];

// $unpublishedPosts = array_filter($posts, function ($post) {
//     return $post->published === false;
// });

// $publishedPosts = array_filter($posts, function($post) {
//     return $post->published === true;
// });

$post = array_map(function($post) {
    return (array) $post;
}, $posts);

$publishedPosts = array_filter($posts, function($post) {
    return $post->published === true;
});

$titles = array_column($posts, 'title');
$authors = array_column($posts, 'author', 'title');

$renderPosts = array_map(function($post) {
    return $post->title . ' by ' . $post->author;
}, $publishedPosts);

$unpublishedPosts = array_filter($posts, function($post) {
    return !$post->published;
});

$numberOfPublishedPosts = array_reduce($posts, function($post) {
    return $post->published;
}, $x = 0);

var_dump($numberOfPublishedPosts);