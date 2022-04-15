//ajax + comportement section commentaire
$(function() {
    $("#comment_form").submit(function() {
            user = $(this).find("input[name=user_id]").val();
            video = $(this).find("input[name=video_id]").val();
            com = $(this).find("textarea[name=commentaire]").val();
            $.post("assets/php/traitement_commentaire.php", {user_id: user, commentaire: com, video_id: video}, function(data){
                $('textarea').val('');
                $('.alertcommentaire').remove();
                $("#scrolled").prepend(data);
                $("#scrolled").scrollTop(0);
                $('#counter-commentaire').val('');
            });
            return false;
    })
})

//clear textarea
function eraseText() {
    document.getElementById("output").value = "";
}

//counter commentaire

const input = document.getElementById('textarea-commentaire');
const counter = document.getElementById('counter-commentaire');
const maxLength = input.getAttribute('maxlength');

input.addEventListener('input', event => {
    const valueLength = event.target.value.length;
    const leftCharLength = maxLength - valueLength;
  
    if (leftCharLength < 0) return;
    counter.innerText = leftCharLength;
  });