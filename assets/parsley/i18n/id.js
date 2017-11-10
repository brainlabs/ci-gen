// ParsleyConfig definition if not already set
window.ParsleyConfig = window.ParsleyConfig || {};
window.ParsleyConfig.i18n = window.ParsleyConfig.i18n || {};

// Define then the messages
window.ParsleyConfig.i18n.id = jQuery.extend(window.ParsleyConfig.i18n.id || {}, {
  defaultMessage: "Pengisian tidak benar",
  type: {
    email:        "Format email valid",
    url:          "URL tidak valid",
    number:       "Nomor tidak valid",
    integer:      "Angka tidak valid",
    digits:       "Harus berupa digit",
    alphanum:     "Harus berupa kombinasi huruf dan angka"
  },
  notblank:       "Tidak boleh kosong",
  required:       "Tidak boleh kosong",
  pattern:        "Tidak valid",
  min:            "Haru lebih besar atau sama dengan %s.",
  max:            "Harus lebih kecil atau sama dengan %s.",
  range:          "Harus dalam rentang %s dan %s.",
  minlength:      "Terlalu pendek, minimal %s karakter atau lebih.",
  maxlength:      "Terlalu panjang, maksimal %s karakter atau kurang.",
  length:         "Panjang karakter harus dalam rentang %s dan %s",
  mincheck:       "Pilih minimal %s pilihan",
  maxcheck:       "Pilih maksimal %s pilihan",
  check:          "Pilih antara %s dan %s pilihan",
  equalto:        "Harus sama"
});

// If file is loaded after Parsley main file, auto-load locale
if ('undefined' !== typeof window.ParsleyValidator)
  window.ParsleyValidator.addCatalog('id', window.ParsleyConfig.i18n.id, true);
