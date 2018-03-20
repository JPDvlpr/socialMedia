/*
// jquery function{
//
// perform hide the login tab
//  when someone try to make new account.
//  }
//  In create account {
//   it change color to selected field
//   }
//  inhome page {
//  it increase size on mouse over}
//
// }

 */


$(document).ready(function () {
    $("#firstName").keydown(function () {
        $("#form1").hide();
        $("#fn").css("color", "DodgerBlue");
    });
    $("#lastName").keydown(function () {
        $("#form1").hide();
        $("#ln").css("color", "DodgerBlue");
    });
    $("#email").keydown(function () {
        $("#form1").hide();
        $("#em").css("color", "DodgerBlue");
    });
    $("#password").keydown(function () {
        $("#form1").hide();
        $("#pd").css("color", "DodgerBlue");
    });
    $("#repeatpassword").keydown(function () {
        $("#form1").hide();
        $("#rpd").css("color", "DodgerBlue");
    });
    $("#mouse").mouseover(function () {
        $("#mouse").css("fontSize", "30px");
    });
    $("#mouse").mouseleave(function () {
        $("#mouse").css("fontSize", "15px");
    });
});