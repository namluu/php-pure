<?php
function post_page(): void
{
    check_authentication();
    $posts = get_posts();
    require 'templates/backend/post.php';
}

function post_new(): void
{
    check_authentication();

    if (isset($_POST['title'])) {
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'category_id' => $_POST['category_id'],
        ];
        if (save_post($data)) {
            header("Location: /backend/post");
        }
    }

    $categories = get_categories();

    require 'templates/backend/post_new.php';
}

