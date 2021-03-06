// Based on https://css-tricks.com/snippets/jquery/smooth-scrolling/

var jp_jump_links = document.querySelectorAll('a[data-jump-link="1"]');
for( i=0; i<jp_jump_links.length; i++ ){
    jp_jump_links[i].addEventListener('click', jp_jump_link_cb);
}

function jp_jump_link_cb(event){
    // console.log('clicked jump link');
    // console.log(event);

    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
      location.hostname == this.hostname
    ) {
        var target = document.querySelector(this.hash);
        target = target.length ? target : document.querySelector('[name=' + this.hash.slice(1) + ']');

        // Does a scroll target exist?
        if (target.length) {
            event.preventDefault();
            target.scrollIntoView({ behavior: 'smooth' });
        }

    }

}
