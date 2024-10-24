<div class="mt-4 mb-4">
    {{-- Arquivo de estilização e JS --}}
    @include("components.shopping.style")
    {{-- Arquivo de estilização e JS --}}
  
    {{-- Listagem dos produtos e categorias --}}
    <div class="container">
      <div class="d-flex justify-content-center">
        <div class="container-scroll">
          <div class="iconChevron-left">
            <i>
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
              </svg>
            </i>
          </div>
          <ul>
            <li><button class="category {{ $category == null ? 'active' : '' }}" wire:click="getItems(null)">Todos</button></li>
            @forelse ($categories as $item)
              <li>
                <button class="category {{ $category == $item['reference'] ? 'active' : '' }}" wire:click="getItems('{{ $item['reference'] ?? '' }}')">
                  {{ $item['Categoria'] ?? '' }}
                </button>
              </li>
            @empty
              <li>
                <p>Não há categorias disponíveis.</p>
              </li>
            @endforelse
          </ul>
          <div class="iconChevron-right active">
            <i>
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z"/>
              </svg>
            </i>
          </div>
        </div>
      </div>
    </div>
  

            <div class="container px-3 px-md-3 px-lg-4 tab-content" data-aos="fade-up" data-aos-delay="300" style="margin-top: 5rem;">
              <div class="row gy-5">
                @if ($getCollectionsItens->count() > 0)
                  @foreach($getCollectionsItens as $item)
                    <div class="col-lg-4 menu-item text-center align-items-center mt-2 mb-2">
                      <img class="mb-3" style="width: 8rem; height:8rem;" src="{{ asset($item['image'] ?? 'notfound.png') }}" class="menu-img img-fluid" alt="{{ $item['name'] ?? 'Service Image' }}">
                      <h4 style="font-size: 1.2rem;">{{ $item['name'] ?? '' }}</h4>
                      <p class="price">{{ number_format($item['price'] ?? 0, 2, ',', '.') }} kz</p>
                      <a wire:click="addToCart('{{ $item['name'] ?? '' }}')" class="btn btn-primary text-white">
                        Adicionar
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0"/>
                        </svg>
                      </a>
                    </div>
                  @endforeach
                @else
                  <div class="rounded col-md-12 d-flex justify-content-center align-items-center flex-column mt-5" style="height: 20rem; border: 1px dashed #000;">
                    <h5 class="text-muted text-center text-uppercase">A consulta não retornou nenhum resultado</h5>
                  </div>
                @endif
              </div>
            </div>

    {{-- Codigo CSS --}}
<style>
    .container-scroll {
        background: #ddd;
        max-width: 900px;
        border-radius: 30px;
        overflow: hidden;
        position: relative;
    }
  
    .container-scroll i {
        width: 40px;
        height: 40px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #333;
        border-radius: 50%;
        pointer-events: auto;
    }
  
    .container-scroll i:hover {
        background: var(--background);
        color: #fff;
    }
  
    .container-scroll ul {
        display: flex;
        gap: 16px;
        padding: 12px 24px;
        margin: 0;
        list-style: none;
        overflow-x: scroll;
        scrollbar-width: none;
        scroll-behavior: smooth;
    }
  
    .container-scroll ul.dragging {
        scroll-behavior: auto;
    }
  
    .container-scroll ul::-webkit-scrollbar {
        display: none;
    }
  
    .container-scroll button {
        color: #333;
        font-weight: 500;
        background: #fff;
        padding: 4px 24px;
        border-radius: 30px;
        transition: background 0.3s, color 0.3s;
        border: none;
        cursor: pointer;
    }
  
    .container-scroll button:hover,
    .container-scroll button.active {
        background: var(--background);
        color: #fff;
    }
  
    .iconChevron-left,
    .iconChevron-right {
        position: absolute;
        height: 100%;
        width: 100px;
        top: 0;
        display: none;
        align-items: center;
        pointer-events: none;
    }
  
    .iconChevron-left.active,
    .iconChevron-right.active {
        display: flex;
    }
  
    .iconChevron-right {
        right: 0;
        background: linear-gradient(to left, #ddd 50%, transparent);
        justify-content: flex-end;
    }
  
    .iconChevron-left {
        background: linear-gradient(to right, #ddd 50%, transparent);
    }
  </style>
  
  {{-- Codigo JS --}}
  <script>
        document.addEventListener("DOMContentLoaded", () => {
        const tabs = document.querySelectorAll(".container-scroll button");
        const rightArrow = document.querySelector(".container-scroll .iconChevron-right i");
        const leftArrow = document.querySelector(".container-scroll .iconChevron-left i");
        const tabsList = document.querySelector(".container-scroll ul");
        const leftArrowContainer = document.querySelector(".container-scroll .iconChevron-left");
        const rightArrowContainer = document.querySelector(".container-scroll .iconChevron-right");
  
        const removeAllActiveClasse = () => tabs.forEach(tab => tab.classList.remove("active"));
  
        tabs.forEach(tab => {
            tab.addEventListener("click", () => {
                removeAllActiveClasse();
                tab.classList.add("active");
            });
        });
  
        const manageIcons = () => {
            leftArrowContainer.classList.toggle("active", tabsList.scrollLeft >= 20);
            const maxScrollValue = tabsList.scrollWidth - tabsList.clientWidth - 20;
            rightArrowContainer.classList.toggle("active", tabsList.scrollLeft < maxScrollValue);
        };
  
        rightArrow.addEventListener("click", () => {
            tabsList.scrollLeft += 200;
            manageIcons();
        });
  
        leftArrow.addEventListener("click", () => {
            tabsList.scrollLeft -= 200;
            manageIcons();
        });
  
        tabsList.addEventListener("scroll", manageIcons);
  
        let dragging = false;
  
        tabsList.addEventListener("mousemove", (e) => {
            if (!dragging) return;
            tabsList.classList.add("dragging");
            tabsList.scrollLeft -= e.movementX;
        });
  
        tabsList.addEventListener("mousedown", () => dragging = true);
        document.addEventListener("mouseup", () => {
            dragging = false;
            tabsList.classList.remove("dragging");
        });
    });
  </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
  </div>