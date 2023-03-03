


function valInputKaryawan(){
    let nama = document.getElementById("nama").value.length;
    let jabatan = document.getElementById("jabatan").value.length;
    let nip = document.getElementById("nip").value.length;
    if(nama == 0 || jabatan == 0 || nip == 0){
      document.getElementById("rekamK").setAttribute("disabled", true);
    
    } else {
    document.getElementById("rekamK").disabled = false;
    }
  }
  
    function valInput(){
      let nama = document.getElementById("nama").value.length;
      let alamat = document.getElementById("alamat").value.length;
      let ditemui = document.getElementById("ditemui").value.length;
      let tanggal = document.getElementById("tanggal").value.length;
      let keperluan = document.getElementById("keperluan").value.length;
  
      if(keperluan == 0 || tanggal == 0 || ditemui == 0 || alamat == 0 || nama == 0){
        document.getElementById("rekam").setAttribute("disabled", true);
      
      } else {
      document.getElementById("rekam").disabled = false;
      }
    }
    
    function klikRekam(){
      document.getElementById('rekam').setAttribute('disabled', true);
      document.getElementById('rekam').innerHTML = `<i class='bx bx-loader bx-spin'></i> Merekam`;
    }
  
  
      document.onkeydown = function(evt) {
      evt = evt || window.event;
      if (evt.keyCode == 119) {
          take_snapshot();
          document.getElementById("ambil").setAttribute("disabled", true);  
        document.getElementById('reset').disabled = false;
      };
    };