@extends('layouts.main', ['title' => 'Evaluasi Atasan', 'title_header' => 'Data Evaluasi Atasan'])

@section('content')
  {{-- Content --}}
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
            <table id="tableData" class="display table table-striped table-hover" style="width: 100%">
              <thead style="background-color: #0B2D61 !important; color: rgb(232, 229, 229);">
                <tr>
                  <th>No</th>
                  <th>Kode Evaluasi Atasan</th>
                  <th>NRP Karyawan</th>
                  <th>Nama Karyawan</th>
                  <th>Posisi</th>
                  <th>Departemen</th>
                  <th>Nama Pelatihan</th>
                  <th>Bulan Pelatihan</th>
                  <th>Jenis Pelatihan</th>
                  <th>Nama Atasan</th>
                  <th>Status Penilaian</th>
                  <th>Status Approve</th>
                  <th>Review File</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Evaluasi Atasan</th>
                  <th>NRP Karyawan</th>
                  <th>Nama Karyawan</th>
                  <th>Posisi</th>
                  <th>Departemen</th>
                  <th>Nama Pelatihan</th>
                  <th>Bulan Pelatihan</th>
                  <th>Jenis Pelatihan</th>
                  <th>Nama Atasan</th>
                  <th>Status Penilaian</th>
                  <th>Status Approve</th>
                  <th>Review File</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
              </tbody>
            </table>
        </div>
        @if ($user->level == 'Administrasi')
          <div class="card-footer text-center">
            <div class="d-grid d-md-block">
              <button data-toggle="modal" data-target="#modalImport" type="button"
                class="btn fw-bold btn-primary mr-0 mr-sm-2">
                Import Excel
              </button>
              <a href="{{ route('export.evaluasi_atasan') }}" target="_blank" class="btn fw-bold btn-info">
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
                  <label class="pb-1 fw-bold">Kode Evaluasi Atasan</label>
                  <input type="text" class="form-control" name="kode_evaluasi_atasan">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">NRP Karyawan</label>
                  <input type="text" class="form-control" name="nrp_karyawan">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Nama Karyawan</label>
                  <input type="text" class="form-control" name="nama_karyawan" required>
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
                  <label class="pb-1 fw-bold">Bulan Pelatihan</label>
                  <input type="text" class="form-control" name="bulan_tahun_pelatihan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Jenis Pelatihan</label>
                  <input type="text" class="form-control" name="jenis_pelatihan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Vendor Pelatihan</label>
                  <input type="text" class="form-control" name="vendor_pelatihan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">NRP Atasan</label>
                  <input type="text" class="form-control" name="nrp_atasan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Nama Atasan</label>
                  <input type="text" class="form-control" name="nama_atasan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Posisi Atasan</label>
                  <input type="text" class="form-control" name="posisi_atasan" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Posisi Atasan HCGA</label>
                  <input type="text" class="form-control" name="posisi_atasan_hcga" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="pb-1 fw-bold">Nama Atasan HCGA</label>
                  <input type="text" class="form-control" name="nama_atasan_hcga" required>
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
                    <a href="/assets/img/format/export2.png" class="btn btn-sm btn-danger p-0 text-white"
                      target="_blank" style="padding: 1.6px 13px !important; font-size: 12px; font-weight: 500;">Lihat
                      Format</a>&nbsp;
                    <a href="/assets/excel/contoh2.xlsx" class="btn btn-sm btn-danger p-0 text-white" target="_blank"
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
        scrollX: true,
        language: bahasa(),
        processing: true,
        serverSide: true,
        ajax: "{{ url()->current() }}",
        createdRow: function(row, data, dataIndex) {
          $('td:eq(0)', row).css('min-width', '55px');
          $('td:eq(1)', row).css('min-width', '106px');
          $('td:eq(2)', row).css('min-width', '106px');
          $('td:eq(3)', row).css('min-width', '200px');
          $('td:eq(4)', row).css('min-width', '106px');
          $('td:eq(5)', row).css('min-width', '106px');
          $('td:eq(6)', row).css('min-width', '250px');
          $('td:eq(7)', row).css('min-width', '106px');
          $('td:eq(8)', row).css('min-width', '106px');
          $('td:eq(9)', row).css('min-width', '200px');
          $('td:eq(10)', row).css('min-width', '106px');
          $('td:eq(11)', row).css('min-width', '106px');
          $('td:eq(12)', row).css('min-width', '106px');
          $('td:eq(13)', row).css('min-width', '106px');
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
            data: 'kode_evaluasi_atasan'
          },
          {
            data: 'nrp_karyawan'
          },
          {
            data: 'nama_karyawan'
          },
          {
            data: 'posisi'
          },
          {
            data: 'departemen'
          },
          {
            data: 'nama_pelatihan',
          },
          {
            data: 'bulan_tahun_pelatihan'
          },
          {
            data: 'jenis_pelatihan'
          },
          {
            data: 'nama_atasan',
          },
          {
            data: 'status_penilaian',
            render: function(data, type, row) {
              if (data != "Belum") {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-success d-inline">
                          <i class="far fa-check-circle" style="font-size: 14px; position: absolute; left: 7px; top: 50%; transform: translateY(-50%);"></i>
                          <span>${data}</span>
                        </button>
                `;
              } else {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-warning d-inline">
                          <i class="far fa-times-circle" style="font-size: 14px; position: absolute; left: 7.5px; top: 51.5%; transform: translateY(-50%);"></i>
                          <span>${data}</span>
                        </button>
                `;
              }
            }
          },
          {
            data: 'status_approve',
            render: function(data, type, row) {
              if (data != "Belum") {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-success d-inline">
                          <i class="far fa-check-circle" style="font-size: 14px; position: absolute; left: 7px; top: 50%; transform: translateY(-50%);"></i>
                          <span>${data}</span>
                        </button>
                `;
              } else {
                return `<button style="cursor: default; position: relative; padding-left: 25px;" 
                          class="btn fw-bold btn-sm btn-warning d-inline">
                          <i class="far fa-times-circle" style="font-size: 14px; position: absolute; left: 7.5px; top: 51.5%; transform: translateY(-50%);"></i>
                          <span>${data}</span>
                        </button>
                `;
              }
            }
          },
          {
            data: 'id',
            render: function(data) {
              return `<a class="btn btn-sm btn-info text-white btn-file" href="/data-evaluasi-atasan/review-file/${data}" target="_black">
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
                if (row.status_penilaian == "Sudah" && row.status_approve == "Belum") {
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
            targets: [0, 1, 2, 4, 5, 7, 8, 10, 11, 12, 13],
            className: "text-center align-middle text-capitalize text-nowrap"
          },
          {
            targets: [3, 6, 9],
            className: "align-middle text-capitalize"
          }
        ],
        initComplete: function() {
          var table = this;

          this.api()
            .columns()
            .every(function(index) {
              let column = this;

              // Skip kolom
              if (index === 0 || index === 12 || index === 13) {
                return;
              }

              let select = document.createElement('select');
              select.classList.add('custom-select');
              select.style.width = '100%'; 

              let defaultOption = new Option('Pilih Filter');
              defaultOption.selected = true;
              select.add(defaultOption);

              column.footer().replaceChildren(select);
              column
                .data()
                .unique()
                .sort()
                .each(function(d, j) {
                  let option = new Option(decodeHtml(d));
                  select.add(option);
                });

              $(select).select2();
              $(select).on('change', function() {
                if (select.value === 'Pilih Filter') {
                  column.search('').draw();
                } else {
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
              url: `/data-evaluasi-atasan/${id}`,
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
          url: `/data-evaluasi-atasan/edit/${id}`,
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
              $("#modalEdit input[name='kode_evaluasi_atasan']").val(response.data
                .kode_evaluasi_atasan);
              $("#modalEdit input[name='nrp_karyawan']").val(response.data
                .nrp_karyawan);
              $("#modalEdit input[name='nama_karyawan']").val(response.data
                .nama_karyawan);
              $("#modalEdit select[name='departemen']").val(response.data
                .departemen);
              $("#modalEdit input[name='nama_pelatihan']").val(response.data
                .nama_pelatihan);
              $("#modalEdit input[name='bulan_tahun_pelatihan']").val(response.data
                .bulan_tahun_pelatihan);
              $("#modalEdit input[name='jenis_pelatihan']").val(response.data
                .jenis_pelatihan);
              $("#modalEdit input[name='vendor_pelatihan']").val(response.data
                .vendor_pelatihan);
              $("#modalEdit input[name='nrp_atasan']").val(response.data
                .nrp_atasan);
              $("#modalEdit input[name='nama_atasan']").val(response.data
                .nama_atasan);
              $("#modalEdit input[name='posisi_atasan']").val(response.data
                .posisi_atasan);
              $("#modalEdit input[name='nama_atasan_hcga']").val(response.data
                .nama_atasan_hcga);
              $("#modalEdit input[name='posisi_atasan_hcga']").val(response.data
                .posisi_atasan_hcga);

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
          kode_evaluasi_atasan: {
            required: true,
          },
          nrp_karyawan: {
            required: true,
          },
          nama_karyawan: {
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
          bulan_tahun_pelatihan: {
            required: true,
          },
          jenis_pelatihan: {
            required: true,
          },
          vendor_pelatihan: {
            required: true,
          },
          nrp_atasan: {
            required: true,
          },
          nama_atasan: {
            required: true,
          },
          posisi_atasan: {
            required: true,
          },
          nama_atasan_hcga: {
            required: true,
          },
          posisi_atasan_hcga: {
            required: true,
          },
        },
        // Deklarasi pesan atau alert yang muncul, ketike value pada input form tidak sesuai rules
        messages: {
          kode_evaluasi_atasan: {
            required: "Kode evaluasi atasan harus diisi",
          },
          nrp_karyawan: {
            required: "NRP karyawan harus diisi",
          },
          nama_karyawan: {
            required: "Nama karyawan harus diisi",
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
          bulan_tahun_pelatihan: {
            required: "Bulan pelatihan harus diisi",
          },
          jenis_pelatihan: {
            required: "Jenis pelatihan harus diisi",
          },
          vendor_pelatihan: {
            required: "Vendor pelatihan harus diisi",
          },
          nrp_atasan: {
            required: "NRP atasan harus diisi",
          },
          nama_atasan: {
            required: "Nama atasan harus diisi",
          },
          posisi_atasan: {
            required: "Posisi atasan harus diisi",
          },
          nama_atasan_hcga: {
            required: "Nama atasan HCGA harus diisi",
          },
          posisi_atasan_hcga: {
            required: "Posisi atasan HCGA harus diisi",
          },
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
          error.addClass("invalid-feedback");

          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        },
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
            url: `/data-evaluasi-atasan/${id}`,
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
        errorElement: "div",
        errorPlacement: function(error, element) {
          error.addClass("invalid-feedback");

          if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
          } else {
            error.insertAfter(element);
          }
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).addClass("is-valid").removeClass("is-invalid");
        },
        submitHandler: function(form) {

          // Tampil loader
          showLoader();

          // Mengambil data dari form
          var formData = new FormData(form);

          // Mengambil nilai token CSRF dari tag meta
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
            type: "POST",
            url: "{{ route('import.evaluasi_atasan') }}",
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
        $(`#modalEdit input[name="kode_evaluasi_atasan"]`).val("");
        $(`#modalEdit input[name="nrp_karyawan"]`).val("");
        $(`#modalEdit input[name="nama_karyawan"]`).val("");
        $(`#modalEdit select[name="departemen"]`).val("");
        $(`#modalEdit select[name="posisi"]`).empty();
        $(`#modalEdit select[name="posisi"]`).append(`<option value="">Pilih Posisi</option>`);
        $(`#modalEdit input[name="nama_pelatihan"]`).val("");
        $(`#modalEdit input[name="bulan_tahun_pelatihan"]`).val("");
        $(`#modalEdit input[name="jenis_pelatihan"]`).val("");
        $(`#modalEdit input[name="vendor_pelatihan"]`).val("");
        $(`#modalEdit input[name="nrp_atasan"]`).val("");
        $(`#modalEdit input[name="nama_atasan"]`).val("");
        $(`#modalEdit input[name="posisi_atasan"]`).val("");
        $(`#modalEdit input[name="nama_atasan_hcga"]`).val("");
        $(`#modalEdit input[name="posisi_atasan_hcga"]`).val("");
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
          url: `/data-evaluasi-atasan/approve/${id}`,
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
