<?php

return [

    '~^$~'=>[src\Controllers\ArticleController::class, 'index'],
    '~article/(\d+)/edit~'=>[src\Controllers\ArticleController::class, 'edit'],
    '~article/(\d+)/update~'=>[src\Controllers\ArticleController::class, 'update'],
    '~^article/(\d+)$~'=>[src\Controllers\ArticleController::class, 'show'],
    '~^article/(\d+)/delete$~'=>[src\Controllers\ArticleController::class, 'delete'],
    '~^article/create$~'=>[src\Controllers\ArticleController::class, 'create'],
    '~^article/store$~'=>[src\Controllers\ArticleController::class, 'store'],

    '~^comment/store$~' => [src\Controllers\CommentController::class, 'store'],
    '~^comment/(\d+)/edit$~' => [src\Controllers\CommentController::class, 'edit'],
    '~^comment/(\d+)/update$~' => [src\Controllers\CommentController::class, 'update'],
    '~^comment/(\d+)/delete$~' => [src\Controllers\CommentController::class, 'delete'],

    '~^hello/(.+)$~'=>[src\Controllers\MainController::class,'sayHello'],
];