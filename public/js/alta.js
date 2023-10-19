$(document).ready(function () {
    $('#form-alta').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/activity",
            data: $('#form-alta').serialize(),
            success: function(response){
                console.log(response);
                location.reload();
            },
            error: function(res){
            }
        });
    });
});
