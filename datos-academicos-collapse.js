$(document).ready(function () {
  $('.collapse')
      .on('shown.bs.collapse', function (event) {
        event.stopPropagation();
        console.log("open");
        $(this)
            .parent()
            .find(".fa-chevron-down")
            .removeClass("fa-chevron-down")
            .addClass("fa-chevron-right");
      }).on('hidden.bs.collapse', function (event) {
    console.log("closed");
    event.stopPropagation();
    $(this)
        .parent()
        .find(".fa-chevron-right")
        .removeClass("fa-chevron-right")
        .addClass("fa-chevron-down");
  });
});