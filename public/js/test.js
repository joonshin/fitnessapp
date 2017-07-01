function convertWeight() {
  var unit = $("#weight_unit").val();
  var number = $("#weight").val();

  if (unit == "lbs") {
    $("#weight").val(number * 2.2046);
  }

  if (unit == "kgs") {
    $("#weight").val(number / 2.2046);
  }
}
window.onload = function() {
console.log($);
  $("#unit").change(convertWeight());

}
