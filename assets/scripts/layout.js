export class Layout {
  constructor() {
    this.url = window.location.pathname;
    this.header_top = document.querySelector('.header_top');
    this.nav = document.querySelector('.header_nav');
    this.navitems = document.querySelectorAll('.header_nav li');
    this.main = document.querySelector('main');
    this.bumper = document.querySelector('.bumper');

    // Functions
    this.header();
  }

  header() {
    this.activeHeader();
    this.stickyNav();
  }

  activeHeader() {
    this.navitems.forEach((e) => {
      (e.children[0].pathname == this.url) ? 
        e.classList.add('active')
      : '';
    });
  }

  stickyNav() {
    window.addEventListener('scroll', () => {
      if(window.pageYOffset > this.header_top.offsetHeight) {
        this.nav.classList.add('scrolled');
        this.bumper.style.height = this.nav.offsetHeight + 'px';
      } else {
        this.nav.classList.remove('scrolled');
        this.bumper.style.height = 0;
      }
    });
  }
}