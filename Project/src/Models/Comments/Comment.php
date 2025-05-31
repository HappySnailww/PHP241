<?php 

namespace src\Models\Comments;
use src\Models\ActiveRecordEntity;
use src\Models\Users\User;

class Comment extends ActiveRecordEntity
{
    protected $text;
    protected $authorId;
    protected $articleId;


    public function getText(): string{
        return $this->text;
    }

    public function getArticleId(): int {
        return $this->articleId;
    }

    public function getAuthorId(): User{
        return User::getById($this->authorId);
    }


    public function setText(string $text): void{
        if (empty($text)) {
            throw new \Exception('Текст комментария не может быть пустым');
        }
        $this->text = htmlspecialchars($text);
    }

    public function setAuthorId(int $authorId): void{
        $this->authorId = $authorId;
    }

    public function setArticleId(int $articleId): void{
        $this->articleId = $articleId;
    }
    protected static function getTableName(): string{
        return 'comments';
    }

    public static function create(string $text, int $authorId, int $articleId): self
    {
        $comment = new self();
        $comment->setText($text);
        $comment->setAuthorId($authorId);
        $comment->setArticleId($articleId);
        return $comment;
    }
}