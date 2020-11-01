export class AutocompleteSearch {
  constructor() {
    this.DOMSearch = document.querySelector('#searchbar');
    this.DOMAutocompletion = document.querySelector('.autocompletion');

    // Functions
    this.Main();
  }

  async Main() {
    this.DOMSearch.addEventListener("input", async (e) => {
      const input = e.target.value;
      const huisartsID = this.DOMSearch.getAttribute('hid');
      if(input.length > 3) {
        await this.GetData(input, huisartsID);
      } else {
        this.DOMAutocompletion.classList.remove('show');
      }
    });
  }

  async GetData(input, huisartsID) {
    let formData = new FormData();
    formData.append('search', input);
    formData.append('huisartsID', huisartsID);
    let response = await fetch('/api/autocompleteSearch.php', {
      method: 'POST',
      body: formData
    });

    const status = await response.status;

    if(status == 404) {
      await this.DisplayErrors(await response.text(), status);
    } else if(status == 200) {
      await this.DisplayOptions(await response.json(), status);
    } else {
      await console.log(response.status + 'error with autocompletion');
    }
  }

  DisplayErrors(message, status) {
    this.DOMAutocompletion.classList.add('show');
    this.DOMAutocompletion.innerHTML = `<p><a>${message}</a></p>`;
  }

  DisplayOptions(json, status) {
    let tempStr = '';
    const type = this.DOMSearch.getAttribute('accounttype');
    
    json.forEach((e) => {
      tempStr += `<p><a href="/${type}/patient.php?id=${e.id}">${e.voornaam} ${e.achternaam}</a></p>`;
    });

    this.DOMAutocompletion.innerHTML = tempStr;
    this.DOMAutocompletion.classList.add('show');
  }

}