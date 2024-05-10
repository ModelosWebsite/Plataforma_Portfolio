class Cookies {
    constructor() {
      this.key = '@cookies';
      this.init();
    }
  
    layout() {
      return `
        <div id="cookies" class="container-fluid">
          <div class="content container">
            <span>
              Usamos cookies em nosso site para ver como você interage com ele. Ao aceitar este banner, você concorda com o uso de tais cookies.
              <a class="text-black" href="https://www.pachecobarroso.com/pb-privacy-policy" target="_blank">Políticas de Privacidade</a>
            </span>
          </div>
          <div class="actions">
            <button class="reject" onclick="cookies.remove();">Rejeitar</button>
            <button class="accept" onclick="cookies.accept();">Aceitar</button>
          </div>
        </div>
      `;
    }
  
    save() {
      localStorage.setItem(this.key, true);
    }
  
    get() {
      return localStorage.getItem(this.key) || false;
    }
  
    create() {
      document.body.insertAdjacentHTML('beforeend', this.layout());
    }
  
    remove() {
      const select = document.querySelector("#cookies");
      if (select) {
        select.parentNode.removeChild(select);
      }
    }
  
    accept() {
      this.save();
      this.remove();
    }
  
    async init() {
      const status = await this.get();
      if (!status) {
        this.create();
      }
    }
  }
  
  const cookies = new Cookies();
  