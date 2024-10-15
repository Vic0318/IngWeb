document.addEventListener('DOMContentLoaded', function () {
    var toggleButton = document.getElementById('toggle-sidebar');
    var sidebar = document.getElementById('sidebar');

    toggleButton.addEventListener('click', function () {
        sidebar.classList.toggle('hidden');
        document.body.classList.toggle('no-scroll');
    });
});
