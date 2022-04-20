function editComment(id_commentaire, texte_commentaire)
{
$(function () {

    $('.deleteUserCom').ready(function(){
            $.post("assets/php/edit_com_user.php", {comId: id_commentaire, texteCom: texte_commentaire}, function(data){
                $('.alertcommentaire').remove();
                $('#'+id_commentaire+' .texte-commentaire').replaceWith(data);
            });
        return false;
    });
});
}