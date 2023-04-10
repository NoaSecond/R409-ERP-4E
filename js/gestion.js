function gestionOnload() {
    console.log("[gestion.js] : chargé");
    
    const searchBar = document.getElementById("searchBar");
    const searchIcon = document.getElementById("searchIcon");
    const searchBtn = document.getElementById("searchBtn");

    searchBar.addEventListener("input", () => {
        if (searchBar.value === "") {
            searchIcon.style.width = "0px";
            searchIcon.style.height = "0px";

            searchBtn.style.marginLeft = "inherit !important";

            var searchValue = searchBar.value;
            $.ajax({
                url: 'phpScript/getEmployeeListStartingWith.php',
                method: 'POST',
                data: { search: searchValue },
                success: function(response) {
                    $('#memberList').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        } else {
            searchIcon.style.width = "35px";
            searchIcon.style.height = "35px";

            searchBtn.style.marginLeft = "25px !important";
        }
    });

    searchIcon.addEventListener("click", () => {
        var searchValue = searchBar.value;
        $.ajax({
            url: 'phpScript/getEmployeeListStartingWith.php',
            method: 'POST',
            data: { search: searchValue },
            success: function(response) {
                $('#memberList').html(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    })
}