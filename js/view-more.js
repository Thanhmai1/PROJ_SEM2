//file dành cho view more của menu
document.getElementById('viewMoreBtn').addEventListener('click', function (event) {
    event.preventDefault();
    var hiddenRecipes = document.querySelectorAll('.hidden');
    hiddenRecipes.forEach(function (recipe) {
        recipe.classList.remove('hidden');
    });
    this.style.display = 'none';
});
