export class SmallCards {
  constructor() {
    this.AllSmallCards = document.querySelectorAll('.small-card');

    // Functions
    this.MakeClickable();
  }

  MakeClickable() {
    if(this.AllSmallCards) {
      this.AllSmallCards.forEach((e) => {
        e.addEventListener('click', () => {
          window.location.pathname = e.getAttribute('href');
        });
      });
    }
  }
}