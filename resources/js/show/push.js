function notifyMe() {
    let notification = new Notification('Уведомление :', {
        tag: 'ache-mail',
        body: 'Комментарий добавлен',
        icon: '/img/chat.png'
    })
}

const notification = () => {
    if (!("Notification" in window)) {
        alert("Ваш брайзер не поддерживает уведомления")
    } else if (Notification.permission === 'granted') {
        notifyMe()
    } else if (Notification.permission !== 'denied') {
        Notification.requestPermission(function (permission) {
            if (!('permission' in Notification))
                Notification.permission = permission
            if (permission === 'granted')
                notifyMe()
        })
    }
}

export {notification}
