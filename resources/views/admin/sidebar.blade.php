<!-- Sidebar -->
<div class="bg-dark border-right text-white" id="sidebar-wrapper">
    <table class="p-0">
        <tr>
            <td id="adm-menu" class="col-lg-9">
                <div id="adm-menu-header" 
                class="sidebar-heading font-weight-bold pl-0">
                Administrator Module </div>

       <!--   <div id="navbar-close" class="hidden">
            <span class="glyphicon glyphicon-remove"></span>
          </div>
        </div>-->
                <div id="adm-menu-items"class="list-group list-group-flush">
                    <a href="/dominos/setup" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">
                       Setup</a>
                    <a href="/dominos/calendars" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">
                       Calendars</a>
                    <a href="/dominos/provinces" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">
                       Provinces</a>
                    <a href="/dominos/menuitems" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">
                       Menu Items</a>
                    <a href="/dominos/categories" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">
                       Categories</a>                       
                    <a href="/dominos/stores" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">
                       Stores</a>
                    <a href="/dominos/contacts" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">
                       Contact</a>
                    <a href="/dominos/subscriptions" 
                       class="list-group-item list-group-item-action 
                       bg-dark text-white pl-0">Subscriptions</a>
                  </div>
            </td>
            <td id="col-button-side" class="col-lg-1 p-4">
                <a id="closebtn" class="adm-menu-toggle closebtn p-0">
                 &times;</a>
                <a id="openbtn" class="adm-menu-toggle openbtn" 
                >&#9776;</a>
            </td>
        </tr>
    </table>
</div>
<!-- /#sidebar-wrapper -->


<!-- Menu Toggle Script -->
<script>
$("#closebtn").click(function(e) {
    e.preventDefault();
    $("#adm-menu").toggle();
    $("#openbtn").css({"display": "block"});
    $("#closebtn").css({"display": "none"});
});

$("#openbtn").click(function(e) {
    e.preventDefault();
    $("#adm-menu").toggle();
    $("#openbtn").css({"display": "none"});
    $("#closebtn").css({"display": "block"});
});
</script>
