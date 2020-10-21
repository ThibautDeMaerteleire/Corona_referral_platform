export class Layout {
  constructor() {
    this.url = window.location.pathname;
    this.navitems = document.querySelectorAll('header nav li');

    // Functions
    this.header();
  }

  header() {
    this.activeHeader();
  }

  activeHeader() {
    console.log(this.navitems)
    this.navitems.forEach((e) => {
      (e.children[0].pathname == this.url) ? 
        e.classList.add('active')
      : '';
    });
  }
}