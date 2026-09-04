<div>
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
</div>
<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta
    name="description"
    content="Tepenet açık iş ilanlarını pozisyon ve şehre göre filtreleyin, güvenlik sektöründeki kariyer fırsatlarını inceleyin." />
  <title>İş İlanları | Tepenet Güvenlik</title>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('stil.css') }}" />
  <script
    src="https://kit.fontawesome.com/8d3c119f81.js"
    crossorigin="anonymous"></script>
</head>

<body class="page-is-ilanlari">
  @include('partials.navbar')

  @php
    $jobs = [
      [
        'slug' => 'marmara-avrupa-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Marmara Avrupa Bölge Müdürlüğü',
        'summary' => 'Marmara Avrupa Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['İstanbul'],
      ],
      [
        'slug' => 'akdeniz-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Akdeniz Bölge Müdürlüğü',
        'summary' => 'Akdeniz Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Antalya', 'Burdur', 'Isparta'],
      ],
      [
        'slug' => 'cukurova-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Çukurova Bölge Müdürlüğü',
        'summary' => 'Çukurova Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Adana', 'Adıyaman', 'Diyarbakır', 'Elazığ', 'Gaziantep', 'Hakkari', 'Hatay', 'Mersin', 'Malatya', 'Kahramanmaraş', 'Mardin', 'Siirt', 'Şanlıurfa', 'Batman', 'Şırnak', 'Kilis', 'Osmaniye'],
      ],
      [
        'slug' => 'dogu-marmara-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Doğu Marmara Bölge Müdürlüğü',
        'summary' => 'Doğu Marmara Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Bolu', 'Kocaeli', 'Sakarya', 'Zonguldak', 'Bartın', 'Karabük', 'Düzce'],
      ],
      [
        'slug' => 'ege-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Ege Bölge Müdürlüğü',
        'summary' => 'Ege Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Aydın', 'İzmir', 'Manisa', 'Uşak'],
      ],
      [
        'slug' => 'guney-ege-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Güney Ege Bölge Müdürlüğü',
        'summary' => 'Güney Ege Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Denizli', 'Muğla'],
      ],
      [
        'slug' => 'guney-marmara-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Güney Marmara Bölge Müdürlüğü',
        'summary' => 'Güney Marmara Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Afyonkarahisar', 'Balıkesir', 'Bilecik', 'Bursa', 'Eskişehir', 'Kütahya', 'Yalova'],
      ],
      [
        'slug' => 'ic-anadolu-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - İç Anadolu Bölge Müdürlüğü',
        'summary' => 'İç Anadolu Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Ankara', 'Bitlis', 'Çankırı', 'Kayseri', 'Kırşehir', 'Konya', 'Nevşehir', 'Niğde', 'Van', 'Aksaray', 'Karaman', 'Kırıkkale'],
      ],
      [
        'slug' => 'karadeniz-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Karadeniz Bölge Müdürlüğü',
        'summary' => 'Karadeniz Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Ağrı', 'Amasya', 'Artvin', 'Bingöl', 'Çorum', 'Erzincan', 'Erzurum', 'Giresun', 'Gümüşhane', 'Kars', 'Kastamonu', 'Muş', 'Ordu', 'Rize', 'Samsun', 'Sinop', 'Sivas', 'Tokat', 'Trabzon', 'Tunceli', 'Yozgat', 'Bayburt', 'Ardahan', 'Iğdır'],
      ],
      [
        'slug' => 'marmara-anadolu-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Marmara Anadolu Bölge Müdürlüğü',
        'summary' => 'Marmara Anadolu Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['İstanbul'],
      ],
      [
        'slug' => 'trakya-guvenlik-gorevlisi',
        'title' => 'Özel Güvenlik Görevlisi - Trakya Bölge Müdürlüğü',
        'summary' => 'Trakya Bölgesi özel güvenlik görevlisi genel başvurusu',
        'type' => 'security-officer',
        'cities' => ['Çanakkale', 'Edirne', 'Kırklareli', 'Tekirdağ'],
      ],
      [
        'slug' => 'guvenlik-yoneticisi-genel-basvuru',
        'title' => 'Güvenlik Yöneticisi Genel Başvuru',
        'summary' => 'Özel güvenlik yöneticisi genel başvurusu',
        'type' => 'security-manager',
        'cities' => ['Ankara', 'Antalya', 'Bursa', 'Çanakkale', 'Denizli', 'Eskişehir', 'Mersin', 'İstanbul', 'İzmir', 'Kocaeli', 'Konya', 'Muğla', 'Samsun', 'Tekirdağ', 'Trabzon', 'Yalova'],
      ],
    ];
  @endphp

  <main>
    <section class="jobs-hero" aria-labelledby="jobs-title">
      <div class="container">
        <nav class="jobs-breadcrumb" aria-label="İçerik yolu">
          <a href="{{ route('e-basvuru') }}">E-Başvuru Portalı</a>
          <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
          <span>İş İlanları</span>
        </nav>
        <div class="jobs-hero__heading">
          <span class="jobs-hero__icon"><i class="fa-solid fa-bullhorn" aria-hidden="true"></i></span>
          <div>
            <span class="eyebrow">Tepenet Kariyer</span>
            <h1 id="jobs-title">İş İlanları</h1>
            <p><strong id="jobCount">{{ count($jobs) }}</strong> açık pozisyon arasından size uygun kariyer fırsatını bulun.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="jobs-section" aria-label="Açık iş ilanları">
      <div class="container-fluid jobs-container">
        <div class="jobs-layout" id="jobsLayout">
          <aside class="jobs-filter" id="jobsFilter" aria-labelledby="filter-title">
            <div class="jobs-filter__header">
              <div>
                <span class="jobs-filter__eyebrow">Aramanızı daraltın</span>
                <h2 id="filter-title"><i class="fa-solid fa-sliders" aria-hidden="true"></i> Filtreler</h2>
              </div>
              <button class="jobs-filter__close" id="closeFilters" type="button" aria-label="Filtreleri kapat">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
              </button>
            </div>

            <form id="jobFilters" action="#" method="get">
              <div class="jobs-filter__field">
                <label for="generalSearch">Genel arama</label>
                <div class="jobs-filter__input-wrap">
                  <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                  <input id="generalSearch" class="form-control" type="search" placeholder="İlan veya şehir ara" autocomplete="off" />
                </div>
              </div>

              <div class="jobs-filter__field">
                <label for="positionFilter">Pozisyon</label>
                <select id="positionFilter" class="form-select">
                  <option value="all">Tüm pozisyonlar</option>
                  <option value="security-officer">Özel Güvenlik Görevlisi</option>
                  <option value="security-manager">Özel Güvenlik Yöneticisi</option>
                </select>
              </div>

              <div class="jobs-filter__field">
                <span class="jobs-filter__label">Şehir</span>
                <div class="dropdown jobs-city-filter" data-bs-auto-close="outside">
                  <button
                    class="form-select jobs-city-filter__toggle"
                    id="cityFilterToggle"
                    type="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Şehir seçin
                  </button>
                  <div class="dropdown-menu jobs-city-filter__menu" aria-labelledby="cityFilterToggle">
                    <label class="jobs-city-filter__search" for="citySearch">
                      <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                      <input id="citySearch" type="search" placeholder="Şehir ara" autocomplete="off" />
                    </label>
                    <div class="jobs-city-filter__actions">
                      <button id="selectAllCities" type="button">Tümünü seç</button>
                      <button id="clearCities" type="button">Temizle</button>
                    </div>
                    <div class="jobs-city-filter__options" id="cityOptions"></div>
                  </div>
                </div>
              </div>

              <div class="jobs-filter__buttons">
                <button class="jobs-button jobs-button--primary" type="submit">
                  <i class="fa-solid fa-filter" aria-hidden="true"></i> Filtrele
                </button>
                <button class="jobs-button jobs-button--secondary" id="clearFilters" type="button">
                  <i class="fa-solid fa-rotate-left" aria-hidden="true"></i> Filtreleri Temizle
                </button>
              </div>
            </form>
          </aside>

          <div class="jobs-content">
            <div class="jobs-toolbar">
              <div class="jobs-toolbar__left">
                <button class="jobs-filter-toggle" id="toggleFilters" type="button" aria-controls="jobsFilter" aria-expanded="true">
                  <i class="fa-solid fa-filter" aria-hidden="true"></i>
                  <span>Filtreleri Gizle</span>
                </button>

                <div class="jobs-tabs" role="tablist" aria-label="Çalışan tipi">
                  <button class="jobs-tabs__button" type="button" role="tab" data-job-type="all" aria-selected="false">Tüm İş İlanları</button>
                  <button class="jobs-tabs__button is-active" type="button" role="tab" data-job-type="security-officer" aria-selected="true">Güvenlik Görevlisi</button>
                  <button class="jobs-tabs__button" type="button" role="tab" data-job-type="security-manager" aria-selected="false">Güvenlik Yöneticisi</button>
                </div>
              </div>

              <div class="jobs-view-toggle" role="group" aria-label="Görünüm seçimi">
                <button class="is-active" type="button" data-view="list" aria-pressed="true">
                  <i class="fa-solid fa-list" aria-hidden="true"></i> Liste
                </button>
                <button type="button" data-view="card" aria-pressed="false">
                  <i class="fa-solid fa-grip" aria-hidden="true"></i> Kart
                </button>
              </div>
            </div>

            <div class="jobs-active-filters" id="activeFilters" aria-live="polite"></div>

            <div class="jobs-list is-list-view" id="jobsList">
              @foreach ($jobs as $job)
                <article
                  class="job-card"
                  id="{{ $job['slug'] }}"
                  data-job-card
                  data-title="{{ $job['title'] }}"
                  data-summary="{{ $job['summary'] }}"
                  data-type="{{ $job['type'] }}"
                  data-cities="{{ implode('|', $job['cities']) }}">
                  <div class="job-card__icon" aria-hidden="true"><i class="fa-solid fa-briefcase"></i></div>
                  <div class="job-card__content">
                    <div class="job-card__date job-card__date--mobile">
                      <span>Son Başvuru</span>
                      <strong>31.10.2026</strong>
                    </div>
                    <h2>{{ $job['title'] }}</h2>
                    <p>{{ $job['summary'] }}</p>
                    <div class="job-card__meta">
                      <span><i class="fa-solid fa-location-dot" aria-hidden="true"></i> {{ implode(', ', $job['cities']) }}</span>
                      <span><i class="fa-regular fa-clock" aria-hidden="true"></i> Tam zamanlı</span>
                    </div>
                  </div>
                  <div class="job-card__date job-card__date--desktop">
                    <span>Son Başvuru</span>
                    <strong>31.10.2026</strong>
                  </div>
                  <div class="job-card__actions">
                    <a class="jobs-button jobs-button--apply" href="{{ route('e-basvuru') }}#ise-alim-sureci">Hemen Başvur</a>
                    <button
                      class="job-card__share"
                      type="button"
                      data-share-job="{{ $job['title'] }}"
                      data-share-anchor="{{ $job['slug'] }}"
                      aria-label="{{ $job['title'] }} ilanını paylaş">
                      <i class="fa-solid fa-share-nodes" aria-hidden="true"></i>
                    </button>
                  </div>
                </article>
              @endforeach
            </div>

            <div class="jobs-empty" id="jobsEmpty" hidden>
              <span><i class="fa-solid fa-briefcase" aria-hidden="true"></i></span>
              <h2>Aramanıza uygun ilan bulunamadı</h2>
              <p>Filtrelerinizi değiştirerek yeniden arama yapabilirsiniz.</p>
              <button class="jobs-button jobs-button--secondary" id="emptyClearFilters" type="button">Filtreleri Temizle</button>
            </div>

            <p class="visually-hidden" id="shareStatus" aria-live="polite"></p>
          </div>
        </div>
      </div>
    </section>
  </main>

  @include('partials.footer')

  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const jobsLayout = document.getElementById('jobsLayout');
      const jobsFilter = document.getElementById('jobsFilter');
      const filterForm = document.getElementById('jobFilters');
      const generalSearch = document.getElementById('generalSearch');
      const positionFilter = document.getElementById('positionFilter');
      const citySearch = document.getElementById('citySearch');
      const cityOptions = document.getElementById('cityOptions');
      const cityFilterToggle = document.getElementById('cityFilterToggle');
      const jobsList = document.getElementById('jobsList');
      const jobCards = [...document.querySelectorAll('[data-job-card]')];
      const jobCount = document.getElementById('jobCount');
      const jobsEmpty = document.getElementById('jobsEmpty');
      const activeFilters = document.getElementById('activeFilters');
      const toggleFilters = document.getElementById('toggleFilters');
      const closeFilters = document.getElementById('closeFilters');
      const clearFilters = document.getElementById('clearFilters');
      const emptyClearFilters = document.getElementById('emptyClearFilters');
      const selectAllCities = document.getElementById('selectAllCities');
      const clearCities = document.getElementById('clearCities');
      const tabButtons = [...document.querySelectorAll('[data-job-type]')];
      const viewButtons = [...document.querySelectorAll('[data-view]')];
      const shareStatus = document.getElementById('shareStatus');
      let activeJobType = 'security-officer';

      const normalizeText = (value) => value.toLocaleLowerCase('tr-TR').trim();

      const allCities = [...new Set(jobCards.flatMap((card) => card.dataset.cities.split('|')))]
        .sort((firstCity, secondCity) => firstCity.localeCompare(secondCity, 'tr-TR'));

      const renderCityOptions = () => {
        cityOptions.replaceChildren();

        allCities.forEach((city, index) => {
          const option = document.createElement('label');
          const input = document.createElement('input');
          const label = document.createElement('span');

          option.className = 'jobs-city-filter__option';
          option.dataset.cityOption = normalizeText(city);
          input.className = 'form-check-input';
          input.type = 'checkbox';
          input.value = city;
          input.id = `city-${index}`;
          label.textContent = city;

          option.append(input, label);
          cityOptions.append(option);
        });
      };

      const selectedCities = () => [...cityOptions.querySelectorAll('input:checked')].map((input) => input.value);

      const updateCityToggle = () => {
        const cities = selectedCities();

        if (cities.length === 0) {
          cityFilterToggle.textContent = 'Şehir seçin';
          return;
        }

        cityFilterToggle.textContent = cities.length === 1 ? cities[0] : `${cities.length} şehir seçildi`;
      };

      const renderActiveFilters = (searchTerm, position, cities) => {
        const labels = [];

        if (searchTerm) {
          labels.push(`Arama: ${generalSearch.value.trim()}`);
        }

        if (position !== 'all') {
          labels.push(positionFilter.options[positionFilter.selectedIndex].text);
        }

        if (cities.length > 0) {
          labels.push(`${cities.length} şehir`);
        }

        activeFilters.replaceChildren();

        labels.forEach((label) => {
          const filterLabel = document.createElement('span');
          filterLabel.textContent = label;
          activeFilters.append(filterLabel);
        });
      };

      const applyFilters = () => {
        const searchTerm = normalizeText(generalSearch.value);
        const selectedPosition = positionFilter.value;
        const cities = selectedCities();
        let visibleCount = 0;

        jobCards.forEach((card) => {
          const searchableText = normalizeText(`${card.dataset.title} ${card.dataset.summary} ${card.dataset.cities}`);
          const cardCities = card.dataset.cities.split('|');
          const matchesSearch = !searchTerm || searchableText.includes(searchTerm);
          const matchesTab = activeJobType === 'all' || card.dataset.type === activeJobType;
          const matchesPosition = selectedPosition === 'all' || card.dataset.type === selectedPosition;
          const matchesCity = cities.length === 0 || cities.some((city) => cardCities.includes(city));
          const isVisible = matchesSearch && matchesTab && matchesPosition && matchesCity;

          card.hidden = !isVisible;

          if (isVisible) {
            visibleCount += 1;
          }
        });

        jobCount.textContent = visibleCount;
        jobsEmpty.hidden = visibleCount !== 0;
        renderActiveFilters(searchTerm, selectedPosition, cities);
      };

      const resetFilters = () => {
        filterForm.reset();
        cityOptions.querySelectorAll('input').forEach((input) => {
          input.checked = false;
        });
        citySearch.value = '';
        cityOptions.querySelectorAll('[data-city-option]').forEach((option) => {
          option.hidden = false;
        });
        activeJobType = 'security-officer';
        tabButtons.forEach((button) => {
          const isActive = button.dataset.jobType === activeJobType;
          button.classList.toggle('is-active', isActive);
          button.setAttribute('aria-selected', isActive.toString());
        });
        updateCityToggle();
        applyFilters();
      };

      const setFiltersOpen = (isOpen) => {
        jobsLayout.classList.toggle('filters-collapsed', !isOpen);
        jobsFilter.classList.toggle('is-open', isOpen);
        toggleFilters.setAttribute('aria-expanded', isOpen.toString());
        toggleFilters.querySelector('span').textContent = isOpen ? 'Filtreleri Gizle' : 'Filtreleri Göster';
      };

      renderCityOptions();
      applyFilters();

      filterForm.addEventListener('submit', (event) => {
        event.preventDefault();

        if (positionFilter.value !== 'all') {
          activeJobType = positionFilter.value;
          tabButtons.forEach((button) => {
            const isActive = button.dataset.jobType === activeJobType;
            button.classList.toggle('is-active', isActive);
            button.setAttribute('aria-selected', isActive.toString());
          });
        }

        applyFilters();

        if (window.matchMedia('(max-width: 991.98px)').matches) {
          setFiltersOpen(false);
        }
      });

      clearFilters.addEventListener('click', resetFilters);
      emptyClearFilters.addEventListener('click', resetFilters);

      toggleFilters.addEventListener('click', () => {
        const isOpen = toggleFilters.getAttribute('aria-expanded') === 'true';
        setFiltersOpen(!isOpen);
      });

      closeFilters.addEventListener('click', () => setFiltersOpen(false));

      tabButtons.forEach((button) => {
        button.addEventListener('click', () => {
          activeJobType = button.dataset.jobType;
          positionFilter.value = 'all';
          tabButtons.forEach((tabButton) => {
            const isActive = tabButton === button;
            tabButton.classList.toggle('is-active', isActive);
            tabButton.setAttribute('aria-selected', isActive.toString());
          });
          applyFilters();
        });
      });

      viewButtons.forEach((button) => {
        button.addEventListener('click', () => {
          const view = button.dataset.view;
          jobsList.classList.toggle('is-list-view', view === 'list');
          jobsList.classList.toggle('is-card-view', view === 'card');
          viewButtons.forEach((viewButton) => {
            const isActive = viewButton === button;
            viewButton.classList.toggle('is-active', isActive);
            viewButton.setAttribute('aria-pressed', isActive.toString());
          });
        });
      });

      citySearch.addEventListener('input', () => {
        const searchTerm = normalizeText(citySearch.value);

        cityOptions.querySelectorAll('[data-city-option]').forEach((option) => {
          option.hidden = !option.dataset.cityOption.includes(searchTerm);
        });
      });

      cityOptions.addEventListener('change', updateCityToggle);

      selectAllCities.addEventListener('click', () => {
        cityOptions.querySelectorAll('input').forEach((input) => {
          input.checked = true;
        });
        updateCityToggle();
      });

      clearCities.addEventListener('click', () => {
        cityOptions.querySelectorAll('input').forEach((input) => {
          input.checked = false;
        });
        updateCityToggle();
      });

      document.querySelectorAll('[data-share-job]').forEach((button) => {
        button.addEventListener('click', async () => {
          const title = button.dataset.shareJob;
          const url = `${window.location.origin}${window.location.pathname}#${button.dataset.shareAnchor}`;

          try {
            if (navigator.share) {
              await navigator.share({ title, text: `${title} iş ilanını inceleyin.`, url });
              shareStatus.textContent = 'İlan paylaşım penceresi açıldı.';
              return;
            }

            await navigator.clipboard.writeText(url);
            shareStatus.textContent = 'İlan bağlantısı panoya kopyalandı.';
          } catch (error) {
            if (error.name !== 'AbortError') {
              shareStatus.textContent = 'İlan bağlantısı kopyalanamadı.';
            }
          }
        });
      });

      if (window.matchMedia('(max-width: 991.98px)').matches) {
        setFiltersOpen(false);
      }
    });
  </script>
</body>

</html>
