import './bootstrap';
import Alpine from 'alpinejs';
import * as skinview3d from "skinview3d";

window.Alpine = Alpine;

Alpine.start();

let skinHeaderContainer = document.getElementById('skin_header')

let skinHeaderViewer = new skinview3d.SkinViewer({
    canvas: skinHeaderContainer,
    width: 50,
    height: 50,
    fov: 70,
    zoom: 4.8,
    autoRotate: false,
    enableControls: false,
    skin: '/storage/' + skinHeaderContainer.getAttribute('data'),
})
skinHeaderViewer.playerObject.skin.leftArm.visible = false
skinHeaderViewer.playerObject.skin.rightArm.visible = false
skinHeaderViewer.playerObject.skin.leftLeg.visible = false
skinHeaderViewer.playerObject.skin.rightLeg.visible = false
skinHeaderViewer.playerObject.skin.body.visible = false
skinHeaderViewer.playerObject.position.set(0,-12,0)
export function skinUploadHelp(source){
    skinHeaderViewer.loadSkin(source)
}

let buttons = document.querySelectorAll('button')
buttons.forEach((button) => {
    button.addEventListener('click', function(e) {
        let pulse = document.createElement('div'),
            rect = this.getBoundingClientRect(),
            mValue = Math.max(this.clientWidth, this.clientHeight),
            stylePulse = pulse.style

        stylePulse.width = stylePulse.height = mValue + 'px'
        stylePulse.left = e.clientX - rect.left - (mValue/2) + 'px'
        stylePulse.top = e.clientY - rect.top - (mValue/2) + 'px'
        pulse.classList.add('pulse')
        this.classList.add('relative')
        this.appendChild(pulse)
        setTimeout(() => {this.removeChild(pulse)}, 2000)
    })
})

