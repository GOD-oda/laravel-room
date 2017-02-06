$(document).ready(function() {
    // 記事削除
    $('.delete-btn').on('click', function() {
        if (confirm("本当に削除しますか？")) {
            submit();
        } else {
            return false;
        }
    });

    // アラートはスライドさせて非表示にする
    $('.alert').delay(3000).slideUp(300);

    // タグ削除
    $('.delete-tag').on('click', function() {
        var article_id = $(this).data('article_id');
        var tag_name = $(this).data('tag_name');
        var target_url = $(this).data('url');

        var data = {
            article_id: article_id,
            tag_name: tag_name
        }

        $.post(target_url, data, function(response) {
            console.log(response);
        });
    });

});