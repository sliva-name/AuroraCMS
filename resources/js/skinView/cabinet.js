import * as skinview3d from "skinview3d";
import {skinUploadHelp} from "@/app.js";

const skinContainer = document.getElementById('skin_container')

let skinViewer = new skinview3d.SkinViewer({
    canvas: skinContainer,
    width: skinContainer.offsetWidth,
    height: skinContainer.offsetHeight,
    fov: 70,
    zoom: 0.9,
    autoRotate: true,
    autoRotateSpeed: 1,
    animation: new skinview3d.WalkingAnimation(),
    animationSpeed: 0.6,
    skin: '/storage/' + skinContainer.getAttribute('data'),
})
skinViewer.loadPanorama('images/panorama.jpg')

// document.getElementById('rotate_skin').addEventListener('click', () => {
//     skinViewer.autoRotate = !skinViewer.autoRotate
//     this.classList.toggle('bg-indigo-600')
// })
// document.getElementById('pause_skin').addEventListener('click', () => {
//     skinViewer.animation.paused = !skinViewer.animation.paused
//     this.classList.toggle('bg-indigo-600')
// })
// document.getElementById('animate_run_skin').addEventListener('click', () => {
//     if(skinViewer.animation instanceof skinview3d.WalkingAnimation) {
//         skinViewer.animation = new skinview3d.RunningAnimation()
//     }
//     else if (skinViewer.animation instanceof skinview3d.RunningAnimation){
//         skinViewer.animation = new skinview3d.FlyingAnimation()
//     }
//     else {
//         skinViewer.animation = new skinview3d.WalkingAnimation()
//     }
//
//     skinViewer.animation.speed = 0.6
// })


const ajax = (url, formElement, callback) => {
    const formData = new FormData(formElement);
    const formElements = formElement.elements;
    const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    for (let i = 0; i < formElements.length; i++) {
        const element = formElements[i];
        if (element.type === 'file') {
            // Если это поле input type="file", то добавляем его файлы к объекту FormData
            const files = element.files;
            for (let j = 0; j < files.length; j++) {
                formData.append(element.name, files[j]);
            }
        }
    }

    fetch(url, {
        method: 'POST',
        headers: {
            "X-CSRF-Token": csrf
        },
        body: formData
    }).then(response => {
        return response.json();
    }).then(data => {
        callback(data)
    }).catch(error => console.log(error.response));
};


document.getElementById('skin__upload').addEventListener('change', () => {
    ajax('/cabinet/skin/upload', document.querySelector('#skin_form'), (data)=> {
        skinViewer.loadSkin('storage/' + data)
        skinUploadHelp('storage/' + data)
    })
});
