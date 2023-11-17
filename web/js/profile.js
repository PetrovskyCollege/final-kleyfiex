function openFileInput() {
    document.getElementById('avatarInput').click();
}

function previewImage() {
    var input = document.getElementById('avatarInput');
    var preview = document.getElementById('avatarPreview');
    var reader = new FileReader();

    reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
    };

    reader.readAsDataURL(input.files[0]);
}

function saveAvatar() {
    $.ajax({
        url: '/site/profile',
        type: 'post',
        data: new FormData($('form')[0]),
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Картинка сохранена')
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('ошибка')
        }
    });
}