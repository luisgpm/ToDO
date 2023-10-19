$(document).ready(function () {
    $('.editForm').on('submit', function(e){
        e.preventDefault();
        const id = $(this).attr('data-id');
        console.log(id+ ' id ');
        $.ajax({
            type: "PATCH",
            url: "/activity/"+ $(this).attr('data-id'),
            data: $('.editForm').serialize(),
            success: function(response){
                console.log(response);
                location.reload();
            },
            error: function(res){  
            }
        });
    });
});