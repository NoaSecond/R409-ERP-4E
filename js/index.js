function indexOnload() {
    console.log("[index.js] : chargé");
    
    const searchBar = document.getElementById("searchBar");
    const searchIcon = document.getElementById("searchIcon");
    const searchBtn = document.getElementById("searchBtn");
     
    var members = document.querySelectorAll('.client');
    const selectedMember = document.getElementById("selectedMember");
    
    members.forEach(function(member) {
        member.addEventListener('click', function() {
            var selectedClientId = member.querySelector('a').id;
            $.ajax({
                url: 'phpScript/getSelectedClient.php',
                method: 'POST',
                data: { clientId: selectedClientId },
                success: function(response) {
                    $('#clientInfo').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

          
            selectedMember.style.display = "flex";
        });
    });
}