function search() {
  let filter = document.getElementById('find').value.toUpperCase();

  let item = document.querySelectorAll('.riwayat-item, .transaksi-item, .dompet-item, .user-item');

  item.forEach(function(item) {

    let text = item.textContent || item.innerText;

    if (text.toUpperCase().indexOf(filter) > -1) {
      item.style.display = "";

    } 
    
    else {
      item.style.display = "none";
      
    }

  });
}