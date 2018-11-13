
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

$(document).ready(function() {

    setTimeout(function() {
        $('.statusMessage').fadeOut('fast');
    }, 5000);
    
    let keylist_tab = document.querySelector("#keylist-tab");
    let foblist_tab = document.querySelector("#foblist-tab");
    let history_tab = document.querySelector("#history-tab");

    let keylist_page = document.querySelector("#keylist-container");
    let foblist_page = document.querySelector("#foblist-container");
    let history_page = document.querySelector("#history-container");


    $(keylist_tab).click(function(){
        
        if ($(keylist_page).hasClass("d-none")){

            $(foblist_page).addClass("d-none");
            $(history_page).addClass("d-none");
            $(keylist_tab).addClass("selected-tab");

            $(foblist_tab).removeClass("selected-tab");
            $(history_tab).removeClass("selected-tab");
            $(keylist_page).removeClass("d-none");
        }
    });

    $(foblist_tab).click(function(){

        if ($(foblist_page).hasClass("d-none")){

            $(keylist_page).addClass("d-none");
            $(history_page).addClass("d-none");
            $(foblist_tab).addClass("selected-tab");

            $(keylist_tab).removeClass("selected-tab");
            $(history_tab).removeClass("selected-tab");
            $(foblist_page).removeClass("d-none");
        }
    });

    $(history_tab).click(function(){

        if ($(history_page).hasClass("d-none")){

            $(keylist_page).addClass("d-none");
            $(foblist_page).addClass("d-none");
            $(history_tab).addClass("selected-tab");

            $(foblist_tab).removeClass("selected-tab");
            $(keylist_tab).removeClass("selected-tab");
            $(history_page).removeClass("d-none");
        }
    });


    $(".keyrow").click(function(event){

        var isDim = $(this).is('.keyrow');
        if (isDim){ //make sure I am a dim element
            $(this).next().slideToggle(150, "swing"); // p00f
        }
    });


    $("#register-user").click(function(){
        $('.edit-rights-container').css('display', 'none');
        $('.register-container')
            .fadeToggle(150)
            .css('display', 'flex');
    });

    $("#edit-user-rights").click(function(){
        $('.register-container').css('display', 'none');
        $('.edit-rights-container')
            .fadeToggle(150)
            .css('display', 'flex');
    });


});