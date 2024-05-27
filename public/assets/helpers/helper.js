
// Fungsi untuk mengonversi tanggal dari format YYYY-MM-DD menjadi format "dd MonthName YYYY"
function dateFormat(dateString) {
  // Pisahkan tahun, bulan, dan hari
  var parts = dateString.split("-");
  var year = parts[0];
  var month = parts[1];
  var day = parts[2];

  // Buat objek Date dengan tanggal yang diberikan
  var date = new Date(year, month - 1, day); // Bulan dimulai dari 0 (Januari adalah bulan 0)

  // Daftar nama bulan dalam bahasa Indonesia
  var monthNames = [
    "Januari", "Februari", "Maret",
    "April", "Mei", "Juni", "Juli",
    "Agustus", "September", "Oktober",
    "November", "Desember"
  ];

  // Ubah format tanggal menjadi "dd MonthName YYYY"
  var formattedDate = ("0" + date.getDate()).slice(-2) + " " + monthNames[date.getMonth()] + " " + date.getFullYear();

  return formattedDate;
}

// Fungsi untuk mengonversi tanggal dari format "dd MonthName YYYY" menjadi format YYYY-MM-DD
function convertDateFormat(formattedDate) {
  // Pisahkan tanggal, nama bulan, dan tahun
  var parts = formattedDate.split(" ");
  var day = parts[0];
  var monthName = parts[1];
  var year = parts[2];

  // Daftar nama bulan dalam bahasa Indonesia
  var monthNames = {
    "Januari": "01", "Februari": "02", "Maret": "03",
    "April": "04", "Mei": "05", "Juni": "06", "Juli": "07",
    "Agustus": "08", "September": "09", "Oktober": "10",
    "November": "11", "Desember": "12"
  };

  // Ambil kode bulan dari daftar nama bulan
  var monthNumber = monthNames[monthName];

  // Format tanggal menjadi "YYYY-MM-dd"
  var formattedDate = year + "-" + monthNumber + "-" + day;

  return formattedDate;
}

// Fungsi format angka dengan pemisah ribuan
function thousandsNumberFormat(number) {
  return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Menyembunyikan modal
function hideModal(idModal) {
  $(idModal).modal('hide');
}

// Menampilkan modal
function showModal(idModal) {
  $(idModal).modal('show');
}

// Tampil loader
function showLoader(classLoader = ".loader-container") {
  $(classLoader).removeClass("d-none");
}

// Hilangkan loader
function hideLoader(classLoader = ".loader-container") {
  $(classLoader).addClass("d-none");
}

// Notify success
function notifySuccess(message, title = "Berhasil", align = "right") {
  $.notify({
    icon: 'fas fa-check',
    title: title,
    message: message,
  }, {
    type: 'success',
    placement: {
      from: "top",
      align: align
    },
    time: 1000,
  });
}

// Notify failed
function notifyFailed(message, title = "Gagal", align = "right") {
  $.notify({
    icon: 'fas fa-times',
    title: title,
    message: message,
  }, {
    type: 'danger',
    placement: {
      from: "top",
      align: align
    },
    time: 1000,
  });
}

// Notify success with hide loader
function notifySuccessWithHideLoader(message, title = "Berhasil", align = "right", classLoader = ".loader-container") {
  // Hide loader
  hideLoader(classLoader);
  // Notify
  notifySuccess(message, title, align);
}

// Notify failed with hide loader
function notifyFailedWithHideLoader(message, title = "Gagal", align = "right", classLoader = ".loader-container") {
  // Hide loader
  hideLoader(classLoader);
  // Notify
  notifyFailed(message, title, align);
}

// Notify success with hide loader with datatable reload ajax
function notifyLoaderDatatable(datatable, message, title = "Berhasil", classLoader = ".loader-container") {
  // Hide loader
  hideLoader(classLoader);
  // Notify
  notifySuccess(message, title);
  // Reload table
  datatable.ajax.reload();
}

function decodeHtml(html) {
  let txt = document.createElement("textarea");
  txt.innerHTML = html;
  return txt.value;
}