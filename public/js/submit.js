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

    // タグ追加
    $('.add-tag-btn').on('click', function () {
        var new_tag_name = $('input[name="tag_name"]').val();
        var article_id = $('input[name="id"]').val();
        if (!new_tag_name) {
            alert('タグ名は必須です');
            return false;
        }
        $.ajax({
            url: '/admin/tag/',
            type: 'POST',
            dataType: 'json',
            data: {
                tag_name: new_tag_name,
                article_id: article_id
            }
        }).done(function (response) {
            console.log(response);
        }).fail(function (response) {
            console.log(response);
        });
    });

    // タグ削除
    $('.delete-tag').on('click', function() {
        var article_id = $(this).data('article_id');
        var tag_id = $(this).data('tag_id');
        var target_url = $(this).data('url');

        var data = {
            article_id: article_id,
            tag_id: tag_id
        }

        $.ajax({
            url: target_url,
            type: 'DELETE',
            dataType: 'json',
            data: {
                tag_id: tag_id,
                article_id: article_id
            }
        }).done(function (response) {
            console.log(response);
        }).fail(function (response) {
            console.log(response.responseText);
        });
    });

});