document.addEventListener("DOMContentLoaded", () => {
    const headerPlaceholder = document.getElementById("header-placeholder");
  
    fetch("header.html")
      .then((response) => {
        if (!response.ok) {
          throw new Error("Gagal memuat header");
        }
        return response.text();
      })
      .then((data) => {
        headerPlaceholder.innerHTML = data;
  
        // Reinisialisasi elemen setelah header dimuat
        initMenuInteraction();
      })
      .catch((error) => console.error(error));
  
    // Fungsi untuk mengatur interaksi menu
    function initMenuInteraction() {
      // Dropdown menu Ruang Edukasi
      const ruangEdukasi = document.getElementById("ruang-edukasi");
      const dropdownMenu = document.getElementById("dropdown-menu");
  
      if (ruangEdukasi) {
        ruangEdukasi.addEventListener("click", function (event) {
          dropdownMenu.classList.toggle("hidden");
          event.stopPropagation();
        });
  
        document.addEventListener("click", function (event) {
          if (!ruangEdukasi.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
          }
        });
      }
  
      // Menu profil
      const profileButton = document.getElementById("profile");
      const profileMenu = document.getElementById("profile-menu");
  
      if (profileButton) {
        profileButton.addEventListener("click", () => {
          profileMenu.classList.toggle("hidden");
        });
  
        document.addEventListener("click", (event) => {
          if (!profileButton.contains(event.target) && !profileMenu.contains(event.target)) {
            profileMenu.classList.add("hidden");
          }
        });
      }
  
      // Hamburger menu untuk mobile
      const hamburger = document.getElementById("hamburger");
      const navMenuu = document.getElementById("navMenuH");
  
      if (hamburger) {
        hamburger.addEventListener("click", () => {
          navMenuu.classList.toggle("hidden");
        });
  
        document.addEventListener("click", (event) => {
          if (!navMenuu.contains(event.target) && !hamburger.contains(event.target)) {
            navMenuu.classList.add("hidden");
          }
        });
        
      }
    }
  });
  

