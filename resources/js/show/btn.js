const btn = document.querySelectorAll('.add_comment')
const blockComments = document.querySelectorAll('.block_comments')
btn.forEach((button, i) => {
        button.addEventListener('click', () => {
            if(btn[i].innerHTML === '+'){
                btn[i].innerHTML = '-'
                blockComments[i].classList.add('active')
                blockComments[i].style.maxHeight = blockComments[i].scrollHeight + 'px'
            } else {
                btn[i].innerHTML = '+'
                blockComments[i].classList.remove('active')
                blockComments[i].style.maxHeight = 0
            }
        })
})



