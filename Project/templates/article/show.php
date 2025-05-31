<?php require(dirname(__DIR__).'/header.php');?>
<div class="card mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getTitle();?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=$article->getAuthorId()->getNickname();?></h6>
    <p class="card-text"><?=$article->getText();?></p>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/edit" class="card-link">Article update</a>
    <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/article/<?=$article->getId();?>/delete" class="card-link">Article delete</a>
  </div>
</div>

<div class="card mt-4">
    <div class="card-body">
        <h5>Добавить комментарий</h5>
        <form action="<?=dirname($_SERVER['SCRIPT_NAME'])?>/comment/store" method="post">
            <input type="hidden" name="article_id" value="<?=$article->getId();?>">
            <textarea class="form-control mb-2" name="text" rows="3"></textarea>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</div>

<?php if (!empty($comments)): ?>
    <div class="card mt-4">
        <div class="card-body">
            <h5>Комментарии</h5>
            <?php foreach($comments as $comment): ?>
                <div class="border-bottom mb-3 pb-3">
                    <p><?=$comment->getText();?></p>
                    <div>
                        <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/comment/<?=$comment->getId();?>/edit" class="btn btn-sm btn-primary">Comment update</a>
                        <a href="<?=dirname($_SERVER['SCRIPT_NAME'])?>/comment/<?=$comment->getId();?>/delete" class="btn btn-sm btn-danger">Comment delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>


<?php require(dirname(__DIR__).'/footer.html');?>