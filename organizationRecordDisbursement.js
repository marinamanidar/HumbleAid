
function selectAppealID(){
    
    var x = document.getElementById("appealID").value;

    $.ajax({
        url:"showAppeal.php",
        method:"POST",
        data:{
            id: x
        },
        success:function(data){
            $("#ans").html(data);
        }
    })

    $.ajax({
        url:"showCashDonation.php",
        method:"POST",
        data:{
            id: x
        },
        success:function(data){
            $("#answer").html(data);
        }
    })

    $.ajax({
        url:"showGoods.php",
        method:"POST",
        data:{
            id: x
        },
        success:function(data){
            $("#an").html(data);
        }
    })

    $.ajax({
        url:"showApplicant.php",
        method:"POST",
        data:{
            id: x
        },
        success:function(data){
            $("#ann").html(data);
        }
    })

}