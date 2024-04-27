let text = document.getElementById('text');
let text2 = document.getElementById('text2');
let leaf = document.getElementById('leaf');
let hill1 = document.getElementById('hill1');
let hill4 = document.getElementById('hill4');
let hill5 = document.getElementById('hill5');
let d4 = document.getElementById('d4');

// Calculate the maximum scrolling position
let maxScrollPosition = document.body.scrollHeight - window.innerHeight;

window.addEventListener("scroll", () => {
  let value = window.scrollY;

  // Limit the scroll position to the maximum value
  if (value > maxScrollPosition) {
    window.scrollTo(0, maxScrollPosition);
  } else {
    text.style.marginTop = value * 1 + 'px';
    text2.style.marginTop = value * 1 + 'px';
    leaf.style.top = value * -1.5 + 'px';
    leaf.style.left = value * 1.5 + 'px';
    d4.style.top = value * 1 + 'px';
    hill5.style.left = value * 4 + 'px';
    hill4.style.left = value * -1.5 + 'px';
    hill1.style.top = value * 1 + 'px';
  }
});

