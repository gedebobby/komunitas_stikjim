$(document).on("click", "#btn-edit-admin", function() {
  var id_admin = $(this).data("id_admin");
  var username = $(this).data("username");
  var role = $(this).data("role");

  $("#id_admin").val(id_admin);
  $("#username-edit").val(username);
  $("#role-edit")
    .val(role)
    .change();
});
$(document).on("click", "#tampilBP", function() {
  var buktipembayaran = $(this).data("buktipembayaran");

  $("#previewBP").attr("src", "/image/" + buktipembayaran);

  console.log(buktipembayaran);
});

// $(document).on("click", "#pop", function() {
//   $("#imagepreview").attr("src", $("#imageresource").attr("src")); // here asign the image to the modal when the user click the enlarge link
//   $("#imagemodal").modal("show"); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
// });

$(document).on("click", "#btn-edit-komunitas", function() {
  var id_komunitas = $(this).data("id_komunitas");
  var komunitas = $(this).data("komunitas");
  var koordinator = $(this).data("koordinator");

  $("#edit-id-komunitas").val(id_komunitas);
  $("#edit-komunitass").val(komunitas);
  $("#edit-koordinator").val(koordinator);
});

$(document).on("click", "#btn-edit-anggota", function() {
  var id_user = $(this).data("id_user");
  var nama = $(this).data("nama");
  var nim = $(this).data("nim");
  var noponsel = $(this).data("noponsel");
  var id_komunitas_anggota = $(this).data("id_komunitas_anggota");
  var email = $(this).data("email");
  var id_angkatan = $(this).data("id_angkatan");

  $("#id-user").val(id_user);
  $("#edit-nama-anggota").val(nama);
  $("#edit-nim-anggota").val(nim);
  $("#edit-no-ponsel").val(noponsel);
  $("#edit-email-anggota").val(email);
  $("#edit-komunitas-anggota")
    .val(id_komunitas_anggota)
    .change();
  $("#edit-id-angkatan")
    .val(id_angkatan)
    .change();
});

$(document).on("click", "#btn-edit-tahun-angkatan", function() {
  var id_angkatan = $(this).data("id_angkatan");
  var tahun_angkatan = $(this).data("tahun_angkatan");

  $("#edit-id-angkatan").val(id_angkatan);
  $("#angkatan-edit").val(tahun_angkatan);

  // console.log(id_angkatan);
});

$(document).on("click", "#btn-edit-absen", function() {
  var id_absen = $(this).data("id_absen");
  var nama = $(this).data("nama_anggota");
  var nim = $(this).data("nim_anggota");
  var keterangan = $(this).data("keterangan");

  $("#edit-id-absen").val(id_absen);
  $("#nama-absen-edit").val(nama);
  $("#nim-absen-edit").val(nim);
  $("#keterangan-absen-edit")
    .val(keterangan)
    .change();

  // console.log(id_angkatan);
});

$(document).on("click", "#btn-edit-event", function() {
  var id_event = $(this).data("id_event");
  var nama_event = $(this).data("nama_event");
  var tgl_event = $(this).data("tgl_event");
  var waktu_event = $(this).data("waktu_event");
  var kategori_event = $(this).data("kategori_event");
  var deskripsi = $(this).data("deskripsi");
  var lokasi_event = $(this).data("lokasi_event");
  var id_komunitas = $(this).data("id_komunitas");
  var gambar = $(this).data("gambar");

  $("#id-event").val(id_event);
  $("#nama-event").val(nama_event);
  $("#tgl-event").val(tgl_event);
  $("#waktu-event").val(waktu_event);
  $("#lokasi-event").val(lokasi_event);
  $("#deskripsi-event").val(deskripsi);
  $("#edit-gambar-tampil").text(gambar);
  $("#editgambarlama").val(gambar);
  $("#edit-komunitas")
    .val(id_komunitas)
    .change();
  $("#kategori-event")
    .val(kategori_event)
    .change();
});

$(document).on("click", "#btn-edit-kegiatan", function() {
  var id_kegiatan = $(this).data("id_kegiatan");
  var waktu_kegiatan = $(this).data("waktu_kegiatan");
  var lokasi_kegiatan = $(this).data("lokasi_kegiatan");
  var pengumuman = $(this).data("pengumuman");
  var hari_kegiatan = $(this).data("hari_kegiatan");

  $("#id-kegiatan").val(id_kegiatan);
  $("#waktu-kegiatan").val(waktu_kegiatan);
  $("#lokasi-kegiatan").val(lokasi_kegiatan);
  $("#pengumuman-kegiatan").val(pengumuman);
  $("#hari-kegiatan")
    .val(hari_kegiatan)
    .change();
});
