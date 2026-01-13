const tabs = document.querySelectorAll('.tab');
const contents = document.querySelectorAll('.content');
const list_button = document.querySelectorAll('.achievement-list-button')
const list_extra_item = document.querySelectorAll('.achievement-list__extra__item')
const reset_button = document.querySelectorAll('.achievement-list__item-reset')
const update_button = document.querySelectorAll('.achievement-list__update__item')
const default_button = document.querySelectorAll('.achievement-list__default__item')
const update_default_button = document.querySelectorAll('.achievement-list__update__default__item')
const delete_button = document.querySelectorAll('.achievement-list__delete__item')
const delete_confirmation_form = document.querySelectorAll('.achievement-list__delete__confirm__item');


const update_announces_button = document.querySelectorAll('.grid-card__update');
const grid_card_item = document.querySelectorAll('.grid-card');
const grid_card_update_item = document.querySelectorAll('.grid-card__update-item');
const announces_reset_button = document.querySelectorAll('.announces-list__item-reset');

const bio_update_button = document.querySelectorAll('.bio__bottom__update');
const bio_paragraphs = document.querySelectorAll('.bio__text');
const bio_paragraphs_update = document.querySelectorAll('.bio__text__update');
const bio_paragraphs_delete = document.querySelectorAll('.bio__text__delete__confirm');
const bio_reset_button = document.querySelectorAll('.bio__text__update-buttons');
const bio_create_item = document.querySelectorAll('.bio__text__create');
const bio_create_button = document.querySelectorAll('.bio__text__create__button');
const bio_delete_button = document.querySelectorAll('.bio__text__delete');

tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const target = tab.dataset.tab;
    // Remove active class from all tabs
    tabs.forEach(t => t.classList.remove('active'));
    contents.forEach(c => c.classList.remove('active'));
    // Add active class to clicked tab
    tab.classList.add('active');
    document.getElementById(target).classList.add('active');
  });
});

list_button.forEach(button => {
    button.addEventListener('click', () => {
        //const target = button.dataset.achievement-list-button;

        //document.getElementById(target).classList.add('active');

        list_button.forEach(list => list.classList.remove('active'));
        list_extra_item.forEach(list => list.classList.add('active'));
        // const activeContent = document.getElementById(target);
        // if (activeContent) {
        //     activeContent.classList.add('active');
        // } else {
        //     console.error(`Element with id="${target}" not found`);
        // }

    });

});

reset_button.forEach(button =>{
    button.addEventListener('click', () =>{
        list_extra_item.forEach(list => list.classList.remove('active'));
        update_button.forEach(list => list.classList.remove('active'));
        delete_confirmation_form.forEach(list => list.classList.remove('active'));

        default_button.forEach(list => list.classList.add('active'));
        list_button.forEach(list => list.classList.add('active'));

    });
});

update_default_button.forEach(button =>{
    button.addEventListener('click', () =>{
        default_button.forEach(list => list.classList.remove('active'));
        list_button.forEach(list => list.classList.remove('active'));

        update_button.forEach(list => list.classList.add('active'));
    });
});

delete_button.forEach(button =>{
    button.addEventListener('click', () =>{
        default_button.forEach(list => list.classList.remove('active'));
        list_button.forEach(list => list.classList.remove('active'));
        
        delete_confirmation_form.forEach(list => list.classList.add('active'));
    });

});

update_announces_button.forEach(button =>{
    button.addEventListener('click', () =>{
        grid_card_item.forEach(list => list.classList.remove('active'));
        grid_card_update_item.forEach(list => list.classList.add('active'));
    });
});

announces_reset_button.forEach(button =>{
    button.addEventListener('click', () =>{
        grid_card_update_item.forEach(list => list.classList.remove('active'));
        grid_card_item.forEach(list => list.classList.add('active'));
    });
});

bio_update_button.forEach(button =>{
    button.addEventListener('click', ()=>{
        bio_paragraphs.forEach(list=>list.classList.remove('active'));
        bio_paragraphs_update.forEach(list=> list.classList.add('active'));
    });
});


bio_reset_button.forEach(button =>{
    button.addEventListener('click', ()=>{
        bio_paragraphs_update.forEach(list=>list.classList.remove('active'));
        bio_paragraphs_delete.forEach(list=>list.classList.remove('active'));
        bio_create_item.forEach(list=>list.classList.remove('active'));

        bio_paragraphs.forEach(list=> list.classList.add('active'));
        bio_create_button.forEach(list=> list.classList.add('active'));
    });
});

bio_create_button.forEach(button =>{
    button.addEventListener('click', ()=>{
        bio_create_button.forEach(list=>list.classList.remove('active'));
        bio_create_item.forEach(list=> list.classList.add('active'));
    });

});

bio_delete_button.forEach(button =>{
    button.addEventListener('click', ()=>{
        bio_paragraphs.forEach(list=>list.classList.remove('active'));
        bio_paragraphs_delete.forEach(list=> list.classList.add('active'));

    });
});