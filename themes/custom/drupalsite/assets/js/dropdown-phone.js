var dropdownItems = document.getElementsByClassName('menu-item');
for (var i = 0; i < dropdownItems.length; i++) {
  dropdownItems[i].addEventListener('click', function() {
    console.log('Клик на пункт списка:', this.textContent);
  });
}
