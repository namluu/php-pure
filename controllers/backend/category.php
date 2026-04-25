<?php
function category_page(): void
{
    check_authentication();
    $categories = get_categories();
    require 'templates/backend/category.php';
}

function category_new(): void
{
    check_authentication();

    if (isset($_POST['title'])) {
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ];
        if (save_category($data)) {
            header("Location: /backend/category");
        }
    }

    require 'templates/backend/category_new.php';
}

function category_edit($id): void
{
    check_authentication();

    if (isset($_POST['id'])) {
        $data = [
            'title' => $_POST['title'],
            'content' => $_POST['content'],
        ];
        if (update_category($data, $id)) {
            header("Location: /backend/category");
        }
    }

    $category = get_category($id);
    require 'templates/backend/category_edit.php';
}

function category_delete($id): void
{
    check_authentication();

    if (delete_category($id)) {
        header("Location: /backend/category");
    }

    header("Location: /backend/category");
}