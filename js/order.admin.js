// function pending() {
//   console.log(document.getElementById("pending").parentNode.parentNode);
// }
function pending(id) {
  $.ajax({
    type: "GET",
    url: "../placeordercopy.php?pending=" + id,
    success: function (result) {
      $(`#f${id}`).html("pending");
      // $(".orders").text(result);
    },
  });
}
function ready(id) {
  $.ajax({
    type: "GET",
    url: "../placeordercopy.php?ready=" + id,
    success: function (result) {
      $(`#f${id}`).html("ready");
      // $(".orders").text(result);
    },
  });
}
function purchased(id) {
  $.ajax({
    type: "GET",
    url: "../placeordercopy.php?purchased=" + id,
    success: function (result) {
      $(`#f${id}`).html("purchased");
      // $(".orders").text(result);
    },
  });
}
function terminate(id) {
  $.ajax({
    type: "GET",
    url: "../placeordercopy.php?terminate=" + id,
    success: function (result) {
      $(`#f${id}`).html("terminate");
      // $(".orders").text(result);
    },
  });
}
// function test($id) {
//   $.ajax({
//     url: "../placeorder copy.php",
//     success: function (result) {
//       $(".orders").text(result);
//     },
//   });
// }
