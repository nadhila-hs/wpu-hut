function tampilkanSemuaMenu() {
  $.getJSON('data/pizza.json', function(data) {
    let menu = data.menu;
  
    $.each(menu, function(i, data) {
      let rupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }).format(data.harga);
  
      $('#daftar-menu').append('<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '" class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">' + rupiah + '</h5><a href="#" class="btn btn-primary">Pesan sekarang</a></div></div></div>');
    })
  })
}

tampilkanSemuaMenu();


$('.nav-link').on('click', function() {
  $('.nav-link').removeClass('active');
  $(this).addClass('active');

  let kategori = $(this).html();
  $('h1').html(kategori);

  if (kategori == 'All Menu') {
    tampilkanSemuaMenu();
    return;
  }

  $.getJSON('data/pizza.json', function(data) {
    let menu = data.menu;
    let content = '';

    $.each(menu, function(i, data) {
      let rupiah = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
      }).format(data.harga);
      
      if(data.kategori == kategori.toLowerCase()) {
        content += '<div class="col-md-4"><div class="card mb-3"><img src="img/menu/' + data.gambar + '" class="card-img-top"><div class="card-body"><h5 class="card-title">' + data.nama + '</h5><p class="card-text">' + data.deskripsi + '</p><h5 class="card-title">' + rupiah + '</h5><a href="#" class="btn btn-primary">Pesan sekarang</a></div></div></div>';
      }
    })

    $('#daftar-menu').html(content);
  })
})