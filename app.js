// Избери всички елементи, с които ще работиш
const navToggle = document.querySelector('.nav-toggle');
const navLinks = document.querySelectorAll('.nav__link');

// Добави събитие на бутона за мобилно меню
navToggle.addEventListener('click', () => {
  document.body.classList.toggle('nav-open');
});

// Затвори мобилното меню при избор на елемент от него
navLinks.forEach(link => {
  link.addEventListener('click', () => {
    document.body.classList.remove('nav-open');
  })
})

// Избери елементите за рецептите
const recipes = document.querySelector('.recipes');

// Извлечи рецептите от JSON файл и генерирай HTML
fetch('recipes.json')
  .then(response => response.json())
  .then(data => {
    let html = '';
    data.forEach(recipe => {
      html += `
        <article>
          <img src="${recipe.image}" alt="${recipe.title}">
          <h3>${recipe.title}</h3>
          <p>${recipe.description}</p>
        </article>
      `;
    });
    recipes.innerHTML = html;
  });
