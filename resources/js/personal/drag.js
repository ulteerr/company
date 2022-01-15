const types = ['image/jpeg', 'image/png', 'image/svg+xml']
let dragAndDrop = document.querySelector('.drag-and-drop'),
    imagesForUpload = [],
    dragAndDropBlock = document.querySelector('.dnd_block'),
    imagesList = document.querySelector('.images-list'),
    avatar = document.querySelector('.avatar')

if (dragAndDrop) {
    dragAndDrop.addEventListener('dragenter', (e) => {
        e.preventDefault()
        dragAndDrop.classList.add('active')
    })

    dragAndDrop.addEventListener('dragleave', (e) => {
        e.preventDefault()
        dragAndDrop.classList.remove('active')
    })

    dragAndDrop.addEventListener('dragover', (e) => {
        e.preventDefault()
    })

    dragAndDrop.addEventListener('drop', (e) => {
        e.preventDefault()
        const files = e.dataTransfer.files
        if (imagesForUpload.length <= 0) {
            for (let key in files) {
                if (!types.includes(files[key].type)) {
                    continue
                } else if (files.length > 1) {
                    break
                }
                imagesForUpload.push(files[key])
                add(files[key])
            }
        }
        dragAndDrop.classList.remove('active');
    })

    let form = document.querySelector('#form_edit')

    $(form).submit(function (e) {
        e.preventDefault()
        let formData = new FormData()
        let name = $('#name').val()
        let email = $('#email').val()
        let text = {name: name, email: email}
        for (let key in text) {
            formData.append(key, text[key]);
        }

        formData.append('file', imagesForUpload[0])
        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content'),
            },
        })
        $.ajax({
            url: '',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function () {
                window.location.replace('/home')
            }
        })
    })
}
const inputElement = document.getElementById("upload");
if (inputElement) {
    inputElement.addEventListener("change", handleFiles, false)

    function handleFiles() {
        const fileList = this.files[0];
        imagesForUpload.push(fileList)
        add(fileList)
    }
}


function add(file) {
    dragAndDropBlock.style.cssText = 'display:none !important'
    avatar.style.display = 'flex'
    let imageTmpUrl = URL.createObjectURL(file)
    imagesList.innerHTML += `<img src="${imageTmpUrl}" class="images-list-picture" alt="avatar">
                 <img class="btn_close_x" src="/img/x.svg" alt="x">`
    const x = document.querySelector('.btn_close_x')
    if (x) {
        x.addEventListener('click', () => {
            imagesForUpload = []
            URL.revokeObjectURL(imageTmpUrl)
            imagesList.innerHTML = ""
            dragAndDropBlock.style.display = 'flex'
            avatar.style.display = 'none'
        })
    }
}
