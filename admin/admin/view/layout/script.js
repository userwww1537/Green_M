const lis = document.querySelectorAll('li');

lis.forEach(li => {
  li.addEventListener('mousedown', () => {
    li.classList.add('clicked');
  });

  li.addEventListener('mouseup', () => {
    li.classList.remove('clicked');
  });
});