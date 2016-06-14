// Back To Top
// =================================================

(function() {

  var hero         = document.querySelector('.home') ? document.querySelector('.site-header') : document.querySelector('.l-sticky-header'),
    hero_height    = hero.clientHeight,
    el             = document.querySelector('#main'),
    elChild        = document.createElement('a'),
    content_height = content.clientHeight;

  var scrollTop = (window.pageYOffset !== undefined) ? window.pageYOffset : (document.documentElement || document.body.parentNode || document.body).scrollTop;

  elChild.innerHTML = 'Back To Top';
  elChild.setAttribute('href', '#top');

  el.style.position = 'relative';

  elChild.style.position = 'fixed';
  elChild.style.zIndex = '9999';
  elChild.style.right = 0;
  elChild.style.bottom = 0;
  elChild.style.backgroundColor = '#000';
  elChild.style.color = 'white';
  elChild.style.padding = '7px 10px';

  window.addEventListener('scroll', function(e) {

    if(window.pageYOffset > hero_height) {
      el.appendChild(elChild);
      elChild.style.opacity = 1;
    } else {
      elChild.style.opacity = 0;
    }

    if(window.pageYOffset == (document.documentElement.scrollHeight - window.innerHeight)) {
      elChild.style.opacity = 0;
    }

  });

  elChild.addEventListener('click', function() {
    elChild.style.opacity = 0;
  })
})()
