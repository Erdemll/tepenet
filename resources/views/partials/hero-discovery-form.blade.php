@php
  $isWorkplaceSelected = (bool) old('isyeri_talebi', $workplaceDefault);
@endphp

@if (session('discovery_success'))
  <div class="alert alert-success" role="status">
    {{ session('discovery_success') }}
  </div>
@endif

@if (session('discovery_error'))
  <div class="alert alert-danger" role="alert">
    {{ session('discovery_error') }}
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger" role="alert">
    Lütfen işaretli alanları kontrol edin.
  </div>
@endif

<form
  class="hero-discovery-form"
  action="{{ route('discovery.store') }}"
  method="post"
  data-hero-discovery-form>
  @csrf
  <input type="hidden" name="source_page" value="{{ $sourcePage }}" />

  <div class="row g-2">
    <div class="col-12 col-md-6">
      <label class="visually-hidden" for="{{ $idPrefix }}-ad">Adınız</label>
      <input
        class="form-control @error('ad') is-invalid @enderror"
        id="{{ $idPrefix }}-ad"
        name="ad"
        type="text"
        placeholder="Adınız"
        autocomplete="given-name"
        maxlength="100"
        value="{{ old('ad') }}"
        required />
      @error('ad')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label class="visually-hidden" for="{{ $idPrefix }}-soyad">Soyadınız</label>
      <input
        class="form-control @error('soyad') is-invalid @enderror"
        id="{{ $idPrefix }}-soyad"
        name="soyad"
        type="text"
        placeholder="Soyadınız"
        autocomplete="family-name"
        maxlength="100"
        value="{{ old('soyad') }}"
        required />
      @error('soyad')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label class="visually-hidden" for="{{ $idPrefix }}-telefon">Telefon numaranız</label>
      <input
        class="form-control @error('telefon') is-invalid @enderror"
        id="{{ $idPrefix }}-telefon"
        name="telefon"
        type="tel"
        inputmode="tel"
        placeholder="Telefon Numaranız"
        autocomplete="tel"
        maxlength="20"
        value="{{ old('telefon') }}"
        required />
      @error('telefon')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label class="visually-hidden" for="{{ $idPrefix }}-email">E-posta adresiniz</label>
      <input
        class="form-control @error('email') is-invalid @enderror"
        id="{{ $idPrefix }}-email"
        name="email"
        type="email"
        placeholder="E-Posta"
        autocomplete="email"
        maxlength="255"
        value="{{ old('email') }}" />
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label class="visually-hidden" for="{{ $idPrefix }}-urun-grubu">Ürün grubu</label>
      <select
        class="form-select @error('urun_grubu') is-invalid @enderror"
        id="{{ $idPrefix }}-urun-grubu"
        name="urun_grubu"
        required>
        <option value="" @selected(! old('urun_grubu')) disabled>Ürün Grubu Seçiniz</option>
        <option value="kamera" @selected(old('urun_grubu') === 'kamera')>Kamera Sistemleri</option>
        <option value="alarm" @selected(old('urun_grubu') === 'alarm')>Alarm Sistemleri</option>
        <option value="diger" @selected(old('urun_grubu') === 'diger')>Diğer</option>
      </select>
      @error('urun_grubu')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12 col-md-6">
      <label class="visually-hidden" for="{{ $idPrefix }}-il">İl seçiniz</label>
      <select
        class="form-select @error('il') is-invalid @enderror"
        id="{{ $idPrefix }}-il"
        name="il"
        required>
        <option value="" @selected(! old('il')) disabled>İl Seçiniz</option>
        <option value="bursa" @selected(old('il') === 'bursa')>Bursa</option>
        <option value="istanbul" @selected(old('il') === 'istanbul')>İstanbul</option>
        <option value="ankara" @selected(old('il') === 'ankara')>Ankara</option>
      </select>
      @error('il')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12">
      <div class="form-check mt-1">
        <input
          class="form-check-input"
          id="{{ $idPrefix }}-isyeri-talebi"
          name="isyeri_talebi"
          type="checkbox"
          value="1"
          @checked($isWorkplaceSelected)
          data-workplace-toggle />
        <label class="form-check-label" for="{{ $idPrefix }}-isyeri-talebi">
          Ücretsiz keşif talebiniz iş yeri için mi?
        </label>
      </div>
    </div>

    <div class="col-12" @if (! $isWorkplaceSelected) hidden @endif data-branch-count-wrapper>
      <label class="visually-hidden" for="{{ $idPrefix }}-sube-sayisi">Şube sayısı</label>
      <input
        class="form-control @error('sube_sayisi') is-invalid @enderror"
        id="{{ $idPrefix }}-sube-sayisi"
        name="sube_sayisi"
        type="number"
        min="1"
        max="10000"
        placeholder="Şube Sayısı"
        value="{{ old('sube_sayisi') }}"
        @required($isWorkplaceSelected)
        data-branch-count />
      @error('sube_sayisi')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12">
      <div class="form-check mt-1">
        <input
          class="form-check-input"
          id="{{ $idPrefix }}-kampanya-izni"
          name="kampanya_izni"
          type="checkbox"
          value="1"
          @checked(old('kampanya_izni')) />
        <label class="form-check-label" for="{{ $idPrefix }}-kampanya-izni">
          Tepenet Güvenlik’in kampanya ve duyurular için benimle iletişime geçmesine izin veriyorum.
          <a href="#">Detay</a>
        </label>
      </div>
    </div>

    <div class="col-12">
      <div class="form-check">
        <input
          class="form-check-input @error('kvkk_onayi') is-invalid @enderror"
          id="{{ $idPrefix }}-kvkk-onayi"
          name="kvkk_onayi"
          type="checkbox"
          value="1"
          @checked(old('kvkk_onayi'))
          required />
        <label class="form-check-label" for="{{ $idPrefix }}-kvkk-onayi">
          Kişisel verilerin korunmasına ilişkin <a href="#">aydınlatma metnini</a> okudum ve anladım.
          <span class="text-danger">*</span>
        </label>
        @error('kvkk_onayi')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <div class="col-12 mt-3">
      <button class="submit-button btn" type="submit">Talep Oluştur →</button>
    </div>
  </div>
</form>
