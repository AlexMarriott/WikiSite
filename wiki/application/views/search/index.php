<form method="get" id= "homeSearch" name="carSearch" action="<?php echo base_url();?>search/index.php" autocomplete="off">
    <div class="search-filters pull-left">
        <input type="text" name="home_search"  placeholder="Search"  id="ajax_search" class="pull-left">
        <ul id="show_search_results"  class= 'autoSearch'></ul>

        <input type="submit" name="searchinghome" class="searchIcon" value="Submit">


</form>

<script>
    $("#ajax_search").keyup(function () {
        $.ajax({
            type: "POST",
            url: webUrl+'userSite/SearchAutoComplete',
            data: ({string: $("#ajax_search").val()}),
            success: function(data) {
                $("#show_search_results").show();
                $("#show_search_results").html(data);
                $('#show_search_results > li > a').click(function(){
                    var search_resultList = $(this).text();
                    $("#ajax_search").val(search_resultList);
                    $("#show_search_results").hide();
                });
            }
        });
    });
</script>