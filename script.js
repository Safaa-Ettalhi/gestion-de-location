const sidebarIcon = document.getElementById('sidebarIcon');
const sidebar = document.getElementById('sidebar');
const header =document.getElementById('header');

sidebarIcon.addEventListener('click', () => {
   sidebar.classList.toggle('hidden');
   if (sidebar.classList.contains('hidden')) {
    header.classList.remove('flex-col');
    header.classList.add('flex-row');
} else {
    header.classList.remove('flex-row');
    header.classList.add('flex-col');
}
});


