<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Section: Lokasi PT RNE -->
<section id="location">
  <div class="container mb-4 py-3">
    <h5 class="fw-bold">JANGKAUAN KAMI</h5>
    <h2 class="fw-bold">Lokasi PT RNE</h2>
    <p>
      Jaringan kami tersebar di wilayah strategis, siap mendukung pasokan
      energi solar yang andal untuk operasional Anda
    </p>

    <!-- Map container -->
    <div class="map" id="map" data-location='@json($location)' style="height: 500px; border-radius: 12px; overflow: hidden;" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true"></div>
  </div>
</section>

<!-- Leaflet Script -->
<script>
  // Inisialisasi peta
  var map = L.map("map", {
    center: [-3.5, 120], // pusat Indonesia
    zoom: 5,
    zoomControl: true,
    attributionControl: false,
  });

  // Gunakan tile minimalis
  L.tileLayer("https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png", {
    attribution: "&copy; OpenStreetMap",
    subdomains: "abcd",
    maxZoom: 19,
  }).addTo(map);

  // Cek apakah perangkat adalah mobile
  const isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

  // Simpan popup aktif agar bisa ditutup saat buka yang baru
  let activePopup = null;

  const mapContainer = document.getElementById("map");
  const rawLocations = JSON.parse(mapContainer.dataset.location);

  const locations = rawLocations.map(item => ({
    name: item.wilayah,
    coords: [parseFloat(item.latitude), parseFloat(item.longitude)]
  }));

  // Tambahkan marker per lokasi
  locations.forEach((loc) => {
    const marker = L.circleMarker(loc.coords, {
      radius: 8,
      color: "#E7C00F",
      fillColor: "#00307A",
      fillOpacity: 0.9,
      weight: 1.6,
    }).addTo(map);

    const popup = L.popup({
      closeButton: false, // Hapus tombol X
      autoClose: false,
      closeOnClick: false,
      offset: [0, -8],
    }).setContent(`<strong>${loc.name}</strong>`);

    // MOBILE → buka saat diklik
    if (isMobile) {
      marker.on("click", () => {
        if (activePopup) {
          map.closePopup(activePopup);
        }
        marker.bindPopup(popup).openPopup();
        activePopup = popup;
      });
    } else {
      // DESKTOP → buka saat hover
      marker.on("mouseover", () => {
        marker.bindPopup(popup).openPopup();
      });
      marker.on("mouseout", () => {
        marker.closePopup();
      });
    }
  });
</script>
