const $autoExpandTextareas = document.querySelectorAll("textarea.auto-expand");

function addMultiEventListeners(el, s, fn) {
  s.split(" ").forEach(e => el.addEventListener(e, fn, false));
}

$autoExpandTextareas.forEach(function(el) {
  addMultiEventListeners(el, "change keydown paste", function() {
    autoExpand(el);
  });
});

function autoExpand(el) {
  setTimeout(function() {
    el.style.cssText = "height: auto";
    el.style.cssText = `height: ${7 + el.scrollHeight}px`;
  }, 0);
}

window.onresize = function() {
  $autoExpandTextareas.forEach(function(el) {
    autoExpand(el);
  });
};
