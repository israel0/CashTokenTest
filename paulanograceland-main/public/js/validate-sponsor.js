$("#sponsorForm #sponsorNameField").on("focus", function (e) {
    clearInputSponsorFeedBack("#sponsorForm", "#sponsorNameField");
});

$("#sponsorForm #sponsorNameField").on("focusout", function (e) {
    sponsorAjaxValidation();
});

var sponsorConstant = 0;

function sponsorAjaxValidation() {
    var sponsorName = $("#sponsorForm #sponsorNameField").val();
    if (!validateSponsorName()) {
        sponsorConstant = 0;
        return false;
    }
    $.ajax({
        url: "/user/validate-sponsor.php",
        dataType: 'json',
        data: "sponsorName=" + sponsorName,
        type: 'POST',
        success: function (response) {
            $("#sponsorForm #sponsorNameField").get(0).disabled = false;
            if (response.responseCode == 1) {
                addSponsorSuccess("#sponsorForm", "#sponsorNameField", response.firstName + " " + response.lastName);
                sponsorConstant = 1;
            } else if (response.responseCode == 0) {
                addSponsorError("#sponsorForm", "#sponsorNameField", "Sponsor does not exist.");
                sponsorConstant = 0;
            }
        },
        timeout: 120000, // Timeout after 6 seconds
        error: function (jqXHR, textStatus, errorThrown) {
            console.log("Error, textStatus: " + textStatus + " errorThrown: " + errorThrown);
            //show error message            
            addSponsorError("#sponsorForm", "#sponsorNameField", "");
            sponsorConstant = 0;
            $("#sponsorForm #sponsorNameField").get(0).disabled = false;
        }
    });
    $("#sponsorForm #sponsorNameField").get(0).disabled = true;
    addSponsorLoading("#sponsorForm", "#sponsorNameField");
}
function validateSponsorName() {
    var sponsorName = $("#sponsorForm").find("#sponsorNameField").val();
    if (isEmpty(sponsorName)) {
        addSponsorError("#sponsorForm", "#sponsorNameField", "Please Fill out this field");
        return false;
    } else if (!isLetterOrNumber(sponsorName)) {
        addSponsorError("#sponsorForm", "#sponsorNameField", "Invalid Sponsor Name. No special characters and spaces allowed.");
        return false;
    } else if (!validateLength(sponsorName, 4, 20)) {
        addSponsorError("#sponsorForm", "#sponsorNameField", "Sponsor Name should contain 4 - 20 characters without spaces");
        return false;
    } else {
        return true;
    }
}

$('#sponsorForm').on('submit', function (e) {
    var error = 0;
    if (!validateSponsorName()) {
        if (error == 0) {
            var position = ($("#sponsorForm #sponsorNameField").offset().top) - 10;
            scrollTo(0, position);
        }
        error++;
    }
    if (error == 0) {
        return true;
    } else {
        return false;
    }
});