export class Overonspage {
  constructor() {
    this.DOMAllTeammembers = document.querySelectorAll('.teammember');

    // Functions
    this.MakeTeammembersLinkable();
  }

  MakeTeammembersLinkable() {
    this.DOMAllTeammembers.forEach((e) => {
      e.addEventListener('click', () => {
        const url = e.getAttribute('href');
        if(!!url) {
          const win = window.open(url, '_blank');
          win.focus();
        }
      });
    });
  }
}