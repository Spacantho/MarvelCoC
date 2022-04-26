function changePp(id)
{
$(function () {

    $('#edit_pp').ready(function(){
            $.post("assets/php/change_pp.php", {id: id}, function(data){
                $('#edit_pp').replaceWith(data);
            });
        return false;
    });
});
}