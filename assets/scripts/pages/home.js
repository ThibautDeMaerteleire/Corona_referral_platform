export class Homepage {
  constructor() {
    this.body = document.querySelector('body');
    this.alert = document.querySelector('#alert')
    this.subscribeForm = document.querySelector('#subscribeform');
    this.subscribeMessage = document.querySelector('#subscribemessage');
    this.subscribeEmail = document.querySelector('#subscribeEmail');
    this.subscribeSuccesfull = document.querySelector('#subscribeform .succesfull')
    this.subscribeBtn = document.querySelector('#subscribeform button');

    // Functions
    this.SubscribeMain();
  }

  async SubscribeMain() {
    this.SubscribeForm();
  }

  async SubscribeForm() {
    this.subscribeForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      let formData = new FormData();
      formData.append('email', e.target.email.value);
      // Posting formdata to api
      let response = await fetch('/api/subscribe.php', {
        method: 'POST',
        body: formData
      });
      // Waiting for response and then show message in html
      await this.SubscribeDisplay(await response.text(), response.status);
      await this.ShowAlert();
    });
  }

  async SubscribeDisplay(message, status) {
    console.log(message);
    if(status == 200) {
      this.SuccesfullySubscribed(message);
    } else if(status == 406) {
      this.ErrorSubscribed(message);
    }
  }

  async SuccesfullySubscribed(message) {
    this.subscribeEmail.value = "";
    this.subscribeEmail.placeholder = message;
    this.subscribeEmail.classList.add('succesfullinput');
    this.alert.innerHTML = `
      <div class="alert alert-success" role="alert">
        ${message}
      </div>
    `;
    this.subscribeEmail.classList.add('invisible');
    this.subscribeMessage.innerHTML = message;
    this.subscribeMessage.classList.add('w-100');
    this.subscribeSuccesfull.classList.add('visible');
    this.subscribeBtn.classList.add('invisible');
  }

  async ErrorSubscribed(message) {
    this.subscribeEmail.value = "";
    this.subscribeEmail.placeholder = message;
    this.subscribeEmail.classList.add('errorinput');
    this.alert.innerHTML = `
      <div class="alert alert-danger" role="alert">
        ${message}
      </div>
    `;
  }

  async ShowAlert() {
    this.alert.style.top = '1rem';
    this.alert.style.opacity = '1';
    setTimeout(() => {
      this.alert.style.top = '0rem';
      this.alert.style.opacity = '0';
    }, 5000);
  }
}
