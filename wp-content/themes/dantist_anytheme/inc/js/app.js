let dom = {
    menu_icon : document.querySelector('.menu_icon'),
    mob_menu  : document.querySelector('.mobile-navigation')
}

dom.menu_icon.addEventListener('click',show_menu);

function show_menu(){
    let menu = dom.mob_menu,
        mas = menu.querySelectorAll('li');

    mas.forEach( el => ( el.addEventListener('click', close_menu)));
    dom.mob_menu.style.left = (document.documentElement.offsetWidth - 330) + 'px';


}
function close_menu(){

    dom.mob_menu.style.left = 100 + '%';
}
function position_icon(){

    dom.menu_icon.style.left = (document.documentElement.offsetWidth - 60) + 'px';
    dom.menu_icon.style.top = 10 + 'px';

}
position_icon();
//=============================
document.documentElement.style.setProperty('--vh', `${vh}px`);
// слушаем событие resize
window.addEventListener('resize', () => {
    // получаем текущее значение высоты
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
    position_icon();
});

