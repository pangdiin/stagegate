
var table = null

$(document).ready( function () {
    $('.select2').select2({
        placeholder: 'Select an option'
    });
});

var overlay = $(`
    <div class="overlay">
        <div class="loader-container text-center">
            <div class="text-center"><i class="fa fa-spin fa-spinner fa-3x"></i></div>
            <div class="text-center">Loading...</div>
        </div>
    </div>
`);

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function formSubmit(el) {
    el.submit(function (e) {
        var formId = this.id,
            form = this;
        event.preventDefault();
        $(this).find('.card-form').prepend(`
           <div class="overlay">
                <div class="loader-container text-center">
                    <div class="text-center"><i class="fa fa-spin fa-spinner fa-3x"></i></div>
                    <div class="text-center">Submitting request...</div>
                </div>
            </div>
        `)
        setTimeout( function () { 
            form.submit();
        }, 1000);
    })
}

function renderLabel(data)
{
    return '<span class="badge badge-'+ data.type +'">'+ data.label +'</span>';
} 

function renderImage(src)
{
    return `<a href="${ src }" alt="no image" class="fancy-box"><img class="img-rounded img-preview img-preview-xs" src="${ src }"/></a>`;
} 



function renderLinkActions(data) 
{
    if (data.length <= 0) { return '<div class="l l-default>No Actions</div>' } 
    let buttons = ''
     if (Array.isArray(data)) { 
        data = data.reduce(function(acc, cur, i) {
            acc[i] = cur; return acc;
        }, {});
    }
    for (let key in data) {
        let link = data[key]
        switch (link.type) {
            case 'show': buttons += `<a href="${ link.link }" class="btn btn-success btn-sm"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="View"></i></a> `; break;
            case 'edit': buttons += `<a href="${ link.link }" class="btn btn-info btn-sm"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top" title="Edit"></i></a> `; break;
            case 'update': buttons += `<a href="${ link.link }" class="btn btn-link text-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Update"></i></a> `; break;
            case 'delete': buttons += `<a name="btn_delete" href="${ link.link }" class="btn btn-link text-danger" data-redirect="${ link.redirect }"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete"></i></a>`; break;
            case 'restore': buttons += `<a name="btn_restore" href="${ link.link }" class="btn btn-link text-info" data-redirect="${ link.redirect }"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Restore"></i></a>`; break;
            case 'purge': buttons += `<a name="btn_purge" href="${ link.link }" class="btn btn-link text-danger" data-redirect="${ link.redirect }"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Delete Permanently"></i></a>`; break;
            default: buttons += `<a class="${ link.class } btn btn-link" name="${ link.name }" href="${ link.link }"><i class="${ link.icon }" data-toggle="tooltip" data-placement="top" title="${ link.label }"></i></a></li>`; break;
        }
    }

    return buttons;
    // return `<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
    //             ${ buttons }
    //         </div>`;
}


function renderActions(data) 
{
    if (data.length <= 0) { return '<div class="l l-default>No Actions</div>' } 
    let buttons = '',
        more_buttons = '', more_links = 0

    if (Array.isArray(data)) { 
        data = data.reduce(function(acc, cur, i) {
            acc[i] = cur; return acc;
        }, {});
    }
    for (let key in data) {
        let link = data[key]
        switch (link.type) {
            case 'show': buttons += `<a href="${ link.link }" class="btn btn-sm btn-info"><i class="fa fa-search" data-toggle="tooltip" data-placement="top" title="View"></i></a>`; break;
            case 'edit': buttons += `<a href="${ link.link }" class="btn btn-sm btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Edit"></i></a>`; break;
            case 'update': buttons += `<a href="${ link.link }" class="btn btn-sm btn-primary"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="Update"></i></a>`; break;
            case 'delete': more_links++; more_buttons+= `<li class="dropdown-item"><a class="text-danger" name="btn_delete" href="${ link.link }" data-redirect="${ link.redirect }"><i class="fa fa-trash text-danger"></i> Delete</a></li>`; break;
            case 'purge': more_links++; more_buttons+= `<li class="dropdown-item"><a class="text-danger" name="btn_purge" href="${ link.link }" data-redirect="${ link.redirect }"><i class="fa fa-trash text-danger"></i> Delete</a></li>`; break;
            case 'restore':more_links++;  more_buttons+= `<li class="dropdown-item"><a class="text-info" name="btn_restore" href="${ link.link }" data-redirect="${ link.redirect }"><i class="fa fa-refresh text-info"></i> Restore</a></li>`; break;
            default: more_links++; more_buttons += `<li  class="dropdown-item"><a class="${ link.class }" name="${ link.name }" href="${ link.link }"><i class="${ link.icon }"></i> ${ link.label }</a></li>`; break;
        }
    }
    more_buttons = ` <div class="btn-group" role="group">
                    <button id="userActions" type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                    <div class="dropdown-menu" aria-labelledby="userActions"> ${ more_buttons } </div>
                </div>`
    return `<div class="btn-group btn-group-sm" role="group" aria-label="User Actions">
                ${ buttons }
               ${ more_links > 0 ? more_buttons : '' }
            </div>`;
}

function renderChangeStatus(data) 
{
    return `<label class="switch switch-3d switch-primary">
            <input type="checkbox" class="switch-input data-table" value="true" ${ data.value == 'active' ? 'checked="true"' : '' }  data-link="${ data.link }"/>
            <span class="switch-label"></span>
            <span class="switch-handle"></span>
        </label>
    `
}

function str_slug(text)
{
    return text .toLowerCase() .replace(/ /g,'-') .replace(/[^\w-]+/g,'') ;
}

