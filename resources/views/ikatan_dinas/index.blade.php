@extends('layouts.main', ['title' => 'Approval Ikatan Dinas'])

@section('content')
  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="tableData" class="display table table-striped table-hover">
              <thead style="background-color: #0B2D61 !important; color: rgb(232, 229, 229);">
                <tr>
                  <th>No</th>
                  <th>Kode Ikatan Dinas</th>
                  <th>NRP Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Departemen</th>
                  <th>Posisi</th>
                  <th>Nama Pelatihan</th>
                  <th>Waktu Pelatihan</th>
                  <th>Biaya Pelatihan</th>
                  <th>Lama Ikatan Dinas</th>
                  <th>Tanggal Selesai Ikatan Dinas</th>
                  <th>Ditandatangani</th>
                  <th>Approve</th>
                  <th>Review File</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Ikatan Dinas</th>
                  <th>NRP Peserta</th>
                  <th>Nama Peserta</th>
                  <th>Departemen</th>
                  <th>Posisi</th>
                  <th>Nama Pelatihan</th>
                  <th>Waktu Pelatihan</th>
                  <th>Biaya Pelatihan</th>
                  <th>Lama Ikatan Dinas</th>
                  <th>Tanggal Selesai Ikatan Dinas</th>
                  <th>Ditandatangani</th>
                  <th>Approve</th>
                  <th>Review File</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
        @if ($user->level == 'Administrasi')
          <div class="card-footer text-center">
            <div class="d-grid d-md-block">
              <button data-toggle="modal" data-target="#modalImport" type="button"
                class="btn fw-bold btn-primary mr-0 mr-sm-2">
                Import Excel
              </button>
              <a href="{{ route('export.ikatan_dinas') }}" target="_blank" class="btn fw-bold btn-info">
                Export Excel
              </a>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
  {{-- Content End --}}

  <!-- Modal Edit Data -->
  <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form class="needs-validation" novalidate>
          <div class="modal-header">
            <h5 class="modal-title h2 fw-bold" id="exampleModalLabel">Ubah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Kode Ikatan Dinas</label>
                  <input type="text" class="form-control" name="kode_ikatan_dinas">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">NRP Peserta</label>
                  <input type="text" class="form-control" name="nrp_peserta">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Nama Peserta</label>
                  <input type="text" class="form-control" name="nama_peserta" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Departemen</label>
                  <select name="departemen" class="custom-select" required>
                    <option value="">Pilih Departemen</option>
                    <option value="PRODUKSI">PRODUKSI</option>
                    <option value="PLANT">PLANT</option>
                    <option value="ENGINEERING">ENGINEERING</option>
                    <option value="COE">COE</option>
                    <option value="FA & LOGISTIK">FA & LOGISTIK</option>
                    <option value="SHE">SHE</option>
                    <option value="HCGA">HCGA</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Posisi</label>
                  <select name="posisi" class="custom-select" required>
                    <option value="">Pilih Posisi</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Nama Pelatihan</label>
                  <input type="text" class="form-control" name="nama_pelatihan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Waktu Pelatihan</label>
                  <input type="date" class="form-control" name="waktu_pelatihan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Biaya Pelatihan</label>
                  <input type="number" class="form-control" name="biaya_pelatihan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Lama Ikatan Dinas</label>
                  <input type="text" class="form-control" name="lama_ikatan_dinas" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Tanggal Selesai Ikatan Dinas</label>
                  <input type="date" class="form-control" name="tgl_selesai_ikatan_dinas" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Nomor Surat</label>
                  <input type="text" class="form-control" name="no_surat" required>
                </div>
              </div>
            </div>
            <input type="hidden" name="id">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Edit Data End -->

  <!-- Modal Import -->
  <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form class="needs-validation-import" novalidate>
          <div class="modal-header">
            <h5 class="modal-title h2 fw-bold" id="exampleModalLabel">Import Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">File Excel</label>
                  <input type="file" class="form-control" name="file" accept=".xlsx,.xls,.csv" required>
                  <span style="display: block; font-size: 12px; font-weight: 500; margin-top: 7px;">
                    Format file excel :&nbsp;
                    <a href="/assets/img/format/export.png" class="btn btn-sm btn-danger p-0 text-white"
                      target="_blank" style="padding: 1.6px 13px !important; font-size: 12px; font-weight: 500;">Lihat
                      Format</a>&nbsp;
                    <a href="/assets/excel/contoh.xlsx" class="btn btn-sm btn-danger p-0 text-white" target="_blank"
                      style="padding: 1.6px 13px !important; font-size: 12px; font-weight: 500;">Contoh
                      File</a>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- Modal Import End -->
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {

      // Datatable
      var dataTable = $('#tableData').DataTable({
        pageLength: 25,
        processing: true,
        serverSide: true,
        ajax: "{{ url()->current() }}",
        // Untuk mengatur tampilan baris pada table
        createdRow: function(row, data, dataIndex) {
          $('td:eq(1)', row).css('min-width', '106px');
          $('td:eq(2)', row).css('min-width', '106px');
          $('td:eq(3)', row).css('min-width', '200px');
          $('td:eq(4)', row).css('min-width', '106px');
          $('td:eq(5)', row).css('min-width', '106px');
          $('td:eq(6)', row).css('min-width', '250px');
          $('td:eq(7)', row).css('min-width', '106px');
          $('td:eq(8)', row).css('min-width', '106px');
          $('td:eq(9)', row).css('min-width', '106px');
          $('td:eq(10)', row).css('min-width', '106px');
          $('td:eq(11)', row).css('min-width', '106px');
          $('td:eq(12)', row).css('min-width', '106px');
          $('td:eq(13)', row).css('min-width', '106px');
          $('td:eq(14)', row).css('min-width', '106px');
        },
        columns: [{
            data: 'id',
            orderable: false,
            searchable: false,
            render: function(data, type, row, meta) {
              return new Intl.NumberFormat('id-ID').format(meta.row + meta.settings
                ._iDisplayStart + 1);
            }
          },
          {
            data: 'kode_ikatan_dinas'
          },
          {
            data: 'nrp_peserta'
          },
          {
            data: 'nama_peserta'
          },
          {
            data: 'departemen'
          },
          {
            data: 'posisi'
          },
          {
            data: 'nama_pelatihan',
          },
          {
            data: 'waktu_pelatihan',
            render: function(data) {
              return dateFormat(data);
            }
          },
          {
            data: 'biaya_pelatihan',
            render: function(data) {
              return "Rp. " + thousandsNumberFormat(data);
            }
          },
          {
            data: 'lama_ikatan_dinas',
          },
          {
            data: 'tgl_selesai_ikatan_dinas',
            render: function(data) {
              return dateFormat(data);
            }
          },
          {
            data: 'status',
            render: function(data, type, row) {
              if (data != 0) {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-success d-inline">
                          <i class="far fa-check-circle" style="font-size: 14px; position: absolute; left: 7px; top: 50%; transform: translateY(-50%);"></i>
                          <span>Sudah</span>
                        </button>
                `;
              } else {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-warning d-inline">
                          <i class="far fa-times-circle" style="font-size: 14px; position: absolute; left: 7.5px; top: 51.5%; transform: translateY(-50%);"></i>
                          <span>Belum</span>
                        </button>
                `;
              }
            }
          },
          {
            data: 'approve',
            render: function(data, type, row) {
              if (data != 0) {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-success d-inline">
                          <i class="far fa-check-circle" style="font-size: 14px; position: absolute; left: 7px; top: 50%; transform: translateY(-50%);"></i>
                          <span>Sudah</span>
                        </button>
                `;
              } else {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-warning d-inline">
                          <i class="far fa-times-circle" style="font-size: 14px; position: absolute; left: 7.5px; top: 51.5%; transform: translateY(-50%);"></i>
                          <span>Belum</span>
                        </button>
                `;
              }
            }
          },
          {
            data: 'id',
            render: function(data) {
              return `<a class="btn btn-sm btn-info text-white btn-file" href="/data-ikatan-dinas/review-file/${data}" target="_black">
                      <i class="far fa-file-pdf"></i>
                    </a>`;
            }
          },
          @if ($user->level == 'Administrasi') // untuk user administrasi
            {
              data: 'id',
              render: function(data) {
                return `
              <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-sm btn-warning btn-edit" data-id="${data}">
                <i class="fas fa-pen"></i>
                </a>
                <a class="btn btn-sm btn-danger btn-delete text-white" data-id="${data}">
                <i class="far fa-trash-alt"></i>
                </a>
              </div>
            `;
              }
            },
          @else // untuk user atasan
            {
              data: 'id',
              render: function(data, type, row) {
                if (row.approve == 0 && row.status == 1) {
                  return `
                      <div class="d-grid gap-2 d-md-block">
                        <button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-success d-inline btn-approve" data-id="${data}">
                          <i class="fas fa-check-double" style="font-size: 14px; position: absolute; left: 7px; top: 50%; transform: translateY(-50%);"></i>
                          <span>Approve</span>
                        </button>
                      </div>
                `;
                } else {
                  return "-";
                }
              }
            },
          @endif
        ],
        columnDefs: [{
            targets: [0, 1, 2, 4, 5, 7, 8, 9, 10, 11, 12, 13, 14],
            className: "text-center align-middle text-capitalize text-nowrap"
          },
          {
            targets: [3, 6],
            className: "align-middle text-capitalize"
          }
        ],
        initComplete: function() {
          var table = this;

          // Mendapatkan setiap kolom dalam tabel menggunakan API DataTables
          this.api()
            .columns()
            .every(function(index) {
              let column = this; // kolom saat ini dalam iterasi

              // Skip kolom
              if (index === 0 || index === 13 || index === 14) {
                return;
              }

              // Membuat elemen <select> baru untuk setiap kolom
              let select = document.createElement('select');
              // Menambahkan kelas CSS 'form-control' ke elemen <select> 
              select.classList.add('custom-select');
              select.classList.add('select2');
              // Membuat opsi default dengan teks "Pilih Filter"
              let defaultOption = new Option('Pilih Filter');
              // Menandai opsi default sebagai yang terpilih saat pertama kali
              defaultOption.selected = true;
              // Menambahkan opsi default ke dalam elemen <select>
              select.add(defaultOption);

              // Mengganti konten di footer kolom dengan elemen <select> yang baru dibuat
              column.footer().replaceChildren(select);

              // Mendapatkan data unik dari kolom saat ini, mengurutkannya, dan untuk setiap entri, membuat opsi baru dalam elemen <select> yang sesuai dengan nilai unik tersebut
              column
                .data()
                .unique()
                .sort()
                .each(function(d, j) {
                  let option = new Option(decodeHtml(d));
                  select.add(option);
                });

              // Inisialisasi Select2 pada elemen select setelah opsi ditambahkan
              $(select).select2();

              // Menambahkan event listener untuk menangani perubahan nilai pada elemen <select>
              $(select).on('change', function() {
                // Memeriksa apakah pengguna memilih opsi "Pilih Filter"
                if (select.value === 'Pilih Filter') {
                  // Membersihkan pencarian pada kolom saat ini jika opsi "Pilih Filter" dipilih, sehingga semua data ditampilkan
                  column.search('').draw();
                } else {
                  // Menerapkan pencarian dengan nilai yang dipilih pada kolom saat ini dan menggambar ulang tabel
                  column
                    .search(select.value, {
                      exact: true
                    })
                    .draw();
                }
              });
            });
        }
      });
      // Datatable End

      // Proses Delete
      $(document).on("click", ".btn-delete", function() {

        swal({
          title: 'Kamu yakin hapus data ini?',
          text: "Data tidak dapat dikembalikan lagi!",
          type: 'warning',
          buttons: {
            confirm: {
              text: 'Ya, hapus!',
              className: 'btn btn-success'
            },
            cancel: {
              text: 'Batal',
              visible: true,
              className: 'btn btn-danger'
            }
          }
        }).then((Delete) => {
          if (Delete) {

            showLoader(); // Tampil loader
            var id = $(this).attr("data-id"); // Ambil id data

            // Mengambil nilai token CSRF dari tag meta
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Melakukan request AJAX
            $.ajax({
              type: "POST",
              url: `/data-ikatan-dinas/${id}`,
              headers: {
                'X-CSRF-TOKEN': csrfToken
              },
              data: {
                "_method": "DELETE"
              },
              dataType: "JSON",
              success: function(response) {

                if (response.status == "success") {
                  // Menampilkan notif, hilangkan loader dan refresh table
                  notifyLoaderDatatable(dataTable, response.message);
                }
              },
              error: function(xhr, status, error) {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader(response.message);
              }
            });
          } else {
            swal.close();
          }
        });
      });
      // Proses Delete - End

      // Proses Edit
      $(document).on("click", ".btn-edit", function() {

        var id = $(this).attr("data-id");
        // Mengambil nilai token CSRF dari tag meta
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Melakukan request AJAX
        $.ajax({
          type: "GET",
          url: `/data-ikatan-dinas/edit/${id}`,
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          success: function(response) {


            if (response.status == "success") {

              // Menghapus kelas is-valid dari setiap elemen input dan select dalam formulir
              $(".needs-validation :input, .needs-validation select").removeClass(
                "is-valid");
              $(".needs-validation :input, .needs-validation select").removeClass(
                "is-invalid");
              $(".invalid-feedback").remove();

              // Isi data pada form 
              $("#modalEdit input[name='id']").val(response.data.id);
              $("#modalEdit input[name='kode_ikatan_dinas']").val(response.data
                .kode_ikatan_dinas);
              $("#modalEdit input[name='nrp_peserta']").val(response.data
                .nrp_peserta);
              $("#modalEdit input[name='nama_peserta']").val(response.data
                .nama_peserta);
              $("#modalEdit select[name='departemen']").val(response.data
                .departemen);
              $("#modalEdit input[name='nama_pelatihan']").val(response.data
                .nama_pelatihan);
              $("#modalEdit input[name='waktu_pelatihan']").val(response.data
                .waktu_pelatihan);
              $("#modalEdit input[name='biaya_pelatihan']").val(response.data
                .biaya_pelatihan);
              $("#modalEdit input[name='lama_ikatan_dinas']").val(response.data
                .lama_ikatan_dinas);
              $("#modalEdit input[name='tgl_selesai_ikatan_dinas']").val(response
                .data.tgl_selesai_ikatan_dinas);
              $("#modalEdit input[name='no_surat']").val(response.data.no_surat);

              // Inisiasi options
              setSelectPosisi(response.data.departemen);
              $("#modalEdit select[name='posisi']").val(response.data.posisi);

              showModal("#modalEdit"); // Menampilkan modal
            }
          },
          error: function(error) {}
        })
      });
      // Proses Edit - End

      // Proses Update - Start
      $(".needs-validation").validate({
        ignore: [],
        // Deklarasi rules untuk validasi
        rules: {
          kode_ikatan_dinas: {
            required: true,
          },
          nrp_peserta: {
            required: true,
          },
          nama_peserta: {
            required: true,
          },
          departemen: {
            required: true,
          },
          posisi: {
            required: true,
          },
          nama_pelatihan: {
            required: true,
          },
          waktu_pelatihan: {
            required: true,
          },
          biaya_pelatihan: {
            required: true,
          },
          lama_ikatan_dinas: {
            required: true,
          },
          tgl_selesai_ikatan_dinas: {
            required: true,
          },
          no_surat: {
            required: true,
          },
        },
        // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
        messages: {
          kode_ikatan_dinas: {
            required: "Kode ikatan dinas harus diisi",
          },
          nrp_peserta: {
            required: "NRP peserta harus diisi",
          },
          nama_peserta: {
            required: "Nama peserta harus diisi",
          },
          departemen: {
            required: "Departemen harus diisi",
          },
          posisi: {
            required: "Posisi harus diisi",
          },
          nama_pelatihan: {
            required: "Nama pelatihan harus diisi",
          },
          waktu_pelatihan: {
            required: "Waktu pelatihan harus diisi",
          },
          biaya_pelatihan: {
            required: "Biaya pelatihan harus diisi",
          },
          lama_ikatan_dinas: {
            required: "Lama ikatan dinas harus diisi",
          },
          tgl_selesai_ikatan_dinas: {
            required: "Tanggal selesai ikatan dinas harus diisi",
          },
          no_surat: {
            required: "Nomor surat harus diisi",
          },
        },
        // Element errornya berupa div
        errorElement: "div",
        errorPlacement: function(error, element) {
          // Menyisipkan class invalid-feedback di element error
          error.addClass("invalid-feedback");

          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        // Menyisipkan class is-invalid pada element form yang valuenya error
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        // Menyisipkan class is-valid pada element form yang valuenya sudah benar
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        },
        // Menjalankan fungsi ketika form valid
        submitHandler: function(form) {

          // Tampil loader
          showLoader();

          // Mengambil data dari form
          var id = $(`#modalEdit input[name="id"]`).val();
          var formData = new FormData(form);
          formData.append("_method", "PUT");

          // Mengambil nilai token CSRF dari tag meta
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: "POST",
            url: `/data-ikatan-dinas/${id}`,
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(response) {

              if (response.status === "success") {
                hideModal("#modalEdit"); // tutup modal
                // Menampilkan notif, hilangkan loader dan refresh table
                notifyLoaderDatatable(dataTable, response.message);
              } else {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader(response.message);
              }
            },
            error: function(xhr, status, error) {
              // Menampilkan notif dan hilangkan loader
              notifyFailedWithHideLoader(response.message);
            }
          });
        }
      });
      // Proses Update - End

      // Proses Import Excel - Start
      $(".needs-validation-import").validate({
        ignore: [],
        // Deklarasi rules untuk validasi
        rules: {
          file: {
            required: true,
          },
        },
        // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
        messages: {
          file: {
            required: "File harus diisi",
          },
        },
        // Element errornya berupa div
        errorElement: "div",
        errorPlacement: function(error, element) {
          // Menyisipkan class invalid-feedback di element error
          error.addClass("invalid-feedback");

          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        // Menyisipkan class is-invalid pada element form yang valuenya error
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        // Menyisipkan class is-valid pada element form yang valuenya sudah benar
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        },
        // Menjalankan fungsi ketika form valid
        submitHandler: function(form) {

          // Tampil loader
          showLoader();

          // Mengambil data dari form
          var formData = new FormData(form);

          // Mengambil nilai token CSRF dari tag meta
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: "POST",
            url: "{{ route('import.ikatan_dinas') }}",
            headers: {
              'X-CSRF-TOKEN': csrfToken
            },
            data: formData,
            dataType: "JSON",
            contentType: false,
            processData: false,
            success: function(response) {

              if (response.status === "success") {
                hideModal("#modalImport"); // tutup modal
                // Menampilkan notif, hilangkan loader dan refresh table
                notifyLoaderDatatable(dataTable, response.message);
              } else {
                // Menampilkan notif dan hilangkan loader
                notifyFailedWithHideLoader(response.message);
              }
            },
            error: function(xhr, status, error) {
              // Menampilkan notif dan hilangkan loader
              notifyFailedWithHideLoader(response.message);
            }
          });
        }
      });
      // Proses Import Excel - End

      // Proses Tutup Modal Edit
      $('#modalEdit').on('hidden.bs.modal', function() {

        // Menghapus kelas is-valid dari setiap elemen input dan select dalam formulir
        $(".needs-validation :input, .needs-validation select").removeClass("is-valid");
        $(".needs-validation :input, .needs-validation select").removeClass("is-invalid");
        $(".invalid-feedback").remove();

        $(`#modalEdit input[name="id"]`).val("");
        $(`#modalEdit input[name="kode_ikatan_dinas"]`).val("");
        $(`#modalEdit input[name="nrp_peserta"]`).val("");
        $(`#modalEdit input[name="nama_peserta"]`).val("");
        $(`#modalEdit select[name="departemen"]`).val("");
        $(`#modalEdit select[name="posisi"]`).empty();
        $(`#modalEdit select[name="posisi"]`).append(`<option value="">Pilih Posisi</option>`);
        $(`#modalEdit input[name="nama_pelatihan"]`).val("");
        $(`#modalEdit input[name="waktu_pelatihan"]`).val("");
        $(`#modalEdit input[name="biaya_pelatihan"]`).val("");
        $(`#modalEdit input[name="lama_ikatan_dinas"]`).val("");
        $(`#modalEdit input[name="tgl_selesai_ikatan_dinas"]`).val("");
        $(`#modalEdit input[name="no_surat"]`).val("");
      });
      // Proses Tutup Modal Edit - End

      // Proses Tutup Modal Import
      $('#modalImport').on('hidden.bs.modal', function() {

        // Menghapus kelas is-valid dari setiap elemen input dan select dalam formulir
        $(".needs-validation-import :input, .needs-validation-import select").removeClass(
          "is-valid");
        $(".needs-validation-import :input, .needs-validation-import select").removeClass(
          "is-invalid");
        $(".invalid-feedback").remove();
        $(`#modalImport input[name="file"]`).val("");
      });
      // Proses Tutup Modal Import - End

      // Proses Approve
      $(document).on("click", ".btn-approve", function() {

        showLoader(); // Tampil loader
        var id = $(this).attr("data-id"); // Ambil id data

        // Mengambil nilai token CSRF dari tag meta
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          type: "POST",
          url: `/data-ikatan-dinas/approve/${id}`,
          headers: {
            'X-CSRF-TOKEN': csrfToken
          },
          data: {
            "_method": "PUT"
          },
          dataType: "JSON",
          success: function(response) {
            if (response.status == "success") {
              // Menampilkan notif, hilangkan loader dan refresh table
              notifyLoaderDatatable(dataTable, response.message);
            }
          },
          error: function(xhr, status, error) {
            // Menampilkan notif dan hilangkan loader
            notifyFailedWithHideLoader(response.message);
          }
        });
      });
      // Proses Approve - End
    });
  </script>
@endpush
