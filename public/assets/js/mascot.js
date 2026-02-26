document.addEventListener("DOMContentLoaded", function () {
    setTimeout(() => {
        const mascot = document.querySelector('.floating-mascot');
        mascot.classList.remove('hidden');
        mascot.style.opacity = '1';
        mascot.style.transform = 'translateY(0)';
        mascot.style.pointerEvents = 'auto';
    }, 2500); // delay 2.5 detik
});

document.addEventListener("DOMContentLoaded", function () {

    const messages = [
        "Hai Alumni 👋",
        "Selamat Datang di Alpen12 ✈️",
        "Sudah update data alumni?",
        "Yuk lihat info terbaru 📢",
        "Tetap terhubung ya 🤍"
    ];

    const bubble = document.getElementById("mascotBubble");
    let index = 0;

    function showBubble() {
        bubble.textContent = messages[index];
        bubble.classList.add("show");

        // bubble hilang setelah 3 detik
        setTimeout(() => {
            bubble.classList.remove("show");
        }, 3000);

        // ganti teks
        index = (index + 1) % messages.length;
    }

    // tampil pertama setelah maskot muncul
    setTimeout(() => {
        showBubble();
        setInterval(showBubble, 5000); // interval popup
    }, 3000); // sinkron dengan delay maskot
});