function previewActions() 
{
    $("body").on("click", "#btn_delete", function(e) {
        e.preventDefault();
        let linkURL = $(this).attr("href"),
            linkRedirect = $(this).attr("data-redirect");
        deleteSwal(linkURL, linkRedirect)
    });

    $("body").on("click", "#btn_purge", function(e) {
        e.preventDefault();
        let linkURL = $(this).attr("href"),
            linkRedirect = $(this).attr("data-redirect");
        purgeSwal(linkURL, linkRedirect)
    });
}

function dataTableActions(table) 
{
    let ajax = null,
        timer = null
    $("body").on("change", ".switch-input.data-table", function(e) {
        e.preventDefault()
        let status = $(this).is(':checked'),
            linkURL = $(this).data('link'),
            linkRedirect = $(this).data('redirect')
            swalLoader();
            clearTimeout(timer)
            timer = setTimeout(function () {
                if (ajax) { ajax.abort() }
                ajax = $.ajax({
                    url: linkURL,
                    type: 'PATCH',
                    dataType: 'json',
                    data: {status: status},
                    success: function(data){
                        // if (linkRedirect !== 'undefined' || linkRedirect != null) {
                        //     location.href = linkRedirect;          
                        //     return 
                        // }
                        if (table) { table.ajax.reload() }
                        swal.close()
                    },
                    error: function(data){
                        table.ajax.reload()
                        swal.close()
                    }
                });    
            }, 1000) 
            
    });
    $("body").on("click", "#content-table a[name='btn_delete']", function(e) {
        e.preventDefault();
        let linkURL = $(this).attr("href"),
            linkRedirect = $(this).attr("data-redirect");
        deleteSwal(linkURL, linkRedirect)
    });


    $("body").on("click", "#content-table a[name='btn_restore']", function(e) {
        e.preventDefault();
        var linkURL = $(this).attr("href");
        var linkRedirect = $(this).attr("data-redirect");
        restoreSwal(linkURL, linkRedirect)
    });

    $("body").on("click", "#content-table a[name='btn_purge']", function(e) {
        e.preventDefault();
        var linkURL = $(this).attr("href");
        var linkRedirect = $(this).attr("data-redirect");
        purgeSwal(linkURL, linkRedirect)
    });
}

function deleteSwal(linkURL, linkRedirect) 
{
    swal({
        title: "Are you sure you want to delete this record?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
    }).then(function(result){
        if(result.value){
            ajaxSwal('DELETE', linkURL, linkRedirect);
        }
    });
}

function restoreSwal(linkURL, linkRedirect) 
{
    swal({
        title: "Are you sure you?",
        type: "info",
        showCancelButton: true,
        confirmButtonText: "Restore",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true,
    }).then(function(result){
        if(result.value){
            ajaxSwal('PATCH', linkURL, linkRedirect);
        }
    });
}

function purgeSwal(linkURL, linkRedirect) 
{
    swal({
        title: "Are you sure you want to delete this item permanently?",
        text: " Anywhere in the application that references this item will most likely error. Proceed at your own risk. This can not be un-done.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
        showLoaderOnConfirm: true,
    }).then(function(result){
        if(result.value){
            ajaxSwal('DELETE', linkURL, linkRedirect);
        }
    });
}

function ajaxSwal(type, linkURL, linkRedirect) 
{
    swalLoader();
    $.ajax({
        url: linkURL,
        type: type,
        dataType: 'json',
        data: {},
        success: function(data){
            if (linkRedirect !== 'undefined') {
                location.href = linkRedirect;          
                return 
            }
            table.ajax.reload()
            swal.close()
        },
        error: function(data){
            table.ajax.reload()
            swal.close()
        }
    });
}


function swalLoader(message) 
{
    if(message == "")
        message = "Please wait while we send your request.";

    swal({
        title: 'Loading...',
        text: message,
        // imageUrl: window.location.origin + "/img/ring.gif", 
        animation: false,
        showConfirmButton:false,
        allowOutsideClick: false
    })
}




/**
 * Works same as array_get function of Laravel
 * @param array
 * @param key
 * @returns {*}
 */
var array_get = function (array, key, defaultValue) {
    "use strict";

    if (typeof defaultValue === 'undefined') {
        defaultValue = null;
    }

    var result;

    try {
        result = array[key];
        if(typeof array[key] !== 'undefined'){
            result = array[key]
        }else{
            result = defaultValue;
        }


    } catch (err) {
        result = defaultValue;
    }

    if(result === null) {
        result = defaultValue;
    }

    return result;
};

/**
 * Get the array/object length
 * @param array
 * @returns {number}
 */
var array_length = function (array) {
    "use strict";

    return _.size(array);
};

/**
 * Get the first element.
 * Passing n will return the first n elements of the array.
 * @param array
 * @param n
 * @returns {*}
 */
var array_first = function (array, n) {
    "use strict";

    return _.first(array, n);
};

/**
 * Get the first element.
 * Passing n will return the last n elements of the array.
 * @param array
 * @param n
 * @returns {*}
 */
var array_last = function (array, n) {
    "use strict";

    return _.last(array, n);
};

/**
 * Works same as dd function of Laravel
 */
var dd = function () {
    "use strict";
    console.log.apply(console, arguments);
};

/**
 * Json encode
 * @param object
 */
var json_encode = function (object) {
    "use strict";
    if (typeof object === 'undefined') {
        object = null;
    }
    return JSON.stringify(object);
};

/**
 * Json decode
 * @param jsonString
 * @returns {*}
 */
var json_decode = function (jsonString, defaultValue) {
    "use strict";
    if (typeof jsonString === 'string') {
        var result;
        try {
            result = $.parseJSON(jsonString);
        } catch (err) {
            result = defaultValue;
        }
        return result;
    }
    return jsonString;
};
