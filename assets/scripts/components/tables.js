export class Tables {
  constructor() {
    this.DOMrows = document.querySelectorAll('tr');

    // Functions
    this.ClickableTableRows();
  }

  ClickableTableRows() {
    this.DOMrows.forEach((e) => {
      e.addEventListener('click', () => {
        const path = e.getAttribute('href');
        if(!!path) {
          window.location.href = path;
        }
      });
    });
  }


}