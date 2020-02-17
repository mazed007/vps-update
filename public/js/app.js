function openNav() {
  document.getElementById("sidebar").style.width = "300px";
}

function closeNav() {
  document.getElementById("sidebar").style.width = "0";
}

$(document).ready(function() {
  $("#myInput").on("keyup", function() {
    var value = $(this)
      .val()
      .toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle(
        $(this)
          .text()
          .toLowerCase()
          .indexOf(value) > -1
      );
    });
  });
});