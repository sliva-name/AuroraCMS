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
    }).then(async response => {
        if (response.ok) return response.json()
        throw new Error(await response.text())
    })
        .then(data => callback(data))
        .catch(error => {
            parseErrors(error)
        })
};

async function parseErrors(error){
    const errors = JSON.parse(error.message).errors;

    for (const key in errors) {
        if (errors.hasOwnProperty(key)) {
            const blockError = document.createElement('div');
            blockError.innerHTML =
                `<div x-data="{ showMessage: true }" x-show="showMessage" class="fixed flex justify-center top-[108px] right-[28px]">
                            <div class="flex items-center justify-between max-w-xl p-[15px] bg-red-600 border rounded-[20px] shadow-sm gap-5">
                              <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="28" viewBox="0 0 30 28" fill="none">
                                  <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7503 2.60877C17.0812 -0.274138 12.919 -0.274124 11.2499 2.60877L0.580845 21.0372C-1.09167 23.9261 0.992926 27.5416 4.33103 27.5416H25.6692C29.0073 27.5416 31.0919 23.926 29.4193 21.0372L18.7503 2.60877ZM14.9988 7.54157C15.8272 7.5409 16.4993 8.21194 16.5 9.04037L16.5057 16.1237C16.5063 16.9521 15.8353 17.6242 15.0069 17.6249C14.1784 17.6256 13.5063 16.9545 13.5057 16.1261L13.5 9.04276C13.4993 8.21434 14.1704 7.54223 14.9988 7.54157ZM15 22.6666C15.8284 22.6666 16.5 21.995 16.5 21.1666C16.5 20.3381 15.8284 19.6666 15 19.6666C14.1716 19.6666 13.5 20.3381 13.5 21.1666C13.5 21.995 14.1716 22.6666 15 22.6666Z" fill="white"/>
                                </svg>
                                <p class="ml-3 text-[18px] font-medium text-white">${errors[key]}</p>
                              </div>
                              <span @click="showMessage = false" class="inline-flex items-center cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                              </span>
                            </div>
                        </div>`;
         await document.body.appendChild(blockError);
        }
    }
}


document.getElementById('skin__upload').addEventListener('change', () => {
    ajax('/cabinet/skin/upload', document.querySelector('#skin_form'), (data)=> {
        skinViewer.loadSkin('storage/' + data)
        skinUploadHelp('storage/' + data)
    })
});
