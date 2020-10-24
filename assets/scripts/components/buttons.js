export class Buttons {
  constructor() {
    this.DOMAllButtons = document.querySelectorAll('button');

    // Functions
    this.MakeButtonsClickable();
  }

  MakeButtonsClickable() {
    this.DOMAllButtons.forEach((e) => {
      const path = e.getAttribute('href');
      if(!!path) {
        e.addEventListener('click', () => {
          console.log(e);
          window.location.href = path;
        });
      }
    });
  }
}