const optionMenu = document.querySelector(".select-menu"),
    selectBtn = optionMenu.querySelector(".select-btn"),
    options = optionMenu.querySelectorAll(".option"),
    sBtn_text = optionMenu.querySelector(".sBtn-text");

// Menambahkan variabel untuk melacak status aktif atau tidaknya menu
let menuActive = false;

selectBtn.addEventListener("click", (event) => {
    event.stopPropagation();
    // Memperbarui status aktif atau tidaknya menu
    menuActive = !menuActive;
    optionMenu.classList.toggle("active", menuActive);
});

$('input[id=image]').on('change', function(e){
  var reader = new FileReader();
  reader.onload = function(e){
    $('#preview').attr('src',e.target.result);
  }
  reader.readAsDataURL(this.files[0]);
});


