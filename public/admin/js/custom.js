$(document).ready(function () {

    document.querySelectorAll( '.awesome-ckeditor' )
    .forEach(function(el){
        el.removeAttribute('required');
        ClassicEditor
        .create( el )
        .then( function (editor) {
            console.log( editor );
            var div = el.parentNode.querySelector('.ck-editor__editable');
            div.style.backgroundColor = 'white';
            div.style.minHeight = '300px';
        } )
        .catch( function (error) {
            console.error( error );
        } );
    });

});

var $addContentLink = $('<a href="#" class="add_content_link btn btn-info">Ajouter un contenu de thérapie</a>');
var $newLinkLi = $('<li></li>').append($addContentLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    var $collectionHolder = $('ul.contents');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);
    // add a delete link to all of the existing tag form li elements
    $collectionHolder.find('li.content-item').each(function() {
        addContentFormDeleteLink($(this));
    });

    $addContentLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // add a new tag form (see code block below)
        addContentForm($collectionHolder, $newLinkLi);
    });


});

function addContentFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a class="btn btn-warning" href="#">Supprimer le contenu</a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the tag form
        $tagFormLi.remove();
    });
}

function addContentForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '$$name$$' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);

    // also add a remove button, just for this example
    $newFormLi.append('<a href="#" class="remove-content">Delete</a>');
    $newLinkLi.before($newFormLi);

    // handle the removal, just for this example
    $('.remove-content').click(function(e) {
        e.preventDefault();
        $(this).parent().remove();

        return false;
    });
}
