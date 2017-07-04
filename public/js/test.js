function convertWeight() {
  console.log('function fired');
  var unit = $("#weight_units").val();
  var number = $("#weight").val();

  if (number == '') {
    return;
  }

  if (unit == "lbs") {
    $("#weight").val(number * 2.2046);
  }

  if (unit == "kgs") {
    $("#weight").val(number / 2.2046);
  }
}
window.onload = function() {
  console.log($);
  $("#weight_units").change(convertWeight);
}
