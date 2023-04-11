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

    var members = document.querySelectorAll('.member');
    const noMember = document.getElementById("noMember");
    const selectedMember = document.getElementById("selectedMember");

    members.forEach(function(member) {
        member.addEventListener('click', function() {
            var selectedEmployeeId = member.querySelector('a').id;

            $.ajax({
                url: 'phpScript/getSelectedEmployee.php',
                method: 'POST',
                data: { employeeId: selectedEmployeeId },
                success: function(response) {
                    $('#selectedMember').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

            noMember.style.display = "none";
            selectedMember.style.display = "flex";
        });
    });

    const addMemberBtn = document.getElementById('addMember');
    const popUp = document.getElementById('popUp');
    const closePopUp = document.getElementById('closePopUp');

    addMemberBtn.addEventListener('click', function() {
        popUp.style.opacity = "0";
        popUp.style.display = "flex";
        setTimeout(function(){
            popUp.style.opacity = "1";
        }, 100); 
    });

    closePopUp.addEventListener('click', function() {
        popUp.style.opacity = "0";
        setTimeout(function(){
            popUp.style.display = "none";
        }, 100); 
    });
}