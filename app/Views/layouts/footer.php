<script>
/* Redirect */
function goTo(url) { window.location.href = url; }
function filterPengaduan(status) {
    if(status === '') location.href='/dashboard';
    else location.href='/pengaduan?status='+status;
}

/* COUNTER ANIMASI */
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.counter').forEach(counter => {
        const target = +counter.innerText;
        let count = 0;
        const duration = 800;
        const step = Math.max(1, Math.floor(target / (duration/16)));

        const updateCounter = () => {
            count += step;
            if(count < target) requestAnimationFrame(updateCounter);
            else counter.innerText = target;
        };
        updateCounter();
    });

    /* Dashboard Card Hover */
    document.querySelectorAll('.dashboard-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const icon = card.querySelector('.icon-circle i');
            if(icon){ icon.style.transform = 'scale(1.25) rotate(6deg)'; }
        });
        card.addEventListener('mouseleave', () => {
            const icon = card.querySelector('.icon-circle i');
            if(icon){ icon.style.transform = 'scale(1) rotate(0)'; }
        });
    });

    /* Realtime Search */
    const searchInput = document.getElementById('searchPengaduan');
    searchInput.addEventListener('input', () => {
        const filter = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll('#dashboardTable tbody tr');
        rows.forEach(row => {
            const judul = row.children[1].innerText.toLowerCase();
            const nama  = row.children[2].innerText.toLowerCase();
            if(judul.includes(filter) || nama.includes(filter)) row.style.display='';
            else row.style.display='none';
        });
    });
});
</script>