export class AddCovidTest {
  constructor() {
    this.DOMCovidTest = document.querySelector('.covidtest');
    this.DOMPatientSelect = document.querySelector('#patient');
    this.DOMPatientOptions = document.querySelectorAll('#patient option');
    this.DOMRijksregister = document.querySelector('#rijksregister');


    if(!!this.DOMCovidTest) this.Main();
  }

  Main() {
    this.SetRijksregister();
  }

  SetRijksregister() {
    this.DOMPatientOptions.forEach((e) => {
      e.addEventListener('click', () => {
        this.DOMRijksregister.value = e.getAttribute('rijksregisternummer');
      });
    });
  }
}