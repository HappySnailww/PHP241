<?php

namespace src\Controllers;
use src\View\View;
use src\Models\Articles\Article;
use src\Models\Comments\Comment;
use src\Services\Db;

class ArticleController
{
    private $view;
    private $db;
    public function __construct()
    {
        $this->view = new View;
        $this->id = 1;
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('article/index', ['articles'=>$articles]);
    }

    public function show($id){
        $article = Article::getById($id);
        $comment = Comment::getByFildName('article_id', $article->getId());
            if ($article == []) 
        {
            $this->view->renderHtml('error/404', [], 404);
            return;
        }
        $this->view->renderHtml('article/show', ['article'=>$article, 'comments'=>$comment]);
    }

    public function edit($id){
        $article = Article::getById($id);
        $this->view->renderHtml('article/edit', ['article'=>$article]);
    }

    public function update($id){
        $article = Article::getById($id);
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->save();
        return header('Location:http://localhost/all%20php/Project/www/article/'.$article->getId());
    }

    public function create(){
        $this->view->renderHtml('article/create');
    }

    public function store(){
        $article = new Article;
        $article->title = $_POST['title'];
        $article->text = $_POST['text'];
        $article->authorId = 1;
        $article->save();
        return header('Location:http://localhost/all%20php/Project/www/index.php');
    }

    public function delete(int $id){
        $article = Article::getById($id);
        $comments = Comment::getByFildName('article_id', $id);
        foreach ($comments as $comment) {
            $comment->delete($comment->getId());
        }
        $article->delete($id);
        return header('Location:http://localhost/all%20php/Project/www/index.php');
    }

    public function setAuthorId(string $authorId) {
        $this->authorId = $authorId;
    }

    public function setArticleId(string $articleId) {
        $this->articleId = $articleId;
    }
}