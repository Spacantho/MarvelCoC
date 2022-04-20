function deleteComment(id_commentaire)
{
$(function () {

    $('.deleteUserCom').ready(function(){
            $.post("assets/php/delete_com_user.php", {comId: id_commentaire}, function(data){
                $('.alertcommentaire').remove();
                $('#'+id_commentaire).remove()
                $("#scrolled").prepend(data);
            });
        return false;
    });
});
}