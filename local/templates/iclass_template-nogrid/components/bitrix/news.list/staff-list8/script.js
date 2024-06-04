$(document).ready(function () {
    var card = $(".staff-card:last-child");
    var list = $(".staff-card-list");

    list.height(list.height() - ((list.offset().top + list.height()) - (card.offset().top + card.height())));
});