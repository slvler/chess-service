"use strict";

/*
 * @namespace   : Language
 * @name        : Hs-qwerty
 * @requires    : jQuery, global.js
 * @description : Language CRUD
 */



var Language = {

    languageAdd: function (url,base) {

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('meta[name="base_url"]').attr('content');
    var formUrl = '#languageAddForm';
    var languageAddData = $(formUrl).serialize();

    var ccc = url;
    var cc = base_url;

        var s = cc + "/" + ccc;


        if (url != "") {
        $.ajax({
            url: s,
            type: 'POST',
            data: {_token: CSRF_TOKEN, data: languageAddData},
            dataType: 'JSON',
            //data: { title: title, lang: lang},
            success: function (result) {
               alert("gel");
            }
        });
    } else {
        $('#modalExtraProductInfo .modal-body').html("Sipariş miktarı girilmeden ekstra ürün eklenemez!");
        $(modalExtra).modal("show");
    }
},



};
