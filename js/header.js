// window.alert("Halo bandung");
$num = 0;
$(document).ready(function() {
    $("#sidebarCollapse").on("click", function() {
        $("#sidebar").toggleClass("active");
        $(this).toggleClass("active");
        $num+=1;
        if($num % 2 == 0){
            // document.write($num);
            document.getElementById("content-span").innerText = "<";
        }
        else{
            document.getElementById("content-span").innerText = ">";
        }
    });
  });
