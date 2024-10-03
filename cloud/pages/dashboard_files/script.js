document.getElementById('menu-toggle').addEventListener('click', function() {
  const sidebar = document.getElementById('sidebar');
  if (sidebar.style.left === '-250px') {
      sidebar.style.left = '0';
  } else {
      sidebar.style.left = '-250px';
  }
});
