$(document).ready(function() {
    $(window).scroll(function() {
        var header = $('#header');
        if ($(this).scrollTop() > 100) { // スクロール量に応じて調整
            header.css('height', '200px'); // 修正: ヘッダーの高さを適切な値に変更
        } else {
            header.css('height', '600px'); // 元の高さに戻す
        }
    });
});

// デリートボタンの機能
$('.delete-btn').on('click', function() {
    var name = $(this).data('name');
    if (confirm(`'${name}'のDog Dataを削除しますか?`)) {
        $.ajax({
            url: './delete.php',
            type: 'GET',
            data: { name: name },
            success: function(data) {
                alert(data);
                location.reload();
            },
            error: function(xhr, status, error) {
                alert('削除に失敗しました。');
                console.error(error);
            }
        });
    }
});
