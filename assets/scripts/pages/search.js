export class SearchPage {
  constructor() {
    this.DOMSearchItems = document.querySelectorAll('.search__item');

    this.Main();
  }

  Main() {
    if(!!this.DOMSearchItems) this.MakeClickable();
  }

  MakeClickable() {
    this.DOMSearchItems.forEach((e) => {
      const url = e.getAttribute('href');
      if(!!url) {
        e.addEventListener('click', () => {
          window.location.href = url;
        });
      }
    });
  }
}