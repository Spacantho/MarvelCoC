var showLink = false;

const switchinput = document.getElementById("switchinput");
const videocopylink = document.getElementById("videocopylink")
const videodropfile = document.getElementById("videodropfile")

setVideoInput();

switchinput.onclick = function(){
    showLink = !showLink;

    setVideoInput();

}

function setVideoInput(){
    if (showLink) {
        videodropfile.style.display = "none";
        videocopylink.style.display = "flex";
    }else{
        videodropfile.style.display = "flex";
        videocopylink.style.display = "none";
    }
}
