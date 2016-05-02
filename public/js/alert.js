$(".btn-destroy").on("click", function(){


if (confirm("削除します\nよろしいですか？")) {
    submit();
} else {
    return false;
}


});
