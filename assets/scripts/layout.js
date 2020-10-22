export class Layout {
  constructor() {
    this.url = window.location.pathname;
    this.header_top = document.querySelector('.header_top');
    this.nav = document.querySelector('.header_nav');
    this.navitems = document.querySelectorAll('.header_nav li');
    this.main = document.querySelector('main');
    this.footer = document.querySelector('footer');
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
      // Making listitems clickable
      e.addEventListener('click', () => {
        window.location.pathname = e.children[0].pathname;
      });
      // Setting active nav element
      (e.children[0].pathname == this.url) ? 
        e.classList.add('active')
      : '';
    });
  }

  stickyNav() {
    window.addEventListener('scroll', () => {
      if(window.innerHeight < (this.main.offsetHeight + this.footer.offsetHeight)) {
        if(window.pageYOffset < this.header_top.offsetHeight) {
          this.nav.classList.remove('scrolled');
          // this.bumper.style.height = 0;
        } else {
          this.nav.classList.add('scrolled');
          // this.bumper.style.height = this.nav.offsetHeight + 'px';
        }
      }
    });
  }
}