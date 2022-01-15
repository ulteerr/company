const menu = document.querySelector('.menu')
const burger = document.querySelector('.burger')
const block = 10

for (let i = 0; i < block; i++) {
    let span = document.createElement('span')
    burger.appendChild(span)
}

burger.addEventListener('click', (event) => {
    burger.classList.toggle("open")
    if(!menu.classList.contains('active')){
        menu.classList.add('active')
        menu.style.maxHeight = menu.scrollHeight + 'px'
    } else {
        menu.classList.remove('active')
        menu.style.maxHeight = 0
    }

})

